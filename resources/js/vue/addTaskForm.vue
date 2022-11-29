<template>
    <div class="addTask">
        <input type="text" v-model="name" />
        <font-awesome-icon
            icon="fa-solid fa-square-plus"
            :class="[ name ? 'active' : 'inactive', 'plus']"
            @click="addItem()"
        />
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                name: ""
            }
        },
        methods: {
            addItem() {
                if(this.name === '') {
                    return;
                }

                axios.post('api/task/store', {
                    name: this.name
                })
                    .then( response => {
                        if(response.status === 201) {
                            this.name = "";
                            this.$emit('reloadList');
                        }
                    })
                    .catch( error => {
                        console.log( error );
                    })
            }
        }
    }
</script>

<style scoped>
    .addTask {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    input {
        background: aliceblue;
        border: 0;
        outline: none;
        padding: 5px;
        margin-right: 10px;
        width: 100%;
    }

    .plus {
        font-size: 20px;
    }

    .active {
        color: darkgreen;

    }

    .active:hover {
        cursor: pointer;
    }

    .inactive {
        color: gray;
    }
</style>
