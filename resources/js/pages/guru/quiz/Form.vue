<script setup>
import QuizController from '@/actions/App/Http/Controllers/Guru/QuizController';
import { Head, useForm } from '@inertiajs/vue3';
import { AlertCircle, ArrowLeft, BookOpen, CheckCircle2, Clock, Eye, FileText, Plus, Save, Trash2, Users } from 'lucide-vue-next';
import { computed, ref } from 'vue';

// --- PROPS ---
const props = defineProps({
    kelas_list: Array,
    matpel_map: Object,
});

// --- STATE ---
const mode = ref('edit'); // 'edit' | 'preview'
const availableMatpels = ref([]);

// --- FORM INIT ---
const form = useForm({
    judul: '',
    deskripsi: '', // Pastikan field ini ada di database atau hapus jika tidak
    matpel_kode: '',
    kelas_id: '',
    waktu_mulai: '',
    waktu_selesai: '',
    durasi_menit: 60,
    questions: [
        {
            pertanyaan: '',
            bobot_nilai: 5,
            options: [
                { teks_opsi: '', is_correct: false },
                { teks_opsi: '', is_correct: false },
            ],
        },
    ],
});

// --- LOGIC ---

// Toggle Preview
const togglePreview = () => {
    // Validasi sederhana sebelum preview
    if (mode.value === 'edit') {
        if (!form.judul) return alert('Isi Judul dulu sebelum preview!');
        if (form.questions.some((q) => !q.pertanyaan)) return alert('Ada pertanyaan yang belum diisi!');
        mode.value = 'preview';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    } else {
        mode.value = 'edit';
    }
};

// Filter Matpel
const onKelasChange = () => {
    form.matpel_kode = '';
    if (form.kelas_id && props.matpel_map[form.kelas_id]) {
        availableMatpels.value = props.matpel_map[form.kelas_id];
    } else {
        availableMatpels.value = [];
    }
};

// CRUD Questions
const addQuestion = () => {
    form.questions.push({
        pertanyaan: '',
        bobot_nilai: 5,
        options: [
            { teks_opsi: '', is_correct: false },
            { teks_opsi: '', is_correct: false },
        ],
    });
    setTimeout(() => window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' }), 100);
};

const removeQuestion = (index) => {
    if (form.questions.length > 1) form.questions.splice(index, 1);
};

const addOption = (qIndex) => {
    form.questions[qIndex].options.push({ teks_opsi: '', is_correct: false });
};

const removeOption = (qIndex, oIndex) => {
    if (form.questions[qIndex].options.length > 2) form.questions[qIndex].options.splice(oIndex, 1);
};

const setCorrectOption = (qIndex, oIndex) => {
    form.questions[qIndex].options.forEach((opt, idx) => {
        opt.is_correct = idx === oIndex;
    });
};

const submit = () => {
    form.post(QuizController.store().url, {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};

// Helpers untuk Preview
const totalBobot = computed(() => {
    return form.questions.reduce((acc, q) => acc + (parseInt(q.bobot_nilai) || 0), 0);
});
</script>

<template>
    <Head title="Buat Quiz Baru" />

    <div class="min-h-screen bg-gray-50 py-8">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="mb-6 flex flex-col justify-between gap-4 md:flex-row md:items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">
                        {{ mode === 'edit' ? 'Editor Quiz' : 'Preview Mode' }}
                    </h1>
                    <p class="text-sm text-gray-500">
                        {{ mode === 'edit' ? 'Atur soal dan kunci jawaban.' : 'Simulasi tampilan siswa (Kunci jawaban di-highlight).' }}
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <button
                        type="button"
                        @click="togglePreview"
                        class="flex items-center gap-2 rounded-lg border px-4 py-2 font-semibold transition-all"
                        :class="
                            mode === 'edit'
                                ? 'border-indigo-200 bg-indigo-50 text-indigo-700 hover:bg-indigo-100'
                                : 'border-gray-300 bg-white text-gray-700 hover:bg-gray-50'
                        "
                    >
                        <component :is="mode === 'edit' ? Eye : ArrowLeft" class="h-4 w-4" />
                        {{ mode === 'edit' ? 'Lihat Preview' : 'Kembali Mengedit' }}
                    </button>

                    <button
                        v-if="mode === 'edit'"
                        @click="submit"
                        :disabled="form.processing"
                        class="flex items-center gap-2 rounded-lg bg-indigo-600 px-6 py-2 font-bold text-white shadow-md transition-all hover:bg-indigo-700 disabled:opacity-50"
                    >
                        <Save class="h-4 w-4" /> Simpan
                    </button>
                </div>
            </div>

            <form v-if="mode === 'edit'" @submit.prevent="submit" class="space-y-8">
                <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-200">
                    <div class="flex items-center gap-2 border-b border-gray-100 bg-indigo-50/50 px-6 py-4">
                        <FileText class="h-5 w-5 text-indigo-600" />
                        <h3 class="font-bold text-gray-800">Informasi Dasar</h3>
                    </div>
                    <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">
                        <div class="col-span-2">
                            <label class="mb-1.5 block text-sm font-semibold text-gray-700">Judul Quiz</label>
                            <input v-model="form.judul" type="text" class="input-field" placeholder="Contoh: Ulangan Harian Bab 1" />
                            <div v-if="form.errors.judul" class="error-msg">{{ form.errors.judul }}</div>
                        </div>

                        <div>
                            <label class="mb-1.5 flex items-center gap-2 text-sm font-semibold text-gray-700">
                                <Users class="h-4 w-4 text-gray-500" /> Kelas Target
                            </label>
                            <select v-model="form.kelas_id" @change="onKelasChange" class="input-field">
                                <option value="" disabled>Pilih Kelas</option>
                                <option v-for="k in props.kelas_list" :key="k.id" :value="k.id">{{ k.nama }}</option>
                            </select>
                        </div>
                        <div>
                            <label class="mb-1.5 flex items-center gap-2 text-sm font-semibold text-gray-700">
                                <BookOpen class="h-4 w-4 text-gray-500" /> Mata Pelajaran
                            </label>
                            <select v-model="form.matpel_kode" :disabled="!form.kelas_id" class="input-field disabled:bg-gray-100">
                                <option value="" disabled>{{ form.kelas_id ? 'Pilih Matpel' : '-- Pilih Kelas Dulu --' }}</option>
                                <option v-for="m in availableMatpels" :key="m.kode" :value="m.kode">{{ m.nama }}</option>
                            </select>
                        </div>

                        <div class="col-span-2 grid grid-cols-1 gap-6 border-t border-gray-100 pt-4 md:grid-cols-3">
                            <div>
                                <label class="label">Waktu Mulai</label>
                                <input v-model="form.waktu_mulai" type="datetime-local" class="input-field" />
                            </div>
                            <div>
                                <label class="label">Deadline Selesai</label>
                                <input v-model="form.waktu_selesai" type="datetime-local" class="input-field" />
                            </div>
                            <div>
                                <label class="label">Durasi (Menit)</label>
                                <input v-model="form.durasi_menit" type="number" min="1" class="input-field" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="flex items-center justify-between px-2">
                        <h3 class="text-lg font-bold text-gray-800">Daftar Pertanyaan</h3>
                        <span class="rounded-full border bg-white px-3 py-1 text-sm font-medium text-gray-500 shadow-sm">
                            Total: {{ form.questions.length }} Soal
                        </span>
                    </div>

                    <TransitionGroup name="list" tag="div" class="space-y-6">
                        <div v-for="(question, qIndex) in form.questions" :key="qIndex" class="card-question group relative">
                            <div class="mb-4 flex justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="badge-number">{{ qIndex + 1 }}</div>
                                    <span class="text-sm font-medium text-gray-400">Edit Pertanyaan</span>
                                </div>
                                <button v-if="form.questions.length > 1" type="button" @click="removeQuestion(qIndex)" class="btn-delete">
                                    <Trash2 class="h-3.5 w-3.5" /> Hapus
                                </button>
                            </div>

                            <div class="grid grid-cols-1 gap-6 md:grid-cols-4">
                                <div class="md:col-span-3">
                                    <textarea v-model="question.pertanyaan" rows="2" class="input-field" placeholder="Tulis soal..."></textarea>
                                    <div v-if="form.errors[`questions.${qIndex}.pertanyaan`]" class="error-msg">Wajib diisi</div>
                                </div>
                                <div class="md:col-span-1">
                                    <input
                                        v-model="question.bobot_nilai"
                                        type="number"
                                        class="input-field text-center font-bold text-indigo-600"
                                        placeholder="Bobot"
                                    />
                                </div>
                            </div>

                            <div class="mt-4 rounded-xl border border-gray-100 bg-gray-50/50 p-4">
                                <div class="space-y-3">
                                    <div v-for="(option, oIndex) in question.options" :key="oIndex" class="flex items-center gap-3">
                                        <div class="relative flex items-center justify-center" title="Tandai sebagai kunci jawaban">
                                            <input
                                                type="radio"
                                                :name="`ans_${qIndex}`"
                                                :checked="option.is_correct"
                                                @change="setCorrectOption(qIndex, oIndex)"
                                                class="peer h-6 w-6 cursor-pointer appearance-none rounded-full border-2 border-gray-300 checked:border-green-500 checked:bg-green-50"
                                            />
                                            <CheckCircle2
                                                class="pointer-events-none absolute h-4 w-4 text-green-600 opacity-0 peer-checked:opacity-100"
                                            />
                                        </div>

                                        <input
                                            v-model="option.teks_opsi"
                                            type="text"
                                            class="w-full rounded-lg border px-3 py-2 text-sm shadow-sm transition-all focus:ring-2"
                                            :class="
                                                option.is_correct
                                                    ? 'border-green-300 bg-green-50/50 text-green-900 focus:border-green-500'
                                                    : 'border-gray-300 focus:border-indigo-500'
                                            "
                                            placeholder="Tulis pilihan jawaban..."
                                        />

                                        <button type="button" @click="removeOption(qIndex, oIndex)" class="text-gray-400 hover:text-red-500">
                                            <Trash2 class="h-4 w-4" />
                                        </button>
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    @click="addOption(qIndex)"
                                    class="mt-3 flex items-center gap-2 text-sm font-semibold text-indigo-600 hover:text-indigo-800"
                                >
                                    <Plus class="h-4 w-4" /> Tambah Opsi
                                </button>
                            </div>
                        </div>
                    </TransitionGroup>

                    <button type="button" @click="addQuestion" class="btn-add-question"><Plus class="h-5 w-5" /> Tambah Soal</button>
                </div>
            </form>

            <div v-else class="animate-in fade-in slide-in-from-bottom-4 duration-500">
                <div class="mb-8 rounded-2xl bg-gradient-to-br from-indigo-600 to-violet-600 p-8 text-white shadow-lg">
                    <h2 class="text-3xl font-bold">{{ form.judul || '[Judul Quiz]' }}</h2>
                    <div class="mt-4 flex flex-wrap gap-6 text-indigo-100">
                        <div class="flex items-center gap-2">
                            <Clock class="h-5 w-5" />
                            <span class="font-medium">{{ form.durasi_menit }} Menit</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <FileText class="h-5 w-5" />
                            <span class="font-medium">{{ form.questions.length }} Soal</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <AlertCircle class="h-5 w-5" />
                            <span class="font-medium">Total Skor: {{ totalBobot }} Poin</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div v-for="(q, idx) in form.questions" :key="idx" class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                        <div class="mb-4 flex gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-indigo-100 font-bold text-indigo-700">
                                {{ idx + 1 }}
                            </div>
                            <div class="w-full">
                                <p class="text-lg font-medium whitespace-pre-wrap text-gray-800">{{ q.pertanyaan || '[Pertanyaan Kosong]' }}</p>
                                <span class="mt-1 block text-xs font-semibold text-gray-400">Bobot: {{ q.bobot_nilai }} Poin</span>
                            </div>
                        </div>

                        <div class="ml-14 space-y-3">
                            <div
                                v-for="(opt, optIdx) in q.options"
                                :key="optIdx"
                                class="flex items-center gap-3 rounded-lg border px-4 py-3 transition-colors"
                                :class="[
                                    opt.is_correct ? 'border-green-200 bg-green-50 ring-1 ring-green-200' : 'border-gray-200 bg-white opacity-70',
                                ]"
                            >
                                <div
                                    class="flex h-5 w-5 items-center justify-center rounded-full border"
                                    :class="opt.is_correct ? 'border-green-500 bg-green-500 text-white' : 'border-gray-300'"
                                >
                                    <CheckCircle2 v-if="opt.is_correct" class="h-3.5 w-3.5" />
                                </div>
                                <span :class="opt.is_correct ? 'font-medium text-green-900' : 'text-gray-600'">
                                    {{ opt.teks_opsi || '[Opsi Kosong]' }}
                                </span>
                                <span v-if="opt.is_correct" class="ml-auto text-xs font-bold tracking-wider text-green-600 uppercase">
                                    Kunci Jawaban
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-center pb-12">
                    <button @click="mode = 'edit'" class="rounded-full bg-gray-900 px-8 py-3 font-bold text-white shadow-lg hover:bg-gray-800">
                        Kembali Mengedit
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
@reference "tailwindcss";
/* Utility Classes untuk CSS yang berulang */
.input-field {
    @apply w-full rounded-lg border-gray-300 bg-white p-2.5 shadow-sm transition-all focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 disabled:cursor-not-allowed;
}
.label {
    @apply mb-1.5 block text-sm font-semibold text-gray-700;
}
.error-msg {
    @apply mt-1 text-xs text-red-500;
}
.card-question {
    @apply rounded-2xl bg-white p-6 shadow-sm ring-1 ring-gray-200 transition-all hover:shadow-md hover:ring-indigo-200;
}
.badge-number {
    @apply flex h-8 w-8 items-center justify-center rounded-full bg-indigo-100 text-sm font-bold text-indigo-700;
}
.btn-delete {
    @apply flex items-center gap-1 rounded-full bg-red-50 px-3 py-1 text-xs font-semibold text-red-600 transition-colors hover:bg-red-100 hover:text-red-700;
}
.btn-add-question {
    @apply flex w-full items-center justify-center gap-2 rounded-xl border-2 border-dashed border-gray-300 bg-gray-50/50 py-4 text-sm font-bold text-gray-600 transition-all hover:border-indigo-400 hover:bg-indigo-50 hover:text-indigo-700;
}

/* Animasi List */
.list-enter-active,
.list-leave-active {
    transition: all 0.4s ease;
}
.list-enter-from,
.list-leave-to {
    opacity: 0;
    transform: translateY(-20px);
}
</style>
