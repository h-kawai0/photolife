<template>

    <div class="p-detail__msg">
      <form method="POST" action class="p-detail__form" v-if="userId">
        <textarea v-model="text" class="p-detail__input"></textarea>
        <span :class="{'p-detail__msg--alert': isValid}">{{ text.length }}</span>/500

        <span v-if="validMax" class="p-detail__msg--alert">文字数が超えています。</span>
        <input type="submit" class="p-detail__btn" :class="{'p-detail__btn--isValid': isValid}" @click="handleMsgSubmit" value="コメントする" :disabled="btnDisabled" />
      </form>

      <div class="p-detail__unregist" v-else>
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
      btnDisabled: true,
      isValid: false
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
  },
  computed: {
    validMax: function(){

      if( this.text.length <= '500'){
        this.btnDisabled = false;
        this.isValid = false;
        return false;
      }else{
        this.btnDisabled = true;
        this.isValid = true;
        return true;
      }
    }
  }
};
</script>