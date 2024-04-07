<template>

    <Head title="Edit Articles" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Article</h2>
        </template>
        <div class="container m-auto">
            <NavLinks></NavLinks>
            <div>
                <input type="text" v-model="form.title" class="w-full" />
            </div>
            <div>
                <MyCKEditor :content="form.content" @updateContent="updateContent"></MyCKEditor>
            </div>
            <button class="btn-blue" @click="updateArticle">Update Article</button>

        </div>
    </AuthenticatedLayout>
</template>

<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { onMounted } from 'vue';

import MyCKEditor from '@/Components/MyCKEditor.vue';

import NavLinks from "./Nav.vue";

const props = defineProps({
    auth: Object,
    article: Object
})

onMounted(() => {

})

const form = useForm({
    id: props.article?.id,
    title: props.article?.title,
    content: props.article?.content,
})
onMounted(() => {
    form.user_id = props.auth?.user.id
})

function updateArticle() {
    form.put(`/articles/${form.id}`);
}

function updateContent(c) {
    console.log('parent ',c);
    form.content = c;
}

</script>

<style lang="scss" scoped></style>
