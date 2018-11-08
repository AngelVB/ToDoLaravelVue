<template>
    <div class="container" id="main">
            <form-component @new="addToDo"></form-component>
            
           
            <ul class="list-group list-of-items">
                <todo-component
                    v-for="(todo, index) in todos"
                    :key="todo.id"
                    :todo="todo"
                    @update="updateToDo(index, ...arguments)"
                    @delete="deleteToDo(index)">
                </todo-component>
            </ul>


            <ul class="list-group list-of-items" v-if="countTodos()>1">
                <li class="list-group-item">
                    <div class="row">
                        <span  class="col-md-3"></span>
                        <span class="btn btn-info col-md-3"  v-on:click="onClickTerminateAll()">Terminar Todo</span>
                        <span  class="btn btn-danger col-md-3" v-on:click="onClickDeleteAll()">Eliminar Todo</span>
                    </div>  
                </li>
            </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                todos: []
            }
        },

        mounted() {
            this.getToDo();
        },

        methods: {
            getToDo(){
                axios.get('/todos').then((response) => {
                this.todos = response.data;
            });
            },
            addToDo(todo) {
                this.todos.unshift(todo);
            },
            updateToDo(index, todo) {
                this.todos[index] = todo;
            },
            deleteToDo(index) {
                this.todos.splice(index, 1);
            },
            deleteAll() {
                this.todos=[];
            },
            terminateAll() {
                this.todos=[];
            },
            onClickDeleteAll() {
                axios.delete('/all').then(() => {
                    this.deleteAll();
                });
            },
             onClickTerminateAll() {
                 axios.put('/all').then((response) => {
                    this.todos = response.data;
                });
             },
            countTodos(){
                return this.todos.length;
            }
        }
    }
</script>
