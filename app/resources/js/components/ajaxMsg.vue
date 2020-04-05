<template>
  <div>
    <div class="p-detail__chat">
      <div class="p-detail__chat-l">
        <a class="p-detail__chat-img">
          <img class="u-avator--radius" src alt />
          <p class="p-detail__chat-user">MASA</p>
        </a>

        <div class="p-detail__chat-txt">
          <p>うまそう(棒)</p>
        </div>
      </div>

      <div class="p-detail__chat-l">
        <a class="p-detail__chat-img">
          <img class="u-avator--radius" src alt />
          <p class="p-detail__chat-user">MASA</p>
        </a>

        <div class="p-detail__chat-txt">
          <p>くいてえええええええ</p>
        </div>
      </div>
    </div>

    <div class="p-detail__msg">
      <form method="POST" action class="p-detail__form">
        <textarea v-model="text" class="p-detail__input"></textarea>
        <input type="submit" class="p-detail__btn" @click="msgSubmit($event)" value="コメントする" />
      </form>
    </div>
  </div>
</template>

<script>
export default {
  // props: ["pictureId", "userId"],

  props: {
      pictureId: {
          required: true,
      },
      userId: {
          required: false
      }
  },
  data: function() {
    return {
      text: ""
    };
  },
  methods: {
    msgSubmit(e) {
      e.preventDefault();

      console.log("hoge");

      const url = "/detail/" + this.pictureId + "/favorite";

      console.log(url);

      axios
        .post(url, {
            msg: this.text,
            userId: this.userId,
            pictureId: this.pictureId
        })
        .then(response => {
          console.log("成功");
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>