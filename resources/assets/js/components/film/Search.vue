<template>
  <div class="inner">
      <h1>Find Quotes on Films</h1>
      <blockquote v-if="lastQuote.quote">
        <p>"{{ lastQuote.quote }}"</p>
        <footer>{{ lastQuote.role }} - <cite><a :href="lastQuote.film.film_url">{{ lastQuote.film.title }}</a></cite></footer>
      </blockquote>
      
      <v-autocomplete 
        :items="films"
        v-model="title"
        :get-label="getLabel"
        :component-item='template'
        input-class="form-control"
        :placeholder="'Search from ' + total.string + ' films and TV series...'"
        @update-items="updateItems"
        @item-selected="getFilm"
      >
      </v-autocomplete>

      <p v-if="loading" class="loading">
        <i class="fa fa-spin fa-spinner"></i> Loading a film...
      </p>
  </div>
</template>

<script>
  import Autocomplete from 'v-autocomplete'
  import AutocompleteTemplate from './Autocomplete.vue'
  import { mapActions } from 'vuex'
  import { mapState } from 'vuex'

  Vue.use(Autocomplete)

  export default {
    name: 'FilmSearch',

    data () {
      return {
        title: '',
        films: [],
        loading: false,
        template: AutocompleteTemplate
      }
    },

    mounted () {
      axios.get('/total')
        .then(response => {
          this.$store.commit('setTotalFilm', response.data)
        })
        .catch(e => console.error(e))

        this.$store.dispatch('getLatestQuote')
    },

    methods: {
      getLabel (item) {
        return item.title
      },

      getFilm (film) {
        this.loading = true

        if (film.id == undefined) {
          console.error('Film ID is not defined.')
        }

        axios.get('/film/' + film.id).then(response => {
          this.$store.dispatch('setFilm', response.data)
          this.loading = false
        }).catch(e => console.error(e))
      },

      updateItems (text) {
        let params = {
          title: text,
          limit: 5
        }

        axios.get('/search', {params}).then(response => {
          this.films = response.data;
        }).catch(e => console.error(e))

        if (! text) {
          this.films = []
        }
      }
    },

    computed: mapState({
      total: state => state.total,
      lastQuote: state => state.lastQuote
    })
  }

</script>

<style scoped>
  p.loading {
    font-size: 1.3em;
    margin-top: 30px;
  }
</style>

<style>
  .v-autocomplete .v-autocomplete-input-group .v-autocomplete-input {
  font-size: 1em;
  padding: 10px 15px;
  box-shadow: none;
  border: 1px solid #157977;
  width: calc(100% - 32px);
  outline: none;
  background-color: #eee;
}

.v-autocomplete .v-autocomplete-input-group.v-autocomplete-selected .v-autocomplete-input {
  color: #008000;
  background-color: #f2fff2;
}

.v-autocomplete .v-autocomplete-list {
  width: 100%;
  text-align: left;
  border: none;
  border-top: none;
  max-height: 400px;
  overflow-y: auto;
  border-bottom: 1px solid #eee;
}

.v-autocomplete .v-autocomplete-list .v-autocomplete-list-item {
  cursor: pointer;
  background-color: #5e42a6;
  padding: 10px;
  border-bottom: 1px solid #eee;
  border-left: 1px solid #eee;
  border-right: 1px solid #eee;
}

.v-autocomplete .v-autocomplete-list .v-autocomplete-list-item:last-child {
  border-bottom: none;
}

.v-autocomplete .v-autocomplete-list .v-autocomplete-list-item:hover {
  background-color: #b74e91;
  color: #fff;
}

.v-autocomplete .v-autocomplete-list .v-autocomplete-list-item abbr {
  opacity: 0.8;
  font-size: 0.8em;
  display: block;
  font-family: sans-serif;
}
</style>