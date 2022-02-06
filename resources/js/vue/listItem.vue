<template>
    <div>
        <li :class="[item.completed ? 'completed': '']">
            <div class="view">
                <input class="toggle" type="checkbox" @change="updateCheck()" v-model="item.completed">
                <label>{{ item.name }}</label>
                <button class="destroy" @click="removeItem()"></button>
            </div>
            <input class="edit" value="Create a Todo template">
        </li>
        
    </div>
</template>

<script>

export default {
    props: ['item'],
    methods: {
        updateCheck() {
            axios.put('api/item/' + this.item.id, {
                item: this.item
            })
            .then (response => {
                if (response.status == 200){
                    this.$emit('itemchanged');
                }
            })
            .catch(error => {
                console.log(error)
            })
        },
        removeItem() {
            axios.delete('api/item/' + this.item.id )
            .then (response => {
                if(response.status == 200){
                    this.$emit('itemchanged')
                }
            })
            .catch(error => {
                console.log(error)
            })
        }
    }
}
</script>
