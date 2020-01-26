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
                <input type="hidden" class="form-control" id="source" name="source" value="category">
                <input type="submit" value="Enviar" >
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "CategoryComponent",
        props:['userID'],
        mounted() {
            console.log(this.userID)
        },
        data() {
            return {
                fields: {},
                errors: {},
                success: false,
                loaded:true,
            }
        },
        methods: {
            submit() {
                if (this.loaded) {
                    this.loaded = false;
                    this.success = false;
                    this.errors = {};
                    this.fields.source = "category";
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
        },
    }
</script>

<style scoped>

</style>
