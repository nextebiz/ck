<template>

    <Head title="Create Article" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Articles</h2>
        </template>
        <div class="container m-auto">
            <NavLinks></NavLinks>
            <div class="mb-3">
                <input type="text" v-model="form.title" class="w-full" />
            </div>
            <div>
                <MyCKEditor :content="form.content" @updateContent="updateContent"></MyCKEditor>
            </div>

            <div>
                user: {{ form.user_id }}
            </div>

            <button class="btn-blue" @click="submitArticle">Save Article</button>
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
    auth: Object
})

const form = useForm({
    title: 'x',
    content: 'c',
    user_id: 0
})
onMounted(() => {
    form.user_id = props.auth?.user.id
})

function submitArticle() {
    form.post('/articles');
}

function updateContent(c){
    console.log('i am parent', c)
    form.content = c;
}

</script>

<style lang="scss" scoped></style>
