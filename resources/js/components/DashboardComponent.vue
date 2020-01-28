<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2>Seus Artigos</h2>
                <div class="row">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Recipient's username" v-model="search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="search">Button</button>
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for='post in articles' :key='post.articlesId'>
                        <th scope="row">{{post.articlesId}}</th>
                        <td>{{post.title}}</td>
                        <td>{{post.categoryName}}</td>
                        <td><a v-bind:href="'/setArticle/' + post.articlesId"> <button>editar</button></a> / <button @click="deleteArticle(post.articlesId)">Excluir</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2">
                <a href="/addArticle"><button class="button btn btn-success" style="margin-bottom:15px;">Criar Artigo</button></a>
                <a href="/addCategory"><button class="button btn btn-success">Criar Categoria</button></a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "DashboardComponent",
        mounted() {
            console.log();
            this.getArticles();
        },
        data(){
            return{
                articles:[],
                search:[]
            }
        },
        watch:{
            search(after,before){
                this.getArticles();
            }
        },
        methods:{
            getArticles() {
                self =this;
                axios.get('../api/allarticles?page=',{params:{search:this.search}})
                    .then(response => {
                        self.articles = response.data;
                        //console.log(this.articles.data);
                    });
            },
            deleteArticle(id){
                console.log(id);
                self = this;
                if(!confirm('Tem certeza que deseja excluir este artigo?'))return;
                axios.delete('../api/articles/' + id ).then(function(res){
                    console.log(res);
                    self.getArticles();
                });

            }
        }
    }
</script>

<style scoped>

</style>
