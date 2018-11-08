<template>
    <div>
        <h1 class="text-center">¿Qué tienes que hacer?</h1>
        <form class="form-inline" role="form" id="main_input_box" action="" v-on:submit.prevent="newTodo()" > 
                <input type="text" class="form-control col-md-10" id="custom_textbox" name="todo" v-model="description" placeholder="Tengo que...">
                <input type="submit" value="Enviar" class="btn btn-primary add_button col-md-2">
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                description: '',
                terminated: false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            newTodo() {
                const params = {
                    description: this.description,
                    terminated: false
                };
                this.description = '';

                axios.post('/todos', params)
                    .then((response) => {
                        const todo = response.data;
                        this.$emit('new', todo);
                    });
            }
        }
    }
</script>
