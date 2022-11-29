<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title"> Todo List </h2>
            <add-task-form
                v-on:reloadList="getList()"
            />
        </div>
        <list-view
            :tasks="tasks"
            v-on:reloadList="getList()"
        />
    </div>
</template>

<script>
    import addTaskForm from "./addTaskForm";
    import listView from "./listView";
    export default {
        components: {
            addTaskForm,
            listView,
        },
        data: function () {
            return {
                tasks: []
            }
        },
        methods: {
            getList () {
                axios.get('api/task/index')
                    .then( response => {
                        this.tasks = response.data;
                    })
                    .catch( error => {
                        console.log( error );
                    })
            }
        },
        created() {
            this.getList();
        }
    }
</script>

<style scoped>
    .todoListContainer {
        width: 350px;
        margin: auto;
    }

    .heading {
        background: lightgray;
        padding: 10px;
    }

    #title {
        text-align: center;
    }
</style>
