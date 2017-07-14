<template>
  <div class="user-rate">
    <a href="#" class="up"><i class="fa fa-fw fa-thumbs-up"></i> 0</a>
    <a href="#" class="down"><i class="fa fa-fw fa-thumbs-down"></i> 0</a>
  </div>
</template>

<script>
  export default {
    name: 'SpoilRate'
  }
</script>

<style scoped>
  div.user-rate > a {
    font-size: 1.2em !important;
    border-bottom: none;
  }

  a.up {
    margin-right: 20px;
  }
</style>