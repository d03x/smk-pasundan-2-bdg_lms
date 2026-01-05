<script setup lang="ts">
import { showMateri } from '@/actions/App/Http/Controllers/MateriController';
import { showTugas } from '@/actions/App/Http/Controllers/TugasSiswaController';
// 1. Import Action untuk Quiz Siswa (sesuaikan path dengan generator Anda)
import { index as showQuiz } from '@/actions/App/Http/Controllers/Siswa/QuizController';

// 2. Import Icons
import HugeiconsTaskDaily01 from '@/icons/HugeiconsTaskDaily01.vue';
import MaterialSymbolsMarkdownPaste from '@/icons/MaterialSymbolsMarkdownPaste.vue';
import MaterialSymbolsMenuBookOutlineRounded from '@/icons/MaterialSymbolsMenuBookOutlineRounded.vue';
import SolarSquareAcademicCap2Bold from '@/icons/SolarSquareAcademicCap2Bold.vue';
// Icon baru untuk Quiz (Contoh pakai Material Symbol)

import MenuItem from './menu-item.vue';

function redirectToAbsensi() {
    return 'SistemAbsensi.php';
}
</script>

<template>
    <MenuItem label="Akademik" href="/" :has-dropdown="true" :icon="SolarSquareAcademicCap2Bold">
        <MenuItem label="Materi" :href="showMateri()" :icon="MaterialSymbolsMenuBookOutlineRounded" />
        <MenuItem label="Tugas" :href="showTugas()" :icon="HugeiconsTaskDaily01" />

        <MenuItem label="Ujian / Quiz" :href="showQuiz()" :icon="MaterialSymbolsMarkdownPaste" />

        <MenuItem label="Absensi" :href="redirectToAbsensi()" :icon="MaterialSymbolsMarkdownPaste" />
    </MenuItem>
</template>
