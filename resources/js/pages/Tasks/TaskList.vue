<template>
  <div class="container">
      <TaskHeader title="Aan welke opgave werkt u?"/>

      <div class="tasks-list">
          <div class="task" v-for="task in tasks" v-bind:key="task.id">
              <Collapsible>
                <template v-slot:title>
                    <h3 class="title">{{`Opgave ${task.id}: ${task.name}`}}</h3>
                </template>
                <template v-slot:content>
                    <p v-if="task.description" class="desc">{{task.description}}</p>
                    <p v-else class="desc">Deze opgave heeft (nog) geen beschrijving...</p>

                    <a class="read-more" @click="gotoTask(task.id)">Lees meer</a>
                </template>
              </Collapsible>
          </div>
      </div>
  </div>
</template>

<script>
import { Collapsible } from '../../components/UI';
import { TaskHeader } from '../../components/Tasks';

export default {
  name: 'TaskList',

  components: {
    Collapsible,
    TaskHeader
  },

  // Ik bezig storage link
  data () {
    return {
      municipality: {
        name: 'Den Haag'

      },

      tasks: []
    };
  },

  async mounted () {
    await this.loadTasks();
  },

  methods: {
    async loadTasks () {
      // const res = await this.$http.get('/api/statements')
      //  .catch(e => console.error(e));
      // const data = await res.data
      // this.tasks = data;
      const a = this.$store.state.municipalities.selected.statements;
      this.tasks = a;
    },

    gotoTask (id) {
      this.$router.push(`/task/${id}`);
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
        width: calc(50% - 20px);

        .title {
            padding: 5px;
            cursor: pointer;
            font-style: italic;
            font-weight: normal;
        }

        .desc {
            padding: 0;
            margin: 0 0 10px 0;
        }

        .read-more {
            color: green;
            cursor: pointer;
        }
    }
}

@media only screen and (max-width: 1350px) {
    .task {
        width: 100% !important;
    }
}

</style>
