<template>
    <div class="container">
        <h1>Articles</h1>
        <div class="row">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's username" v-model="search">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="search">Button</button>
                </div>
            </div>
        </div>
        <article v-for='post in articles' :key='post.articlesId'>
            <header>
                <h1>{{post.title}}</h1>
            </header>
            <main>
                <aside><img src="26069.jpg"></aside>
            </main>
            <aside>
                {{post.content}}
            </aside>
            <footer>
                {{post.name}}
            </footer>
        </article>
    </div>
</template>

<script>

    export default {
        name: "BlogFeedComponent",
        created() {
            console.log(this.getArticles())
            console.log(this.search);

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
            }
        }

    }
</script>

<style scoped>

</style>
