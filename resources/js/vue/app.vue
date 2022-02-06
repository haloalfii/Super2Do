<template>
    <div>
        <section class="todoapp">
            <heading v-on:reloadlist="getList()"/>
            <list-view :items="items" v-on:reloadlist="getList()"/>
            <bottom :items="items" v-on:reloadlist="getList()"/>
        </section>
    </div>
</template>

<script>
import heading from "./heading"
import listView from "./listView"
import bottom from "./Bottom"

export default {
    components: {
        heading,
        listView,
        bottom
    },
    data: function(){
        return {
            items: [],
            count: []
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
