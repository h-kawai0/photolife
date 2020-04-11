<template>
<transition name="c-flash" appear>

  <div class="c-flash" v-show="isActive" role="alert">{{ flashMsg }}</div>

</transition>

</template>

<script>
export default {
  props: {
      flashMsg: {
          required: false,
      }
  },
  data: function() {
    return {
        isActive: true
    };
  },
  mounted() {

      setTimeout(this.hiddenMsg, 3000);

  },

  methods: {
      hiddenMsg() {

          this.isActive = false;
      }
  }
};
</script>