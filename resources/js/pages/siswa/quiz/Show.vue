<script setup>
import QuizController from '@/actions/App/Http/Controllers/Siswa/QuizController';
import { Head, useForm } from '@inertiajs/vue3';
import { CheckCircle2, ChevronLeft, ChevronRight, Clock, FileText, HelpCircle, Save } from 'lucide-vue-next';
import { computed, onMounted, onUnmounted, ref } from 'vue';

// Props yang dikirim dari controller (Quiz + Questions + Options)
const props = defineProps({
    quiz: Object,
});

// --- STATE ---
const currentQuestionIndex = ref(0); // Index soal yang sedang dilihat
const timeLeft = ref('');
const isTimeCritical = ref(false);
const timerInterval = ref(null);
const isSubmitting = ref(false);

// State Jawaban Lokal (Key: question_id, Value: option_id)
const selectedAnswers = ref({});

// Form Inertia untuk submit
const form = useForm({
    answers: [], // Nanti diisi array of objects {question_id, option_id}
});

// --- COMPUTED ---
const currentQuestion = computed(() => {
    return props.quiz.questions[currentQuestionIndex.value];
});

const totalQuestions = computed(() => props.quiz.questions.length);

const progressPercentage = computed(() => {
    const answeredCount = Object.keys(selectedAnswers.value).length;
    return Math.round((answeredCount / totalQuestions.value) * 100);
});

// --- LOGIC TIMER ---
const startTimer = () => {
    // Ambil waktu selesai dari database
    const endTime = new Date(props.quiz.waktu_selesai).getTime();

    timerInterval.value = setInterval(() => {
        const now = new Date().getTime();
        const distance = endTime - now;

        // Jika waktu habis
        if (distance < 0) {
            clearInterval(timerInterval.value);
            timeLeft.value = '00:00:00';
            handleAutoSubmit(); // Force submit
            return;
        }

        // Hitung jam, menit, detik
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Format tampilan
        timeLeft.value = `${hours > 0 ? hours + ':' : ''}${minutes < 10 ? '0' + minutes : minutes}:${seconds < 10 ? '0' + seconds : seconds}`;

        // Warning jika sisa < 5 menit
        if (distance < 5 * 60 * 1000) {
            isTimeCritical.value = true;
        }
    }, 1000);
};

// --- LOGIC NAVIGASI ---
const nextQuestion = () => {
    if (currentQuestionIndex.value < totalQuestions.value - 1) {
        currentQuestionIndex.value++;
    }
};

const prevQuestion = () => {
    if (currentQuestionIndex.value > 0) {
        currentQuestionIndex.value--;
    }
};

const jumpToQuestion = (index) => {
    currentQuestionIndex.value = index;
};

// --- LOGIC SUBMIT ---
const prepareFormData = () => {
    // Convert object selectedAnswers ke array format yang diminta controller
    return Object.entries(selectedAnswers.value).map(([qId, oId]) => ({
        question_id: parseInt(qId),
        option_id: oId,
    }));
};

const submitQuiz = () => {
    if (!confirm('Apakah Anda yakin ingin menyelesaikan ujian ini? Jawaban tidak dapat diubah setelah dikirim.')) return;

    processSubmit();
};

const handleAutoSubmit = () => {
    alert('Waktu ujian telah habis! Jawaban Anda akan dikirim otomatis.');
    processSubmit();
};

const processSubmit = () => {
    isSubmitting.value = true;
    form.answers = prepareFormData();

    form.post(QuizController.store(props.quiz.id).url, {
        onFinish: () => {
            isSubmitting.value = false;
            clearInterval(timerInterval.value);
        },
    });
};

// --- LIFECYCLE ---
onMounted(() => {
    startTimer();
    // Warning jika user mencoba refresh/tutup tab
    window.onbeforeunload = function () {
        return 'Ujian sedang berlangsung. Apakah Anda yakin ingin keluar?';
    };
});

onUnmounted(() => {
    clearInterval(timerInterval.value);
    window.onbeforeunload = null;
});
</script>

<template>
    <Head :title="`Mengerjakan: ${quiz.judul}`" />

    <div class="flex min-h-screen flex-col bg-gray-50">
        <header class="sticky top-0 z-20 border-b bg-white shadow-sm">
            <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-3">
                    <div class="rounded-lg bg-indigo-100 p-2">
                        <FileText class="h-5 w-5 text-indigo-600" />
                    </div>
                    <div>
                        <h1 class="line-clamp-1 max-w-[200px] text-sm font-bold text-gray-900 md:max-w-md">
                            {{ quiz.judul }}
                        </h1>
                        <p class="hidden text-xs text-gray-500 md:block">{{ quiz.matpel?.nama }} - {{ quiz.guru?.nama }}</p>
                    </div>
                </div>

                <div
                    class="flex items-center gap-2 rounded-full border px-4 py-2 font-mono text-lg font-bold shadow-sm"
                    :class="isTimeCritical ? 'animate-pulse border-red-200 bg-red-50 text-red-600' : 'border-gray-200 bg-gray-50 text-gray-700'"
                >
                    <Clock class="h-5 w-5" />
                    <span>{{ timeLeft }}</span>
                </div>
            </div>

            <div class="h-1 w-full bg-gray-100">
                <div class="h-1 bg-indigo-500 transition-all duration-300" :style="{ width: `${progressPercentage}%` }"></div>
            </div>
        </header>

        <main class="mx-auto flex w-full max-w-7xl flex-1 flex-col gap-6 p-4 sm:p-6 lg:flex-row lg:p-8">
            <div class="flex flex-1 flex-col">
                <div class="flex min-h-[400px] flex-col rounded-2xl border border-gray-200 bg-white p-6 shadow-sm md:p-8">
                    <div class="mb-6 flex items-start justify-between">
                        <span class="rounded-full bg-indigo-50 px-3 py-1 text-sm font-bold text-indigo-700">
                            Soal No. {{ currentQuestionIndex + 1 }}
                        </span>
                        <span class="text-sm font-medium text-gray-400"> Bobot: {{ currentQuestion?.bobot_nilai }} Poin </span>
                    </div>

                    <div class="mb-8 text-lg leading-relaxed font-medium whitespace-pre-wrap text-gray-800 md:text-xl">
                        {{ currentQuestion?.question }}
                    </div>

                    <div class="mt-auto space-y-3">
                        <div
                            v-for="option in currentQuestion.options"
                            :key="option.id"
                            @click="selectedAnswers[currentQuestion.id] = option.id"
                            class="group relative flex cursor-pointer items-center gap-4 rounded-xl border-2 p-4 transition-all hover:bg-gray-50"
                            :class="selectedAnswers[currentQuestion.id] === option.id ? 'border-indigo-600 bg-indigo-50/50' : 'border-gray-200'"
                        >
                            <div
                                class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full border-2 transition-colors"
                                :class="
                                    selectedAnswers[currentQuestion.id] === option.id
                                        ? 'border-indigo-600 bg-indigo-600'
                                        : 'border-gray-300 group-hover:border-gray-400'
                                "
                            >
                                <div class="h-2.5 w-2.5 rounded-full bg-white"></div>
                            </div>

                            <span class="font-medium text-gray-700 group-hover:text-gray-900">
                                {{ option.teks_opsi }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-between">
                    <button
                        @click="prevQuestion"
                        :disabled="currentQuestionIndex === 0"
                        class="flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-5 py-2.5 font-bold text-gray-600 shadow-sm hover:bg-gray-50 disabled:cursor-not-allowed disabled:opacity-50"
                    >
                        <ChevronLeft class="h-5 w-5" /> Sebelumnya
                    </button>

                    <button
                        v-if="currentQuestionIndex < totalQuestions - 1"
                        @click="nextQuestion"
                        class="flex items-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 font-bold text-white shadow-md shadow-indigo-200 hover:bg-indigo-700 hover:shadow-lg"
                    >
                        Selanjutnya <ChevronRight class="h-5 w-5" />
                    </button>

                    <button
                        v-else
                        @click="submitQuiz"
                        :disabled="isSubmitting"
                        class="flex items-center gap-2 rounded-xl bg-green-600 px-6 py-2.5 font-bold text-white shadow-md shadow-green-200 hover:bg-green-700 hover:shadow-lg disabled:opacity-70"
                    >
                        <Save class="h-5 w-5" /> {{ isSubmitting ? 'Mengirim...' : 'Selesai & Kumpulkan' }}
                    </button>
                </div>
            </div>

            <div class="w-full shrink-0 lg:w-80">
                <div class="sticky top-24 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                    <div class="mb-4 flex items-center justify-between">
                        <h3 class="flex items-center gap-2 font-bold text-gray-900"><HelpCircle class="h-5 w-5 text-gray-400" /> Navigasi Soal</h3>
                        <span class="rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-600">
                            {{ Object.keys(selectedAnswers).length }} / {{ totalQuestions }} Terjawab
                        </span>
                    </div>

                    <div class="grid grid-cols-5 gap-2">
                        <button
                            v-for="(q, index) in quiz.questions"
                            :key="q.id"
                            @click="jumpToQuestion(index)"
                            class="relative flex h-10 w-10 items-center justify-center rounded-lg border text-sm font-bold transition-all"
                            :class="[
                                currentQuestionIndex === index
                                    ? 'z-10 border-indigo-600 ring-2 ring-indigo-500 ring-offset-2'
                                    : 'border-gray-200 hover:bg-gray-50',
                                selectedAnswers[q.id] ? 'border-indigo-600 bg-indigo-600 text-white' : 'bg-white text-gray-600',
                            ]"
                        >
                            {{ index + 1 }}
                        </button>
                    </div>

                    <div class="mt-6 border-t border-gray-100 pt-6">
                        <div class="mb-4 flex gap-4 text-xs text-gray-500">
                            <div class="flex items-center gap-1">
                                <div class="h-3 w-3 rounded-sm border border-gray-300 bg-white"></div>
                                Belum
                            </div>
                            <div class="flex items-center gap-1">
                                <div class="h-3 w-3 rounded-sm border border-indigo-600 bg-indigo-600"></div>
                                Dijawab
                            </div>
                            <div class="flex items-center gap-1">
                                <div class="h-3 w-3 rounded-sm border-2 border-indigo-600"></div>
                                Aktif
                            </div>
                        </div>

                        <button
                            @click="submitQuiz"
                            :disabled="isSubmitting"
                            class="flex w-full items-center justify-center gap-2 rounded-xl bg-green-600 py-3 font-bold text-white shadow-md shadow-green-200 transition-all hover:bg-green-700 hover:shadow-lg"
                        >
                            <CheckCircle2 class="h-5 w-5" /> Kumpulkan Jawaban
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
