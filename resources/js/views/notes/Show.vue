<template>
    <div class="container">
        <div class="card p-2">
        <h1>{{note.title}}</h1>
        <h6>{{note.published}}-{{note.subject}}</h6>
        <hr>
            <p>{{note.description}}</p>
        </div>

        
    </div>
</template>

<script>
export default {
    data(){
        return{
            note:[],
        }
    },
    mounted () {
        this.getNote();
        // console.log(this.$route.params.noteSlug);
    },

    methods:{
        async getNote(){
            let response = await axios.get('/api/notes/' + this.$route.params.noteSlug);

            this.note = response.data.data
        }
    }
};
</script>
