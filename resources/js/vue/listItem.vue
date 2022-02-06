<template>
    <div>
        <div class="view">
            <input class="toggle" type="checkbox" @change="updateCheck()" v-model="item.completed">
            <label>{{ item.name }}</label>
            <button class="destroy" @click="removeItem()"></button>
        </div>
        <input class="edit" value="Create a Todo template">
    </div>
</template>

<script>

export default {
    props: ['item']
}
</script>
