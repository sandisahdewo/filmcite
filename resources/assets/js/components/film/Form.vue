<template>
  <div class="inner">
    <h2 v-if="film.title">{{ film.title }}</h2>
    <h2 v-else>Add New Quote</h2>
    
    <p v-if="film.description">{{ film.description }}</p>

    <div class="">
      <section>
        <form method="post" action="/submit-spoiler">
          <div class="field">
            <label for="title">Title</label>
            <input type="text" class="form-control" placeholder="Search film here...">
          </div>
          <div class="field half first">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" />
          </div>
          <div class="field half">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" />
          </div>
          <div class="field">
            <label for="message">Message</label>
            <textarea name="message" id="message" rows="5"></textarea>
          </div>
          <ul class="actions">
            <li><a href="" class="button submit special">Submit Quote</a></li>
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
  export default {
    name: 'FormSpoiler',

    data () {
      return {
        film: {}
      }
    }
  }
</script>