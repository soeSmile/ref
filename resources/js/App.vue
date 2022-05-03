<template>
  <div class="app">
    <div class="mobile">
      <div class="mobile__item"
           @click="showMenu=true">
        <em class="mdi mdi-menu mobile__icon"/>
      </div>
    </div>
    <div class="mobile__back"
         @click="showMenu=false"
         :class="{'show': showMenu}"></div>

    <div class="sidebar"
         :class="{'show': showMenu}">
      <div class="sidebar__top">
        <img class="sidebar__img"
             src="/img/logo.png" alt="">
      </div>
      <div class="sidebar__wrap">
        <div class="sidebar__group">
          <div class="sidebar__menu">
            <router-link class="sidebar__item"
                         @click="showMenu=false"
                         v-for="(val,key) in menu"
                         :key="key"
                         :to="{ name: val.link }">
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
    const showMenu = ref(false)

    return { showMenu }
  },

  data () {
    return {
      menu: [
        { title: 'Главная', link: 'home', icon: 'mdi mdi-home' },
        { title: 'Настройки', link: 'setting', icon: 'mdi mdi-cog' },
        { title: 'Категории', link: 'category', icon: 'mdi mdi-shape' },
        { title: 'Теги', link: 'tag', icon: 'mdi mdi-tag' },
        { title: 'Ссылки', link: 'link', icon: 'mdi mdi-link' },
        { title: 'Пользователи', link: 'user', icon: 'mdi mdi-account-multiple' },
      ],
    }
  },
}
</script>