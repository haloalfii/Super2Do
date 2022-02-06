<template>
    <header class="header">
        <h1>Super2Do</h1>
        <input type="text" class="new-todo" v-model="item.name" v-on:keyup.enter="addItem()" placeholder="What needs to be done?" autofocus>
    </header>
</template>

<script>
export default {
    data: function() {
        return {
            item: {
                name: ""
            }
        }
    },
    methods: {
        addItem() {
            if (this.item.name == ''){
                return;
            }

            axios.post('api/item/store', {
                item: this.item
            })
            .then(response => {
                if(response.status == 201) {
                    this.item.name = "";
                }
            })
            .catch (error => {
                console.log(error);
            })
        }
    }
}
</script>