<template>
    <section class="main">
        <input id="toggle-all" class="toggle-all" type="checkbox">
        <label for="toggle-all">Mark all as complete</label>
        <ul class="todo-list">
            <div v-for="(item, index) in items" :key="index">
                <list-item :item="item" v-on:itemchanged="$emit('reloadlist')"/>
            </div>
        </ul>
    </section>
</template>

<script>
import listItem from './listItem'

export default {
   props: ['items'],
   components: {
       listItem
   }
}
</script>
