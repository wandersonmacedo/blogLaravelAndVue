<template>
    <div class="container">
        <h1>Articles</h1>
        <article v-for='post in articles' :key='post.id'>
            <header>
                <h1>{{post.title}}</h1>
            </header>
            <main>
                <aside><img :src="post.image"></aside>
            </main>
            <aside>
                {{post.content}}
            </aside>
            <footer>
                {{post.created_at}}
            </footer>
        </article>
    </div>
</template>

<script>

    export default {
        name: "BlogFeedComponent",
        mounted() {
            console.log(this);
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
                    console.log(res.data);
                   self.articles = res.data;
                });
            }
        }

    }
</script>

<style scoped>

</style>
