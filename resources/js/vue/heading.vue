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
            window.location.reload();
            if (this.item.name == ''){
                return;
            }

            axios.post('api/item/store', {
                item: this.item
            })
            .then(response => {
                if(response.status == 201) {
                    this.item.name = "";
                    this.$emit('reloadlist');
                }
            })
            .catch (error => {
                console.log(error);
            })
        }
    }
}
</script>