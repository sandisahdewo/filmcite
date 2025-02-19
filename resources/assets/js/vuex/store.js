import Vue from 'vue'
import Vuex from 'vuex'

import axis from 'axios'

Vue.use(Vuex)

const state = {
  film: {},
  films: [],
  quotes: {},
  lastQuote: {},
  total: {
    number: 0,
    string: '0'
  }
}

const getters = {

}

const mutations = {
  /**
   * Get 3 latest films from database
   * @param {[object]} state 
   */
  setFilms (state, films) {
    state.films = films
  },

  setFilm (state, film) {
    state.film = film
  },

  setTotalFilm (state, total) {
    state.total = total
  },

  setLastQuote (state, quote) {
    state.lastQuote = quote
  }
}

const actions = {
  setFilm ({ commit }, film) {
    commit('setFilm', film)
  },

  getFilms ({ commit }) {
    axios.get('/latest')
      .then(response => {
        commit('setFilms', response.data)
      }).catch(e => console.error(e))
  },

  getLatestQuote ({ commit }) {
    axios.get('/quote/random')
      .then(response => {
        commit('setLastQuote', response.data)
      }).catch(e => console.error(e))
  }
}

export default new Vuex.Store({
  state,
  getters,
  mutations,
  actions
})