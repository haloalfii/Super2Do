<template>
    <div>
        <section class="todoapp">
            <heading v-on:reloadlist="getList()"/>
            <list-view :items="items" v-on:reloadlist="getList()"/>
        </section>
    </div>
</template>

<script>
import heading from "./heading"
import listView from "./listView"

export default {
    components: {
        heading,
        listView
    },
    data: function(){
        return {
            items: []
        }
    },
    methods: {
        getList() {
            axios.get('api/item')
            .then(response => {
                this.items = response.data
            })
            .catch ( error => {
                console.log(error);
            })
        }
    },
    created() {
        this.getList();
    }
}
</script>
