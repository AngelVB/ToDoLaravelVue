<template>
        
        <li class="list-group-item">
           <div class="row">
                <input v-if="editMode" @keyup.enter ="onClickUpdate()" type="text" class="form-control col-md-7" v-model="todo.description">
                <span v-else class="text_holder col-md-7" v-bind:class="{ terminated: todo.terminated }">{{ todo.description }}  </span>
                <input class="col-md-1 checkbox" type="checkbox" v-model="todo.terminated" id="terminated" v-on:change="onClickUpdate()">
                <button v-if="editMode" class="btn btn-list btn-success col-md-2" v-on:click="onClickUpdate()">Guardar</button>
                <button v-else class="btn btn-list btn-info col-md-2" v-on:click="onClickEdit()">Editar</button>
                <button class="btn btn-list btn-danger col-md-2" v-on:click="onClickDelete()">Eliminar</button>
           </div>  
        </li>
</template>

<script>
    export default {
        props: ['todo'],
        data() {
            return {
                editMode: false
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onClickDelete() {
                axios.delete(`/todos/${this.todo.id}`).then(() => {
                    this.$emit('delete');
                });
            },
            onClickEdit() {
                this.editMode = true;
            },
            onClickUpdate() {
                const params = {
                    description: this.todo.description,
                    terminated: this.todo.terminated
                };
                axios.put(`/todos/${this.todo.id}`, params).then((response) => {
                    this.editMode = false;
                    const todo = response.data;
                    this.$emit('update', todo);
                });
            }
        }
    }
</script>
