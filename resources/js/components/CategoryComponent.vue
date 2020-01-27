<template>
    <div class="container">
        <h1>Adicione aqui uma nova categoria!</h1>
        <form @submit.prevent="submit">
            <div class="form-group">
                <label for="">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" v-model="fields.name">
                <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
            </div>
            <div class="form-group">
                <input type="submit" value="Enviar" >
            </div>
        </form>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Ação</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for='cat in categories' :key='cat.id'>
                <th scope="row">{{cat.id}}</th>
                <td>{{cat.name}}</td>
                <td><button @click="getOneCategory(cat)">editar</button> / <button @click="deleteCategory(cat.id)">Excluir</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "CategoryComponent",
        props: ['currentUser'],
        mounted() {
            console.log();
            this.getCategories();
        },
        data() {
            return {
                fields: {},
                errors: {},
                success: false,
                loaded:true,
                categories:[]
            }
        },
        methods: {
            submit() {
                if (this.loaded) {
                    this.loaded = false;
                    this.success = false;
                    this.errors = {};
                    this.fields.created_by = this.currentUser.id;
                    axios.post('../api/categories', this.fields).then(response => {
                        this.fields = {}; //Clear input fields.
                        this.loaded = true;
                        this.success = true;
                        self.getCategories();
                    }).catch(error => {
                        this.loaded = true;
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                        }
                    });
                }
            },
            getCategories(){
                self = this;
                axios.get('../api/categories').then(function(res){
                    self.categories = res.data;
                });
            },
            deleteCategory(id){
                self = this;
                if(!confirm('Tem certeza que deseja excluir esta categoria?'))return;
                axios.delete('../api/categories/' + id).then(function(res){
                    self.getCategories();
                });
            },
            getOneCategory(row){
                self = this;
                self.fields.categoryId = row.id;
                $("#name").val(row.name);
            }
        },
    }
</script>

<style scoped>

</style>
