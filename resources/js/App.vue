<template>
  {{ hello }}
  <router-link to="/">Home</router-link>
  <router-link to="/about">About</router-link>

  <router-view/>
</template>

<script>
export default {
  name: 'App',

  props: {},

  data () {
    return {
      hello: 'Hello Vue 3',
    }
  },

  computed: {},

  watch: {},

  created () {
  },

  mounted () {
  },

  methods: {},
}
</script>