<template>

  <div class="page contact">
    <small-hero>Upcoming shows</small-hero>
    <div class="container">
      <section class="section">

        <div v-if="loading">
          <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
          <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
          <content-placeholder :rows="placeholderRows"></content-placeholder>
        </div>

        <div v-else>

          <div v-if="shows.data.length">
            <h3 v-if="future_shows.length" class="show-heading">Future shows</h3>
            <div class="box">
              <show v-for="show in future_shows" :key="show.id" :show="show"></show>
            </div>

            <h3 v-if="past_shows.length" class="show-heading">Past shows</h3>
            <div class="box">
              <show v-for="show in past_shows" :key="show.id" :show="show"></show>
            </div>

            <div class="columns">
              <div class="column is-6 is-offset-3">
                <pagination :pagination="shows" @next="next" @prev="prev"></pagination>
              </div>
            </div>
          </div>

          <div v-else>Soon</div>
        </div>

      </section>
    </div>
  </div>

</template>

<script>
  import ContentPlaceholder from 'vue-content-placeholder';
  import SHOWS_PAGE_QUERY from '../../graphql/showsPage.graphql'

  Vue.component('show', require('../elements/show.vue'));
  Vue.component('pagination', require('../elements/pagination.vue'));

  export default {
    data() {
      return {
        loading: 0,
        shows: [],
        future_shows: [],
        past_shows: [],
        page: 1,
        limit: 10,
        placeholderRows: [
          {
            height: '15px',
            boxes: [[0, '100px']]
          },
          {
            height: '15px',
            boxes:[[0, '100px'], ['10%', 1]]
          },
          {
            height: '15px',
            boxes: [[0, '100px']]
          },
          {
            height: '15px',
            boxes:[[0, '100px'], ['10%', 2]]
          }
        ]
      }
    },

    apollo: {
      shows: {
        query: SHOWS_PAGE_QUERY,
        variables() {
          return {
            page: this.page,
            limit: this.limit
          }
        },
      }
    },

    methods: {
      next: function() {
        this.page++;
      },

      prev: function() {
        this.page--;
      },
    },

    watch: {
      shows: function (val) {
        var context = this;
        val.data.forEach(function(elem) {
          if (moment(elem.date).isAfter()) {
            context.future_shows.push(elem);
          }
          else {
            context.past_shows.push(elem);
          }
        });
      },
    },

    components: {
        ContentPlaceholder
    }
  }
</script>