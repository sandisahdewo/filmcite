<template>
  <section v-if="films" id="latest" class="wrapper style2 spotlights">
    <section v-for="film in films">
      <a :href="'/' + film.slug" class="image"><img class="small" :src="film.poster_url" alt="" data-position="center center" /></a>
      <div class="content">
        <div class="inner">
          <h2>{{ film.title }} <span v-if="film.year">({{ film.year }})</span></h2>

          <film-rate></film-rate>

          <p v-if="film.description" class="description">{{ film.description.substr(0, 250) }}</p>

          <ul class="actions">
            <li><a href="#" class="button special">View Quote ({{ film.quotes_count }})</a></li>
            <li><a :href="film.film_url" class="button">View Movie</a></li>
          </ul>
        </div>
      </div>
    </section>
  </section>
</template>

<script>
  import { mapState } from 'vuex'

  export default {
    name: 'LatestFilm',

    mounted () {
      this.$store.dispatch('getFilms')
    },

    computed: mapState({
      films: state => state.films
    })
  }
</script>

<style scoped>
  img.small {
    max-width: 350px;
  }

  p.description {
    margin-top: 20px;
  }
</style>