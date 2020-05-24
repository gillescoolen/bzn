<template>
  <div class="container">
      <TaskHeader :municipality="municipality" :title="`Opgave ${task.id}`"/>
  </div>
</template>

<script>
import { TaskHeader } from "../../components/Tasks"

export default {
    name: "Task",

    components: {
        TaskHeader
    },

    data () {
        return {
            municipality: {
                name: 'Den Haag',
                img: '/assets/logo-gemeente-denhaag.png'
            },
            task: {
                id: undefined
            }
        }
    },

    mounted() {
        this.loadTask()
    },

    methods: {
        loadTask () {
            this.task.id = this.$route.params.id;
            if (!this.task.id) {
                return this.$router.push('/tasks');
            }
        },
    }
};
</script>

<style lang="scss" scoped>
.container {
  height: 100%;
  display: flex;
  flex-direction: column;
}
</style>