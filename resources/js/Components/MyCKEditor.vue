<template>
    <div>
        <ckeditor :editor="editor" v-model="form.content" :config="editorConfig"></ckeditor>
    </div>
</template>

<script setup>

// import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
import { ClassicEditor } from "@ckeditor/ckeditor5-editor-classic"

import { Essentials } from '@ckeditor/ckeditor5-essentials';
import { Bold, Italic } from '@ckeditor/ckeditor5-basic-styles';
import { Link } from '@ckeditor/ckeditor5-link';
import { Paragraph } from '@ckeditor/ckeditor5-paragraph';


import { Alignment } from '@ckeditor/ckeditor5-alignment';  // Importing the package.
import { Autoformat } from '@ckeditor/ckeditor5-autoformat';
import { BlockQuote } from '@ckeditor/ckeditor5-block-quote';
import { CloudServices } from '@ckeditor/ckeditor5-cloud-services';
import { Heading } from '@ckeditor/ckeditor5-heading';
import {
    Image,
    ImageCaption,
    ImageStyle,
    ImageToolbar,
    ImageUpload
} from '@ckeditor/ckeditor5-image';
import { Indent } from '@ckeditor/ckeditor5-indent';
import { List } from '@ckeditor/ckeditor5-list';
import { MediaEmbed } from '@ckeditor/ckeditor5-media-embed';
import { PasteFromOffice } from '@ckeditor/ckeditor5-paste-from-office';
import { Table, TableToolbar } from '@ckeditor/ckeditor5-table';
import { TextTransformation } from '@ckeditor/ckeditor5-typing';
import { CodeBlock } from '@ckeditor/ckeditor5-code-block';


import { useForm } from '@inertiajs/vue3';
import { watch } from 'vue';

const editor = ClassicEditor;
const editorConfig = {
    plugins: [
        Essentials,
        Bold,
        Italic,
        Link,
        Paragraph,

        Alignment,  // Adding the package to the list of plugins.
        Autoformat,
        BlockQuote,
        CloudServices,
        Heading,
        Image,
        ImageCaption,
        ImageStyle,
        ImageToolbar,
        ImageUpload,
        Indent,
        List,
        MediaEmbed,
        PasteFromOffice,
        Table,
        TableToolbar,
        TextTransformation,
        CodeBlock

    ],

    toolbar: {
        items: [
            'undo',
            'redo',
            'heading',
            'alignment',  // Displaying the proper UI element in the toolbar.

            '|',
            'bold',
            'italic',
            'link',
            'bulletedList',
            'numberedList',
            '|',
            'outdent',
            'indent',
            '|',
            'imageUpload',
            'blockQuote',
            'insertTable',
            'mediaEmbed',
            'codeBlock'
        ]
    },
    language: 'en',
    image: {
        toolbar: [
            'imageTextAlternative',
            'toggleImageCaption',
            'imageStyle:inline',
            'imageStyle:block',
            'imageStyle:side'
        ]
    },
    table: {
        contentToolbar: [
            'tableColumn',
            'tableRow',
            'mergeTableCells'
        ]
    }
}

const props = defineProps({
    content: String
})

const emits = defineEmits(['updateContent']);

const form = useForm({
    content: props.content
})

function updateContent() {
    console.log('updateContent called')
    emits('updateContent', form.content);
}

watch(form, (oldvalue, newvalue) => {
    updateContent()
});

</script>

<style lang="scss" scoped></style>
