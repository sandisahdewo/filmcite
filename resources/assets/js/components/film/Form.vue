<template>
  <div class="inner">
    <h2 v-if="film.title">{{ film.title }}</h2>
    <h2 v-else>Add New Quote</h2>
    <p>No need to log in to submit new quote. Write your favorite quotes from film and spread it to entire world.</p>
    <hr>
    
    <p v-if="film.description">{{ film.description }}</p>

    <div class="">
      <section>
        <form @submit.prevent="create" method="post" action="/submit">
          <div class="field">
            <label for="title">Movie or TV Series</label>
            <input type="text" class="form-control" placeholder="Search film here...">
          </div>

          <div class="field">
            <label for="name">Role Name</label>
            <input v-model="model.name" type="text" name="name" id="name" />
          </div>

          <div class="field">
            <label for="quote">Message</label>
            <textarea v-model="model.quote" name="quote" id="quote" rows="5"></textarea>
          </div>

          <ul class="actions">
            <li>
              <button class="button special" type="submit">
                <i v-if="loading" class="fa fa-spin fa-spinner"></i> Submit Quote
              </button>
            </li>
            <li>
              <button class="button" type="reset">Reset</button>
            </li>
          </ul>

        </form>
      </section>
    </div>
  </div>
</template>

<script>
  import { mapState } from 'vuex'

  export default {
    name: 'FormQuote',

    data () {
      return {
        errors: [],
        loading: false,
        model: {
          film_id: 1,
          name: '',
          quote: ''
        }
      }
    },

    methods: {
      create (e) {
        this.loading = true

        axios.post(e.target.action, this.model)
          .then(response => {
            this.model = {
              film_id: 0,
              name: '',
              quote: ''
            }
            
            this.loading = false
          })
          .catch(e => {
            if (e) {
              if (e.response.status == 422) {
                this.errors = e.response.data.validations
              }
            }

            this.loading = false
          })
      }
    },

    computed: mapState({
      film: state => state.film
    })
  }
</script>