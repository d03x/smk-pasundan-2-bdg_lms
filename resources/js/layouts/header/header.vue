<template>
    <header style="background-image: url('https://edlink.id/assets/img/base.png');"
        class="z-40 h-24 bg-primary bg-cover bg-no-repeat bg-left text-primary-foreground lg:h-header">
        <div class="container mx-auto flex h-24 items-center justify-between px-2 lg:px-0">

            <Logo />

            <!-- hanya avatar di header -->
            <button @click="toggleProfile" class="relative z-50">
                <Avatar :fallback="$page.props.auth.user.name" />
            </button>
        </div>
    </header>

    <!-- DROPDOWN DIPISAH DI LUAR HEADER supaya tidak ketiban -->
    <div ref="profileRef" class="relative w-full">
        <AnimatePresence>
            <motion.div v-if="profileOpen" :initial="{ opacity: 0, y: -10 }" :animate="{ opacity: 1, y: 0 }"
                :exit="{ opacity: 0, y: -10 }" :transition="{ duration: 0.15 }"
                class="absolute right-4 top-[-80px] w-56 rounded-lg border-neutral-200 bg-white shadow-lg border p-4 z-[9999]">
                <div class="flex flex-col">
                    <p class="text-sm font-semibold">
                        {{ $page.props.auth.user.name }}
                    </p>
                    <p class="text-xs text-neutral-500 line-clamp-1">
                        {{ $page.props.auth.user.email }}
                    </p>

                    <hr class="my-3 text-neutral-100">

                    <Link href="" class="text-sm py-1 hover:text-primary">
                        Profil Saya
                    </Link>

                    <Link href="" method="post" class="text-sm py-1 text-red-600 hover:text-red-700">
                        Logout
                    </Link>
                </div>
            </motion.div>
        </AnimatePresence>
    </div>

    <nav class="sticky top-0 z-50 shadow bg-white">
        <AppMenu />
    </nav>
</template>


<script setup lang="ts">
import Avatar from '@/components/avatar.vue';
import Logo from './logo.vue';
import AppMenu from './menu/app-menu.vue';
import { Link, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import { motion, AnimatePresence } from 'motion-v';
import { onClickOutside } from "@vueuse/core";

const profileOpen = ref(false);
const profileRef = ref(null);

const toggleProfile = () => {
    profileOpen.value = !profileOpen.value;
};

onClickOutside(profileRef, () => {
    profileOpen.value = false;
});

</script>
