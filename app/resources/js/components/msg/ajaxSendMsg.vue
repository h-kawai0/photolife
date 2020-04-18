<template>

    <div class="p-detail__msg">
      <form method="POST" action class="p-detail__form" v-if="userId">
        <textarea v-model="text" class="p-detail__input"></textarea>
        <span>{{ text.length }}</span>/500
        <input type="submit" class="p-detail__btn" @click="handleMsgSubmit" value="コメントする" />
      </form>

      <div v-else>
        ログインすると写真にコメントを投稿することができます。
      </div>
    </div>

</template>

<script>
export default {

  props: {
      // pictureId: {
      //     required: true,
      // },
      userId: {
          required: false
      }
  },
  data: function() {
    return {
      text: "",
    };
  },
  methods: {
    // msgSubmit(e) {
    //   e.preventDefault();

    //   console.log("hoge");

    //   const url = "/detail/" + this.pictureId + "/send";

    //   console.log(url);

    //   axios
    //     .post(url, {
    //         msg: this.text,
    //         userId: this.userId,
    //         pictureId: this.pictureId
    //     })
    //     .then(response => {
    //       console.log(response);
    //       this.text = "";
          
    //     })
    //     .catch(error => {
    //       console.log(error);
    //     });
    // },
    handleMsgSubmit(e) {
      e.preventDefault();

      let val = this.text;
      this.text = "";

      this.$emit('handle-msg-submit', val)
    }
  }
};
</script>