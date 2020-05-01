<template>
  <header class="l-header">
    <a class="p-header__logo" href="/app">
      <h1 class="p-header__title">ふぉとらいふ</h1>
    </a>

    <div class="p-header__hamburger" :class="{ 'is-active': active }" @click="naviOpen">
      <span class="p-header__sp-menu" />
      <span class="p-header__sp-menu" />
      <span class="p-header__sp-menu" />
    </div>

    <nav class="p-header__nav" :class="{ 'is-active': active }">
      <ul class="p-header__menu">
        <li class="p-header__item">
          <a class="p-header__link" href="/app">
            <span class="p-header__title u-text--large">ふぉとらいふ</span>
          </a>
        </li>
        <li class="p-header__item">
          <a class="p-header__link" href="/app">TOP</a>
        </li>

        <li class="p-header__item" v-if="!user">
          <a class="p-header__link" href="/app/login">LOGIN</a>
        </li>
        <li class="p-header__item" v-if="!user">
          <a class="p-header__link" href="/app/register">REGISTER</a>
        </li>

        <li class="p-header__item" v-if="user">
          <a href="/app/mypage" class="p-header__link">MYPAGE</a>
        </li>
        <li class="p-header__item" v-if="user">
          <a
            class="p-header__link"
            href="/app/logout"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
          >LOGOUT</a>

          <form id="logout-form" action="/app/logout" method="POST" style="display: none;">
            <input type="hidden" name="_token" :value="csrf" />
          </form>
        </li>
        <li class="p-header__item" v-if="user">
          <a class="p-header__link" href="/app/photoedit">EDIT</a>
        </li>
        <li class="p-header__item">
          <a class="p-header__link" href>SEARCH</a>
        </li>
      </ul>
    </nav>
  </header>
</template>
<script>
export default {
  props: ["user"],
  data: function() {
    return {
      active: false,
      navi: false,
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content")
    };
  },
  methods: {
    naviOpen: function() {
      this.active = !this.active;
      this.navi = !this.navi;
    }
  }
};
</script>
