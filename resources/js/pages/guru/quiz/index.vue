<script setup>
import QuizController from '@/actions/App/Http/Controllers/Guru/QuizController';
import { Link } from '@inertiajs/vue3';

// Menerima props 'quizzes' yang dikirim dari QuizController
const props = defineProps({
    quizzes: Array,
});

// Helper sederhana untuk format tanggal (Contoh: 20 Jan 2025, 10:00)
const formatDate = (dateString) => {
    if (!dateString) return '-';
    const date = new Date(dateString);
    return new Intl.DateTimeFormat('id-ID', {
        day: 'numeric',
        month: 'short',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
    }).format(date);
};
</script>

<template>
    <Head title="Daftar Kuis" />

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div
                v-if="$page.props?.flash?.success"
                class="relative mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700"
                role="alert"
            >
                <span class="block sm:inline">{{ $page?.props?.flash?.success }}</span>
            </div>

            <div class="mb-6 flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900">Daftar Kuis Anda</h3>

                <Link
                    :href="QuizController.create().url"
                    class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out hover:bg-indigo-700 focus:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none active:bg-indigo-900"
                >
                    + Buat Quiz Baru
                </Link>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium tracking-wider text-gray-500 uppercase">Judul Quiz</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium tracking-wider text-gray-500 uppercase">
                                    Target (Kelas/Mapel)
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium tracking-wider text-gray-500 uppercase">Jadwal</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium tracking-wider text-gray-500 uppercase">Status</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium tracking-wider text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-if="quizzes.length === 0">
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500 italic">Belum ada quiz yang dibuat. Silakan buat baru.</td>
                            </tr>

                            <tr v-for="quiz in quizzes" :key="quiz.id" class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ quiz.judul }}</div>
                                    <div class="text-xs text-gray-500">{{ quiz.durasi_menit }} Menit</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ quiz.matpel?.nama ?? '-' }}</div>
                                    <span class="inline-flex rounded-full bg-blue-100 px-2 text-xs leading-5 font-semibold text-blue-800">
                                        {{ quiz.kelas?.nama ?? 'Semua Kelas' }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">
                                        Mulai: <span class="text-gray-900">{{ formatDate(quiz.waktu_mulai) }}</span>
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        Selesai: <span class="text-red-600">{{ formatDate(quiz.waktu_selesai) }}</span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        v-if="quiz.status === 'published'"
                                        class="inline-flex rounded-full bg-green-100 px-2 text-xs leading-5 font-semibold text-green-800"
                                    >
                                        Published
                                    </span>
                                    <span v-else class="inline-flex rounded-full bg-gray-100 px-2 text-xs leading-5 font-semibold text-gray-800">
                                        Draft
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-right text-sm font-medium whitespace-nowrap">
                                    <Link :href="QuizController.edit({ quiz: quiz.id })" class="mr-4 text-indigo-600 hover:text-indigo-900">
                                        Edit
                                    </Link>
                                    <Link
                                        :href="QuizController.edit({ quiz: quiz.id })"
                                        method="delete"
                                        as="button"
                                        class="text-red-600 hover:text-red-900"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kuis ini?')"
                                    >
                                        Hapus
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
