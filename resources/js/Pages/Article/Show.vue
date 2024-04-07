<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Articles</h2>
        </template>
        <div class="container m-auto mt-5">
            <NavLinks></NavLinks>
            <div class="mb-1">
                <span class="text-xs">ID:{{ article.id }}</span>
            </div>
            <div class="mb-3">
                <h2>{{ article.title }}</h2>
            </div>
            <div v-html="article.content">
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import NavLinks from './Nav.vue';
const props = defineProps({
    article: Object
})
</script>

<style lang="scss" scoped></style>
