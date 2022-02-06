<template>
    <footer class="footer">
        <!-- This should be `0 items left` by default -->
        <span class="todo-count"><strong>{{ count.data }}</strong> item left</span>
        <!-- Remove this if you don't implement routing -->
        <ul class="filters">
            <li>
                <a v-on:click="refresh()">All</a>
            </li>
            <li>
                <a v-on:click="activeAll()" >Active all Task</a>
            </li>
            <li>
                <a v-on:click="completedAll()">Complete all Task</a>
            </li>
        </ul>
        <!-- Hidden if no completed items are left ↓ -->
        <button class="clear-completed" v-on:click="clearCompleted()">Clear completed</button>
    </footer>
</template>

<script>
export default {
    props: ['items'],

    methods: {
        clearCompleted() {
            window.location.reload();
            axios.get('api/item/clear')
            .catch( error => {
                console.log(error)
            })
        },
        completedAll() {
            window.location.reload();
            axios.get('api/item/completed-all')
            .catch( error => {
                console.log(error)
            })
        },
        activeAll() {
            window.location.reload();
            axios.get('api/item/actived-all')
            .catch( error => {
                console.log(error)
            })
        },
        refresh(){
            window.location.reload();
        },
    },
    data(){
        return {
            count: null
        }
    },
    mounted(){
        axios.get('api/item/count')
        .then(response => (this.count = response))
    }
}
</script>