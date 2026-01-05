<script setup>
import QuizController from '@/actions/App/Http/Controllers/Siswa/QuizController';
import { Head, Link, usePage } from '@inertiajs/vue3'; // Tambah usePage
import { AlertCircle, ArrowRight, BookOpen, CalendarClock, CheckCircle, CheckCircle2, Clock, Timer, User, X } from 'lucide-vue-next';
import { ref, watch } from 'vue'; // Tambah ref dan watch

// Props dari Controller
const props = defineProps({
    quizzes: Array,
});

// --- LOGIC NOTIFIKASI ---
const page = usePage();
const showNotification = ref(false);
const notificationMessage = ref('');
const notificationType = ref('success'); // 'success' | 'error'

// Pantau perubahan pada Flash Message (Success)
watch(
    () => page.props?.flash?.success,
    (msg) => {
        if (msg) {
            notificationMessage.value = msg;
            notificationType.value = 'success';
            showNotification.value = true;
            autoHide();
        }
    },
    { immediate: true },
);
let autoHide = () => {
    setTimeout(() => {
        showNotification.value = false;
        // Reset manual agar bisa ditrigger lagi jika pesan sama
        page.props.flash.success = null;
        page.props.errors.error = null;
    }, 4000); // Hilang dalam 4 detik
};
// Pantau perubahan pada Errors (Error custom dari controller)
watch(
    () => page?.props?.errors?.error,
    (msg) => {
        if (msg) {
            notificationMessage.value = msg;
            notificationType.value = 'error';
            showNotification.value = true;
            autoHide();
        }
    },
    { immediate: true },
);

// --- HELPERS ---
const formatDate = (dateString) => {
    if (!dateString) return '-';
    return new Date(dateString).toLocaleDateString('id-ID', {
        weekday: 'long',
        day: 'numeric',
        month: 'short',
        hour: '2-digit',
        minute: '2-digit',
    });
};

const getQuizStatus = (start, end) => {
    const now = new Date();
    const startTime = new Date(start);
    const endTime = new Date(end);

    if (now < startTime) {
        return { label: 'Belum Dimulai', color: 'bg-yellow-100 text-yellow-700 border-yellow-200', code: 'upcoming' };
    } else if (now >= startTime && now <= endTime) {
        return { label: 'Tersedia', color: 'bg-green-100 text-green-700 border-green-200', code: 'active' };
    } else {
        return { label: 'Selesai', color: 'bg-gray-100 text-gray-500 border-gray-200', code: 'expired' };
    }
};
</script>

<template>
    <Head title="Daftar Ujian & Quiz" />

    <Transition
        enter-active-class="transform ease-out duration-300 transition"
        enter-from-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        enter-to-class="translate-y-0 opacity-100 sm:translate-x-0"
        leave-active-class="transition ease-in duration-100"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="showNotification"
            class="fixed top-5 right-5 z-50 flex w-full max-w-sm items-center gap-3 rounded-xl border bg-white p-4 shadow-xl"
            :class="notificationType === 'success' ? 'border-green-200 ring-1 ring-green-100' : 'border-red-200 ring-1 ring-red-100'"
        >
            <div
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full"
                :class="notificationType === 'success' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600'"
            >
                <CheckCircle v-if="notificationType === 'success'" class="h-6 w-6" />
                <AlertCircle v-else class="h-6 w-6" />
            </div>

            <div class="flex-1">
                <h4 class="text-sm font-bold text-gray-900">
                    {{ notificationType === 'success' ? 'Berhasil' : 'Perhatian' }}
                </h4>
                <p class="text-sm text-gray-600">{{ notificationMessage }}</p>
            </div>

            <button @click="showNotification = false" class="text-gray-400 hover:text-gray-600">
                <X class="h-5 w-5" />
            </button>
        </div>
    </Transition>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-8 flex flex-col justify-between gap-4 md:flex-row md:items-end">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Ujian & Quiz</h1>
                    <p class="mt-1 text-gray-500">Daftar ujian yang tersedia untuk kelas Anda.</p>
                </div>
            </div>

            <div
                v-if="quizzes.length === 0"
                class="flex flex-col items-center justify-center rounded-2xl border border-gray-100 bg-white p-12 text-center shadow-sm"
            >
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-indigo-50">
                    <BookOpen class="h-8 w-8 text-indigo-400" />
                </div>
                <h3 class="mt-4 text-lg font-bold text-gray-900">Belum ada Quiz</h3>
                <p class="text-gray-500">Saat ini belum ada jadwal ujian atau quiz untuk kelas Anda.</p>
            </div>

            <div v-else class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                <div
                    v-for="quiz in quizzes"
                    :key="quiz.id"
                    class="group relative flex flex-col justify-between overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-200 transition-all hover:-translate-y-1 hover:shadow-md"
                >
                    <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-5 py-4">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center gap-2">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-indigo-100 text-indigo-600">
                                    <BookOpen class="h-4 w-4" />
                                </div>
                                <span class="max-w-[120px] truncate text-sm font-bold text-gray-700">
                                    {{ quiz.matpel?.nama || 'Umum' }}
                                </span>
                            </div>

                            <span
                                class="rounded-full border px-2.5 py-0.5 text-xs font-bold"
                                :class="getQuizStatus(quiz.waktu_mulai, quiz.waktu_selesai).color"
                            >
                                {{ getQuizStatus(quiz.waktu_mulai, quiz.waktu_selesai).label }}
                            </span>
                        </div>
                    </div>

                    <div class="p-5">
                        <h3 class="mb-2 line-clamp-2 text-lg leading-snug font-bold text-gray-900">
                            {{ quiz.judul }}
                        </h3>

                        <div class="mb-4 flex items-center gap-2 text-sm text-gray-500">
                            <User class="h-3.5 w-3.5" />
                            <span>{{ quiz.guru?.nama || 'Guru Pengampu' }}</span>
                        </div>

                        <div class="space-y-3 rounded-xl bg-gray-50 p-3 text-sm">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2 text-gray-600">
                                    <CalendarClock class="h-4 w-4 text-indigo-500" />
                                    <span>Mulai</span>
                                </div>
                                <span class="text-xs font-medium text-gray-900">
                                    {{ formatDate(quiz.waktu_mulai) }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2 text-gray-600">
                                    <AlertCircle class="h-4 w-4 text-red-500" />
                                    <span>Selesai</span>
                                </div>
                                <span class="text-xs font-medium text-gray-900">
                                    {{ formatDate(quiz.waktu_selesai) }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between border-t border-gray-200 pt-2">
                                <div class="flex items-center gap-2 text-gray-600">
                                    <Timer class="h-4 w-4 text-orange-500" />
                                    <span>Durasi</span>
                                </div>
                                <span class="font-bold text-gray-900"> {{ quiz.durasi_menit }} Menit </span>
                            </div>
                        </div>
                    </div>

                    <div class="px-5 pb-5">
                        <template v-if="getQuizStatus(quiz.waktu_mulai, quiz.waktu_selesai).code === 'active'">
                            <Link
                                :href="QuizController.show(quiz.id).url"
                                class="flex w-full items-center justify-center gap-2 rounded-xl bg-indigo-600 py-2.5 text-sm font-bold text-white shadow-md shadow-indigo-200 transition-all hover:bg-indigo-700 hover:shadow-lg"
                            >
                                Kerjakan Sekarang <ArrowRight class="h-4 w-4" />
                            </Link>
                        </template>

                        <template v-else-if="getQuizStatus(quiz.waktu_mulai, quiz.waktu_selesai).code === 'upcoming'">
                            <button
                                disabled
                                class="flex w-full cursor-not-allowed items-center justify-center gap-2 rounded-xl bg-gray-100 py-2.5 text-sm font-bold text-gray-400"
                            >
                                <Clock class="h-4 w-4" /> Belum Dibuka
                            </button>
                        </template>

                        <template v-else>
                            <button
                                disabled
                                class="flex w-full cursor-not-allowed items-center justify-center gap-2 rounded-xl bg-gray-100 py-2.5 text-sm font-bold text-gray-400"
                            >
                                <CheckCircle2 class="h-4 w-4" /> Sudah Berakhir
                            </button>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
