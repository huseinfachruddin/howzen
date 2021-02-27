<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">New Note</div>
                    <div class="card-body">
                        <form action="#" method="post" @submit.prevent="store">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" v-model="form.title" id="title" class="form-control">
                                <div v-if="errors.title" class="mt-2 text-danger"> {{ errors.title[0] }}</div>
                          </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <select v-model="form.subject"  id="subject" class="form-control">
                                <option v-for="subject in subjects" :key="subject.id" :value="subject.id">
                                    {{ subject.title }}
                                </option>    
                                </select> 
                                <div v-if="errors.subject" class="mt-2 text-danger"> {{ errors.subject[0] }}</div>                          
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea v-model="form.description" id="description" rows="5" class="form-control"></textarea>
                                <div v-if="errors.description" class="mt-2 text-danger"> {{ errors.subject[0] }}</div>                          

                            </div>

                            <button type="submit" class="btn btn-primary d-flex align-item-center">
                                Save
                                <template v-if="loading">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="20px" height="20px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                    <circle cx="50" cy="50" fill="none" stroke="#b3e9eb" stroke-width="12" r="8" stroke-dasharray="37.69911184307752 14.566370614359172">
                                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                                    </circle>
                                    </svg>
                                </template>
                            </button>
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
            form: {
                title:'',
                description:'',
                subject:''
            },
            loading:false,
            subjects:[],
            errors:[],
        }
    },
    
    mounted(){
        this.getSubject();
        
    },
    methods:{
        async getSubject(){
                let response = await axios.get('/api/subjects')
                if(response.status === 200){

                    this.subjects = response.data

                }
            },
        
        async store(){
            this.loading=true;

            alert("Anda yakin untuk melanjutkan");
            try {
                let response = await axios.post('/api/notes/create',this.form)
                if(response.status == 200){
                    this.form.title =""
                    this.form.description =""
                    this.form.subject =""
                    this.errors = []
                    this.loading=false;
                    this.$toasted.show(response.data.message,{
                        type:'success',
                        duration: 3000,
                    })
                }
            }catch(e){
                this.$toasted.show('someting wrong',{
                    type:'error',
                        duration: 3000,
                    })
                this.errors=e.response.data.errors;
                this.loading=false;


        }

        }
    }
};
</script>
