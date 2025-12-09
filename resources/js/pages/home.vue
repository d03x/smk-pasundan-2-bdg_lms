<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { formatTanggal } from '@/lib/utils';
import { computed } from 'vue';
// Icons
import HugeiconsTaskDaily01 from '@/icons/HugeiconsTaskDaily01.vue';
import HugeiconsTime02 from '@/icons/HugeiconsTime02.vue'; // Icon jam
import MaterialSymbolsCheckCircle from '@/icons/MaterialSymbolsCheckCircleUnreadOutline.vue';
import { kerjakan } from '@/routes/siswa/tugas';

const page = usePage();
const user = computed(() => page.props.auth.user as any);
const pendingTasks = computed(() => page.props.pending_tugas as any || []);

// Helper hitung sisa hari
const getDaysLeft = (deadline: string) => {
    const today = new Date();
    const due = new Date(deadline);
    const diff = Math.ceil((due.getTime() - today.getTime()) / (1000 * 60 * 60 * 24));
    return diff;
};
</script>

<template>
    <div class="mx-auto mt-4 max-w-7xl pb-20">
        
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-12 items-start">
            
            <div class="space-y-6 lg:col-span-8">
                
                <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h2 class="text-2xl font-bold text-neutral-800">Halo, {{ user.nama }}</h2>
                            <p class="text-neutral-500 text-sm mt-1">
                                Selamat datang kembali di ruang belajar Anda.
                            </p>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="px-3 py-1 rounded bg-neutral-100 border border-neutral-200 text-xs font-semibold text-neutral-600 uppercase tracking-wider">
                                {{ user.role }}
                            </div>
                            <div v-if="user.kelas" class="px-3 py-1 rounded bg-blue-50 border border-blue-100 text-xs font-semibold text-blue-700">
                                {{ user.kelas.nama }}
                            </div>
                        </div>
                    </div>
                </div>

                <div  v-if="user.role === 'siswa'" class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="p-4 rounded-xl border border-neutral-200 bg-white">
                        <p class="text-xs text-neutral-400 font-medium uppercase">Tugas Menunggu</p>
                        <p class="text-2xl font-bold text-neutral-800 mt-1">{{ pendingTasks.length }}</p>
                    </div>
                    
                </div>

            </div>

            <div v-if="user.role === 'siswa'" class="lg:col-span-4 sticky top-6">
                
                <div class="rounded-xl border border-neutral-200 bg-white shadow-sm overflow-hidden">
                    
                    <div class="flex items-center justify-between border-b border-neutral-100 px-5 py-4">
                        <h3 class="font-bold text-neutral-800">Tugas Anda</h3>
                        <Link href="/siswa/tugas" class="text-xs font-medium text-neutral-400 hover:text-neutral-800 transition-colors">
                            Lihat Semua
                        </Link>
                    </div>

                    <div v-if="pendingTasks.length > 0" class="divide-y divide-neutral-100">
                        <div 
                            v-for="task in pendingTasks" 
                            :key="task.tugasID" 
                            class="group relative p-4 transition-all hover:bg-neutral-50"
                        >
                            <div 
                                class="absolute left-0 top-0 bottom-0 w-[3px]"
                                :class="getDaysLeft(task.deadline) <= 1 ? 'bg-red-500' : 'bg-transparent group-hover:bg-blue-500'"
                            ></div>

                            <div class="pl-2">
                                <div class="flex justify-between items-start mb-1">
                                    <span class="text-[10px] font-bold text-neutral-400 uppercase tracking-wide">
                                        {{ task.matpel?.nama }}
                                    </span>
                                    
                                    <span class="text-[10px] font-medium"
                                        :class="getDaysLeft(task.deadline) <= 1 ? 'text-red-600' : 'text-neutral-400'">
                                        {{ getDaysLeft(task.deadline) === 0 ? 'Hari Ini' : getDaysLeft(task.deadline) + ' hari lagi' }}
                                    </span>
                                </div>

                                <Link :href="kerjakan({ id: task.tugasID })" class="block mb-2">
                                    <h4 class="text-sm font-semibold text-neutral-800 leading-snug group-hover:text-blue-600 transition-colors">
                                        {{ task.title }}
                                    </h4>
                                </Link>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-1.5 text-xs text-neutral-500">
                                        <HugeiconsTime02 class="text-neutral-400" />
                                        <span>{{ formatTanggal(task.deadline) }}</span>
                                    </div>

                                    <Link 
                                        :href="kerjakan({ id: task.tugasID })" 
                                        class="opacity-0 group-hover:opacity-100 transition-opacity text-xs font-semibold text-blue-600 hover:underline"
                                    >
                                        Kerjakan &rarr;
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-else class="py-12 px-6 text-center">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-neutral-50 text-neutral-300 mb-3">
                            <MaterialSymbolsCheckCircle class="text-2xl" />
                        </div>
                        <p class="text-sm font-semibold text-neutral-900">Tidak ada tagihan tugas</p>
                        <p class="text-xs text-neutral-500 mt-1">Anda bisa bersantai sejenak.</p>
                    </div>

                </div>

            </div>

        </div>
    </div>
</template>