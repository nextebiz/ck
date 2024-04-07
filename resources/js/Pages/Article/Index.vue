<template>

    <Head title="Articles" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">All Articles</h2>
        </template>
        <div class="container m-auto">
            <NavLinks></NavLinks>
            total:{{ articles.data.length }}

            <div>

                <table class="mytable">
                    <thead>
                        <tr>
                            <td class="w-[50px] text-center">
                                id
                            </td>
                            <td>
                                title
                            </td>
                            <td class="w-[80px] text-center">
                                View
                            </td>
                            <td class="w-[80px] text-center">
                                edit
                            </td>
                            <td class="w-[80px] text-center">
                                delete
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="article in articles.data" :key="article.id">
                            <td class="w-[50px] text-center">

                                {{ article.id }}
                            </td>
                            <td>
                                {{ article.title }}
                            </td>
                            <td class="w-[80px] text-center">
                                <Link class="link-blue" :href="`/articles/${article.id}`">View</Link>
                            </td>
                            <td class="w-[80px] text-center">
                                <Link class="link-blue" :href="`/articles/${article.id}/edit`">Edit</Link>
                            </td>
                            <td class="w-[80px] text-center">
                                <button class="btn-red" @click="deleteArticle(article.id)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import NavLinks from './Nav.vue';
const props = defineProps({
    articles: Object
})

const form = useForm({
    article_id: 0
})

function deleteArticle(id) {
    if (confirm('Are you sure')) {
        form.article_id = id;
        if (form.article_id > 0) {
            form.delete(`/articles/${id}`);
        }
    }
}
</script>

<style lang="scss" scoped></style>
