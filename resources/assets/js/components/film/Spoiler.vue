<template>
  <div v-if="! isEmpty(film)" class="inner">
    <h2>{{ film.title }} <span v-if="film.year">({{ film.year }})</span></h2>
    <div class="row">
      <div class="col-md-12">
        <img v-if="film.poster_url" :src="film.poster_url" class="image left small" :alt="film.title">
        <p v-if="film.description">
          {{ film.description }}
        </p>

        <p v-if="film.imdb_id">
          <a :href="'http://www.imdb.com/title/' + film.imdb_id + '/?utm_source=website'" target="_blank">View on IMDB.com</a>
        </p>
      </div>
    </div>

    <div v-if="isEmpty(quotes)" class="alert alert-info">
      <h3>Oh so sad, no quotes for this movie!</h3>
    </div>

    <div class="features">
      <section v-for="quote in quotes">
        <span class="icon major fa-user"></span>
        <h3>Lorem ipsum amet</h3>
        <p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>

        <film-spoiler-rate></film-spoiler-rate>
      </section>
    </div>
    <ul class="actions">
      <li v-if="! isEmpty(quotes)"><a href="#" class="button special">Load more</a></li>
      <li><a href="#submit-spoiler" class="button">
        Submit spoiler for {{ film.title }}
      </a></li>
    </ul>
  </div>
</template>

<script>
  import { mapState } from 'vuex'
  import _ from 'lodash'

  export default {
    name: 'FilmSpoiler',

    methods: {
      isEmpty (data) {
        return _.isEmpty(data)
      }
    },

    computed: mapState({
      film: state => state.film,
      quotes: state => state.quotes
    })
  }
</script>

<style scoped>
  img.small {
    max-height: 300px;
  }
</style>