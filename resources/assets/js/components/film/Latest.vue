<template>
  <section v-if="latestFilms" id="latest" class="wrapper style2 spotlights">
    <section v-for="film in latestFilms">
      <a :href="'/' + film.slug" class="image"><img class="small" :src="film.poster_url" alt="" data-position="center center" /></a>
      <div class="content">
        <div class="inner">
          <h2>{{ film.title }} <span v-if="film.year">({{ film.year }})</span></h2>

          <p>
            <i class="fa fa-fw fa-thumbs-up"></i> 0
          <i class="fa fa-fw fa-thumbs-down"></i> 0
          </p>

          <p v-if="film.description">{{ film.description.substr(0, 250) }}</p>

          <ul class="actions">
            <li><a href="#" class="button special">Spoil Me</a></li>
            <li><a href="#" class="button">View Movie</a></li>
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
      this.$store.dispatch('getLatestFilms')
    },

    computed: mapState({
      latestFilms: state => state.latestFilms
    })
  }
</script>

<style scoped>
  img.small {
    max-width: 350px;
  }
</style>