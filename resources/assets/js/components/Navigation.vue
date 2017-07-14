<template>
  <div class="inner">
    <nav>
      <ul>
        <li><a href="#search">Find a Movie</a></li>
        <li>
          <a href="#quote">
            Quote Me!<br>
            <span v-if="film.title">{{ film.title }}</span>
          </a>
        </li>
        <li><a href="#latest">Latest Quotes Movie</a></li>
        <li><a href="#submit">Submit Quote</a></li>
      </ul>
    </nav>
  </div>
</template>

<script>
  import { mapState } from 'vuex'
  import _ from 'lodash'

  export default {
    name: 'Navigation',

    methods: {
      isEmpty (data) {
        return _.isEmpty(data)
      }
    },

    computed: mapState({
      film: state => state.film,
      latestFilms: state => state.latestFilms
    })
  }
</script>