<template>
  <div class="app">
    <div class="sidebar">
      <div class="sidebar__top">
        <img class="sidebar__img"
             src="img/logo.png" alt="">
      </div>
      <div class="sidebar__wrap">
        <div class="sidebar__group">
          <div class="sidebar__menu">
            <router-link class="sidebar__item"
                         v-for="(val,key) in menu"
                         :key="key"
                         :to="val.link">
              <div class="sidebar__icon">
                <em :class="val.icon"/>
              </div>
              <div class="sidebar__text">
                {{ val.title }}
              </div>
            </router-link>
          </div>
        </div>
      </div>
      <div class="sidebar__bottom">
        Bottom
      </div>
    </div>
    <div class="content">
      <router-view/>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'

export default {
  name: 'App',

  setup () {
    const isCollapse = ref(false)

    return { isCollapse }
  },

  data () {
    return {
      menu: [
        { title: 'Home', link: '/', icon: 'mdi mdi-home' },
        { title: 'Setting', link: '/setting', icon: 'mdi mdi-cog' },
        { title: 'User', link: '/user', icon: 'mdi mdi-account-multiple' },
      ],
    }
  },
}
</script>