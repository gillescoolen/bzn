<template>
  <div class="container">
      <TaskHeader :municipality="municipality" title="Aan welke opgave werkt u?"/>
      
      <div class="tasks-list">
          <div class="task" v-for="task in tasks" v-bind:key="task.id">
              <Collapsible>
                <template v-slot:title>
                    <h3 class="title">{{`Opgave ${task.id}: ${task.name}`}}</h3>
                </template>
                <template v-slot:content>
                    <span class="desc">{{task.desc.substr(0, 150)}}...</span>
                    <a class="read-more" @click="gotoTask(task.id)">Lees meer</a>
                </template>
              </Collapsible>
          </div>
      </div>
  </div>
</template>

<script>
import { Collapsible } from "../../components/UI"
import { TaskHeader } from "../../components/Tasks"

export default {
    name: "TaskList",
    
    components: {
        Collapsible,
        TaskHeader
    },

    data() {
        return {
            municipality: {
                name: 'Den Haag',
                img: '/assets/logo-gemeente-denhaag.png'
            },
            tasks: []
        }
    },

    mounted() {
        this.loadTasks()
    },

    methods: {
        loadTasks () {
            for (let i = 1; i <= 10; i++) {
                this.tasks.push({
                    id: i,
                    name: 'Lorem ipsum dolor sit amet',
                    desc: '(Beschrijving) Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia quod id aliquam ratione qui fugiat fuga tempora minima autem excepturi nobis est, aspernatur odio deserunt? Id vero similique natus esse temporibus aliquid vel totam sunt corrupti, voluptas architecto ipsam recusandae error in alias. Aliquam explicabo dolorem tenetur eos qui labore.'
                })
            }
        },

        gotoTask(id) {
            this.$router.push(`/task/${id}`)
        }
    }
};
</script>

<style lang="scss" scoped>
.container {
  height: 100%;
  display: flex;
  flex-direction: column;
}

.tasks-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;

    .task {
        margin: 10px;
        max-width: 400px;

        .title {
            padding: 5px;
            cursor: pointer;
            font-style: italic;
            font-weight: normal;
        }

        .read-more {
            color: green;
            cursor: pointer;
        }
    }
}

@media only screen and (max-width: 1000px) {
    .header {
        flex-direction: column;
    }

    .task {
        width: 100% !important;
    }
}

@media only screen and (min-width: 1000px){
    .task {
        width: calc(50% - 20px) !important;
    }
}

@media only screen and (min-width: 1400px){
    .task {
        width: 30% !important;
    }
}


</style>