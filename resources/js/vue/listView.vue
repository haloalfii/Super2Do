<template>
    <section class="main">
        <input id="toggle-all" class="toggle-all" type="checkbox">
        <label for="toggle-all">Mark all as complete</label>
        <ul class="todo-list">
            <li v-for="(item, index) in items" :key="index">
                <list-item :item="item"/>
            </li>
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
