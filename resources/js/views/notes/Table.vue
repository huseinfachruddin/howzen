<template>
        <div class="container">
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Subject</th>
                <th scope="col">Published</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(note,index) in notes" :key="note.id">
                <th scope="row">{{ index+1 }}</th>
                <td><router-link :to="{name:'notes.show', params: { noteSlug : note.slug }}">{{ note.title }}</router-link></td>
                <td>{{ note.subject }}</td>
                <td>{{ note.published }}</td>
                <td><router-link :to="{name:'notes.edit', params: { noteSlug : note.slug }}">Edit</router-link></td>
                <td><delete-note v-bind:endpoint="note.slug"/></td>
                </tr>
            </tbody>
            </table>
            <template v-if="loading" class>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="100px" height="100px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                    <circle cx="50" cy="50" fill="none" stroke="#b3e9eb" stroke-width="12" r="8" stroke-dasharray="37.69911184307752 14.566370614359172">
                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                </circle>
                </svg>
            </template>
        </div>
</template>

<script>

import DeleteNote from './Delete'

export default {
    components:{
        'DeleteNote':DeleteNote
    },
    data(){
        return {
            notes:[],
            loading:true,
        }
    },

    mounted() {
        this.getNotes();

        
    },

    methods:{
        async getNotes(){
            let response = await axios.get('/api/notes');

            this.notes = response.data.data
            this.loading=false;
            }
    }
    
};
</script>
