<template>
  <div class="app-container"
       :class="isCollapse ? 'show' : 'hide'">
    <header class="header"></header>

    <el-menu
        class="menu"
        :collapse="isCollapse"
        router
        default-active="/"
    >
      <div class="collapse"
           :class="isCollapse ? 'center' : 'left'">
        <em class="mdi mdi-menu icon"
            @click="isCollapse = !isCollapse"/>
      </div>

      <el-menu-item v-for="(val,key) in menu"
                    :key="key"
                    :index="val.link"
                    :route="val.link"
      >
        <el-icon>
          <em :class="val.icon"/>
        </el-icon>
        <template #title>
          {{ val.title }}
        </template>
      </el-menu-item>
    </el-menu>

    <main class="content">
      <router-view/>
    </main>

    <footer class="footer"></footer>
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