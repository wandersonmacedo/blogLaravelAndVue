<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2>Seus Artigos</h2>
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
                    <tr v-for='post in articles' :key='post.id'>
                        <th scope="row">{{post.articleid}}</th>
                        <td>{{post.title}}</td>
                        <td>{{post.name}}</td>
                        <td><a v-bind:href="'/setArticle/' + post.articleid"> <button>editar</button></a> / <button @click="deleteArticle(post.articleid)">Excluir</button></td>
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
            }
        },

        methods:{
            getArticles(){
                self = this;
                axios.get('../api/blogfeed').then(function(res){
                    self.articles = res.data;
                });
            },
            deleteArticle(id){
                self = this;
                if(!confirm('Tem certeza que deseja excluir este artigo?'))return;
                axios.delete('../api/articles/' + id ).then(function(res){
                    self.getArticles();
                });

            }
        }
    }
</script>

<style scoped>

</style>
