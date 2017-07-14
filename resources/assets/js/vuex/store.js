import Vue from 'vue'
import Vuex from 'vuex'

import axis from 'axios'

Vue.use(Vuex)

const state = {
  film: {},
  latestFilms: [],
  spoiler: {},
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
  setLatestFilms (state, films) {
    state.latestFilms = films
  },

  setFilm (state, film) {
    state.film = film
  },

  submitSpoiler (state, spoiler) {
    state.spoiler = spoiler
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

  getLatestFilms ({ commit }) {
    axios.get('/latest')
      .then(response => {
        commit('setLatestFilms', response.data)
      }).catch(e => console.error(e))
  },

  getLatestQuote ({ commit }) {
    axios.get('/quote/latest')
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