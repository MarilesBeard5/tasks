<template>
    <div class="task">
        <input
            type="checkbox"
            @change="updateCheck()"
            v-bind:checked="task.completed"
            v-model="task.completed"
            :key="task.id"
        />
        <span :class="[task.completed ? 'completed' : '', 'taskText']"> {{ task.name }} </span>
        <button @click="removeItem()" class="trashcan">
            <font-awesome-icon icon="trash" />
        </button>
    </div>
</template>

<script>
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
export default {
    components: { FontAwesomeIcon },
    props: ['task'],
    methods: {
        updateCheck() {
            axios.put('api/task/update/' + this.task.id, {
                completed: this.task.completed
            })
                .then( response => {
                    if(response.status === 200) {
                        this.$emit('itemChanged');
                    }
                })
                .catch( error => {
                    console.log(error);
                })
        },
        removeItem() {
            axios.delete('api/task/destroy/' + this.task.id)
                .then( response => {
                    if(response.status === 200) {
                        this.$emit('itemChanged');
                    }
                })
                .catch( error => {
                    console.log(error);
                })
        }
    },
    created() {
        this.task.completed = this.task.completed === 1;
    }
}
</script>

<style scoped>
    .completed {
        text-decoration: line-through;
        color: lightgray;
    }

    .taskText {
        width: 100%;
        margin-left: 20px;
    }

    .task {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .trashcan {
        background: aliceblue;
        border: none;
        color: dimgray;
        outline: none;
    }

    .trashcan:hover {
        cursor: pointer;
    }

</style>
