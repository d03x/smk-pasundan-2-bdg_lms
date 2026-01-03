<script setup lang="ts">
import { ref, watch } from 'vue';
import { useForm, router } from '@inertiajs/vue3';
import { debounce } from 'lodash';
import Modal from '@/components/ui/modal.vue';
import Paging from '@/components/paging.vue';
import { Pencil, Trash2, Plus, Search } from 'lucide-vue-next';
import MatpelController from '@/actions/App/Http/Controllers/Admin/MatpelController';

const props = defineProps({
    matpels: Object as any,
    filters: Object as any
});

const search = ref(props.filters?.search || '');

// --- STATE MODAL ---
const showAddModal = ref(false);
const showEditModal = ref(false);

// --- FORM ---
const formAdd = useForm({
    kode: '',
    nama: '',
    kelompok: ''
});

const formEdit = useForm({
    id: null as number | null,
    kode: '',
    nama: '',
    kelompok: ''
});

// Search Logic
watch(search, debounce((val: string) => {
    router.get(
        MatpelController.index().url, 
        { search: val }, 
        { preserveState: true, replace: true }
    );
}, 300));

// --- LOGIC TAMBAH ---
const openAddModal = () => {
    formAdd.reset();
    formAdd.clearErrors();
    showAddModal.value = true;
};

const submitAdd = () => {
    formAdd.post(MatpelController.store().url, {
        onSuccess: () => {
            showAddModal.value = false;
            formAdd.reset();
        }
    });
};

// --- LOGIC EDIT (DIPERBAIKI) ---
const openEditModal = (data: any) => {
    console.log('Tombol Edit diklik', data); // Cek di Console browser (F12)
    
    if (!data) return; // Guard clause jika data kosong

    formEdit.clearErrors();
    formEdit.reset(); // Reset form agar bersih dari sisa edit sebelumnya

    // Assign data
    formEdit.id = data.id;
    formEdit.kode = data.kode;
    formEdit.nama = data.nama;
    formEdit.kelompok = data.kelompok;
    
    // Buka Modal
    showEditModal.value = true;
};

const submitEdit = () => {
    if (!formEdit.id) return;
    console.log(formEdit.data);
    formEdit.put(MatpelController.update({ matpel: formEdit.id }).url, {
        onSuccess: () => {
            showEditModal.value = false;
            formEdit.reset();
        }
    });
};

// --- LOGIC DELETE ---
const deleteData = (id: number) => {
    if (confirm('Hapus mata pelajaran ini?')) {
        router.delete(MatpelController.destroy({ matpel: id }).url);
    }
};
</script>
<template>
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Data Mata Pelajaran</h1>
            <button @click="openAddModal()" class="bg-indigo-600 text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-indigo-700 transition">
                <Plus :size="16" /> Tambah Matpel
            </button>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
            <div class="mb-4 relative max-w-sm">
                <Search class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" :size="16" />
                <input 
                    v-model="search" 
                    type="text" 
                    placeholder="Cari kode atau nama matpel..." 
                    class="pl-10 w-full border border-gray-300 rounded-lg p-2 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"
                >
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="p-3 font-semibold">Kode</th>
                            <th class="p-3 font-semibold">Nama Matpel</th>
                            <th class="p-3 font-semibold">Kelompok</th>
                            <th class="p-3 text-right font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr v-for="item in matpels.data" :key="item.id" class="hover:bg-gray-50 transition-colors">
                            <td class="p-3 font-mono font-bold text-indigo-600">{{ item.kode }}</td>
                            <td class="p-3 font-medium text-gray-900">{{ item.nama }}</td>
                            <td class="p-3 text-gray-600">
                                <span class="bg-gray-100 px-2 py-1 rounded text-xs">
                                    {{ item.kelompok || '-' }}
                                </span>
                            </td>
                            <td class="p-3 text-right">
                                <div class="flex justify-end gap-2">
                                    <button @click="openEditModal(item)" class="p-1.5 rounded-md text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 transition">
                                        <Pencil :size="18" />
                                    </button>
                                    <button @click="deleteData(item.id)" class="p-1.5 rounded-md text-gray-400 hover:text-red-600 hover:bg-red-50 transition">
                                        <Trash2 :size="18" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="matpels.data.length === 0">
                            <td colspan="4" class="p-6 text-center text-gray-500">
                                Tidak ada data mata pelajaran.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4 border-t pt-4">
                <Paging :links="matpels.links" />
            </div>
        </div>

        <Modal :isOpen="showAddModal" @close="showAddModal = false">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Tambah Mata Pelajaran</h2>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kode Matpel</label>
                        <input v-model="formAdd.kode" type="text" class="w-full border border-gray-300 rounded-lg p-2.5 uppercase focus:ring-indigo-500 focus:border-indigo-500" placeholder="MTK, IND, dsb">
                        <p v-if="formAdd.errors.kode" class="text-red-500 text-xs mt-1">{{ formAdd.errors.kode }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Matpel</label>
                        <input v-model="formAdd.nama" type="text" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Matematika">
                        <p v-if="formAdd.errors.nama" class="text-red-500 text-xs mt-1">{{ formAdd.errors.nama }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kelompok</label>
                        <select v-model="formAdd.kelompok" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">-- Pilih Kelompok --</option>
                            <option value="Muatan Nasional">Muatan Nasional</option>
                            <option value="Muatan Kewilayahan">Muatan Kewilayahan</option>
                            <option value="Muatan Kejuruan">Muatan Kejuruan</option>
                        </select>
                        <p v-if="formAdd.errors.kelompok" class="text-red-500 text-xs mt-1">{{ formAdd.errors.kelompok }}</p>
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <button @click="showAddModal = false" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Batal</button>
                    <button @click="submitAdd" :disabled="formAdd.processing" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 disabled:opacity-50">
                        {{ formAdd.processing ? 'Menyimpan...' : 'Simpan' }}
                    </button>
                </div>
            </div>
        </Modal>

        <Modal :isOpen="showEditModal" @close="showEditModal = false">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold text-gray-900">Edit Mata Pelajaran</h2>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kode Matpel</label>
                        <input v-model="formEdit.kode" type="text" class="w-full border border-gray-300 rounded-lg p-2.5 uppercase focus:ring-indigo-500 focus:border-indigo-500">
                        <p v-if="formEdit.errors.kode" class="text-red-500 text-xs mt-1">{{ formEdit.errors.kode }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Matpel</label>
                        <input v-model="formEdit.nama" type="text" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-indigo-500 focus:border-indigo-500">
                        <p v-if="formEdit.errors.nama" class="text-red-500 text-xs mt-1">{{ formEdit.errors.nama }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kelompok</label>
                        <select v-model="formEdit.kelompok" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">-- Pilih Kelompok --</option>
                            <option value="Muatan Nasional">Muatan Nasional</option>
                            <option value="Muatan Kewilayahan">Muatan Kewilayahan</option>
                            <option value="Muatan Kejuruan">Muatan Kejuruan</option>
                        </select>
                        <p v-if="formEdit.errors.kelompok" class="text-red-500 text-xs mt-1">{{ formEdit.errors.kelompok }}</p>
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <button 
                        @click="showEditModal = false" 
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50"
                    >
                        Batal
                    </button>
                    <button 
                        @click="submitEdit" 
                        :disabled="formEdit.processing" 
                        class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 disabled:opacity-50"
                    >
                        {{ formEdit.processing ? 'Menyimpan...' : 'Update' }}
                    </button>
                </div>
            </div>
        </Modal>
    </div>
</template>