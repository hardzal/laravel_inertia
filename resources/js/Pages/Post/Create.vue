<template>
    <div>
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h4>TAMBAH POST</h4>
                <hr/>
                <form @submit.prevent="storePost">
                    <div class="mb-3">
                        <label class="form-label">TITLE POST</label>
                        <input type="text" class="form-control" v-model="post.title" placeholder="Masukkan Title Post">
                        <div v-if="errors.title" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CONTENT</label>
                        <textarea class="form-control" rows="5" v-model="post.content" placeholder="Masukkan Content Post"></textarea>
                        <div v-if="errors.content" class="mt-2 alert alert-danger">
                            {{ errors.content }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-md shadow-sm me-2">SIMPAN</button>
                        <button type="reset" class="btn btn-warning btn-md shadow-sm">RESET</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import LayoutApp from '../../Layouts/App.vue';
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia';

export default {
    layout: LayoutApp,
    props: {
        errors: Object
    },

    setup() {
        const post = reactive({
            title: '',
            content: ''
        });

        function storePost() {
            let title = post.title
            let content = post.content

            Inertia.post('/posts/', {
                title: title,
                content: content
            })
        }

        return {
            post,
            storePost
        }
    }
}
</script>
