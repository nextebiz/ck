<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <div class="container m-auto  h-screen flex items-center justify-center">
        <div class="bg-gray-300 px-5 py-5">
            <div class="text-center mb-2">Welcome To Our Site</div>
            <div class="flex justify-between px-5">
                <Link href="login" class="bg-blue-300 px-3 py-1 me-2">
                Login
                </Link>
                <Link href="register" class="bg-blue-300 px-3 py-1">
                Register
                </Link>
            </div>
        </div>
    </div>
</template>
