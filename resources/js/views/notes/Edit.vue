<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Edit Note</div>
                    <div class="card-body">
                        <form action="#" method="post" @submit.prevent="update">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" v-model="form.title" id="title" class="form-control">
                                <div v-if="errors.title" class="mt-2 text-danger"> {{ errors.title[0] }}</div>
                          </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <select v-model="form.subjectId" id="subject" class="form-control">       
                                    <option v-for="subject in subjects" :key="subject.id" :value="subject.id">{{ subject.title }}</option> 
                                </select> 
                                <div v-if="errors.subject" class="mt-2 text-danger"> {{ errors.subject[0] }}</div>                          
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea v-model="form.description" id="description" rows="5" class="form-control"></textarea>
                                <div v-if="errors.description" class="mt-2 text-danger"> {{ errors.description[0] }}</div>                          

                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            form: [],
            subjects:[],
            errors:[],
            selected:'',
        }
    },
    
    mounted(){
        this.getSubject();
        this.getNote();
    },
    methods:{
        async getNote(){
                let response = await axios.get('/api/notes/' + this.$route.params.noteSlug)
                if(response.status === 200){

                this.form = response.data.data
                }
            },
        async getSubject(){
                let response = await axios.get('/api/subjects')
                if(response.status === 200){
                    
                    this.subjects = response.data
                
                }
            },

        async update(){
            
            alert("Anda yakin untuk melanjutkan");
            try {
                let response = await axios.patch('/api/notes/'+this.$route.params.noteSlug+'/edit',this.form)
                if(response.status === 200){
                    this.errors = []
                    this.$toasted.show(response.data.message,{
                                type:'success',
                                duration: 3000,
                    })
console.log(this.form);
                }
            }catch(e){
                this.$toasted.show('someting wrong',{
                        type:'error',
                        duration: 3000,
                    })
            this.errors=e.response.data.errors;
console.log(this.form);

        }
            },
        

    }
};
</script>

