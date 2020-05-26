<template>
    <div>
        <TaskHeader :title="municipality.name"/>

        <div class="content">
            <h3>Aan de slag met:</h3>
            <div class="tasks" @click="handleClickTasks">
                <h5>De opgaven</h5>
            </div>
            <div class="guidetypes" @click="handleClickGuidetypes">
                <h5>De gidssoorten</h5>
            </div>
        </div>
    </div>
</template>

<script>
import { TaskHeader } from '../../components/Tasks';
import { mapGetters } from 'vuex';

export default {
  name: 'TasksOrGuidetypesSelection',

  components: {
    TaskHeader
  },

  mounted () {
    if (!this.municipality.id) {
      this.$router.push('/');
    }
  },

  methods: {
    handleClickTasks () {
      this.$router.push('/tasks');
    },

    handleClickGuidetypes () {
      this.$router.push('/guide-types');
    }
  },

  computed: {
    ...mapGetters({
      municipality: 'municipalities/get'
    })
  }
};
</script>

<style lang="scss" scoped>
.content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: calc(100vh - 350px);

    h3 {
        font-family: "Bebas Neue";
        font-size: 40px;
    }

    .tasks {
        margin-bottom: 10px;
    }

    .tasks, .guidetypes {
        border: 1px solid #e6e6e6;
        box-shadow: 1px 2px 3px rgba(0, 0, 0, 0.2);
        display: inline-block;
        width: 500px;
        text-align: center;
        cursor: pointer
    }

    h5 {
        font-family: "Midnight Champion";
        font-size: 25px;
        text-transform: uppercase;
        margin: 15px;
    }
}

@media only screen and (max-width: 600px) {
    .tasks, .guidetypes {
        width: calc(100% - 10px) !important;
    }
}
</style>
