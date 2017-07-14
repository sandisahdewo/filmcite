<template>
  <div>
    <span>
      {{ item.title }}
      <span v-if="item.year">({{ item.year }})</span>
    </span>
    <abbr v-if="item.description">{{ item.description.substr(0, 120) }}</abbr>
    <abbr v-else>No description yet.</abbr>
  </div>
</template>

<script>
  export default {
    name: 'SearchSuggest',

    props: {
      item: {
        required: true
      }
    }
  }
</script>