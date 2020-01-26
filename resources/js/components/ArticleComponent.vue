<template>
    <div class="container">
        <h1>Adicione aqui seu artigo!</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Titulo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titulo">
                <input type="hidden" class="form-control" id="source" name="source" value="article">
            </div>
            <div class="form-group">
                <label for="">Escolha a qual categoria pertence o seu artigo:</label>
                <select class="form-control" id="category" name="category" >
                    <option v-for="category in categories" :key="category.id" :value="category.id">{{category.name}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="content">Escreva seu artigo:</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Imagem</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
                <input type="submit" value="Enviar" >
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "ArticleComponent",
        mounted() {
            this.getCategories();
        },
        data(){
            return{
                categories:[],
            }
        },

        methods:{
            getCategories(){
                self = this;
                axios.get('../api/getCategories').then(function(res){
                    console.log(res.data);
                    self.categories = res.data;
                });
            },
            submit() {
                if (this.loaded) {
                    this.loaded = false;
                    this.success = false;
                    this.errors = {};
                    axios.post('../api/submit', this.fields).then(response => {
                        this.fields = {}; //Clear input fields.
                        this.loaded = true;
                        this.success = true;
                    }).catch(error => {
                        this.loaded = true;
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                        }
                    });
                }
            },
        }

    }
</script>

<style scoped>

</style>
