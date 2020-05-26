<template>
  <div class="container">
    <TaskHeader :municipality="municipality" :title="`Opgave bekijken`" />

    <div v-if="!task" class="loading">
      <h1>Opgave laden...</h1>
      <Spinner stroke="#744144" />
    </div>

    <div v-else class="task">
        <h1 class="name">{{task.name}}</h1>
        <p class="desc">{{task.description}}</p>

        <br>

        <div class="measure-list">
            <h2>Maatregelen</h2>
            <template v-if="!measures">
                <Spinner stroke="#744144" />
            </template>

            <div v-else class="measure" v-for="measure in measures" v-bind:key="measure.id">
                <h3 class="title">{{`${measure.id}: ${measure.description}`}}</h3>
                <h5 class="type">Type: {{measure.measure_type.measure_type}}</h5>

                <div class="guidetype-list">
                    <span class="guidetype" v-for="guidetype in measure.guidetypes" v-bind:key="guidetype.id">
                        {{guidetype.name}}
                    </span>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import { TaskHeader } from '../../components/Tasks';
import { Spinner, Collapsible } from '../../components/UI';

export default {
  name: 'Task',

  components: {
    TaskHeader,
    Spinner,
    Collapsible
  },

  data() {
    return {
      /*municipality: {
        name: 'Den Haag',
        img: '/assets/logo-gemeente-denhaag.png',
          long: '',
          lat: '',
          hexcolor: '#BBB',

      },*/
      task: null,

      measures: null
    };
  },

  async mounted() {
    await this.loadTask();
    await this.loadMeasures();
  },

  methods: {
    async loadTask() {
      const taskId = this.$route.params.id;
      if (!taskId) {
        return this.$router.push('/tasks');
      }

      const res = await this.$http
        .get(`/api/statement/${taskId}`)
        .catch(e => console.error(e));
      const data = await res.data;
      this.task = data
    },

    async loadMeasures() {
        if (!this.task || !this.task.measure_ids) return;

        let measures = []
        let promises = []
        this.task.measure_ids.forEach(measure_id => {
            promises.push(this.loadMeasure(measures, measure_id))
        })
        await Promise.all(promises)
            .catch(e => console.error(e))
        this.measures = measures
    },

    async loadMeasure(measures, id) {
        const res = await this.$http
            .get(`/api/measure/${id}`)
            .catch(e => console.error(e));
        const data = await res.data;
        measures.push(data)
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

.loading {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;

    h1 {
        color: #744144;
        margin-bottom: 150px;
    }

    svg {
        margin-top: 50px;
    }
}

.task {
    .measure-list {
        h2 {
            display: inline-block;
        }

        .spinner {
            margin-left: 10px;
            position: initial;
            width: 20px;
            height: 20px;
        }

        .measure {
            .title {
                margin: 0;
            }
            .type {
                margin: 0;
                font-style: italic;
                color: rgb(73, 73, 73);
            }
            .guidetype-list {
                margin-top: 15px;

                .guidetype {
                    padding: 5px 10px;
                    background: rgb(131, 131, 131);
                    border-radius: 5px;
                    color: white;
                    font-weight: bold;
                    margin-right: 5px;
                    border: 1px solid #4a4a4a;
                    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.2);
                }
            }
        }
    }
}

@media only screen and (max-width: 650px) {
    .task {
        .name {
            text-align: center;
        }
    }
}
</style>
