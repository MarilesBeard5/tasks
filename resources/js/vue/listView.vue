<template>
    <div>
        <div v-for="(task, index) in tasks" :key="task.id">
            <list-task
                :task="task"
                class="task"
                v-on:itemChanged="$emit('reloadList')"
                />
        </div>
    </div>
</template>

<script>
import listTask from "./listTask";

export default {
    props: ['tasks'],
    components: {
        listTask
    },
}
</script>

<style scoped>
    .task {
        background: aliceblue;
        padding: 5px;
        margin-top: 5px;
    }
</style>
