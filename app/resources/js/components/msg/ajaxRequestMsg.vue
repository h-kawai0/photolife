<template>
  <div class="p-detail__chat">
    <div class="p-detail__chat-l" v-for="comment in comments" :key="comment.id">

      <div class="p-detail__chat-img" v-if="comment.user">

        <img class="u-avator--radius" :src="'/storage/images/profile/' + (!(comment.user.pic === '') ? comment.user.pic: 'default/avatar_default.jpeg')" :alt="comment.user.name" />
        <p class="p-detail__chat-user">{{ comment.user.name }}</p>
      </div>

      <div class="p-detail__chat-txt" v-if="comment.user">
        <p>{{ comment.msg }}</p>
      </div>


    </div>
  </div>
</template>

<script>
export default {
  props: {
    pictureId: {
      required: true
    },
    comments: {
      required: true
    }
  },
  data: function() {
      return {
          // comments: []

      };
  },
  methods: {
    // getItems() {
    //   const url = "/detail/" + this.pictureId + "/comments";

    //   console.log(url);

    //   axios
    //     .get(url, {
    //       params: {
    //         picture_id: this.pictureId
    //       }
    //     })
    //     .then(response => {
    //       console.log(response);

    //       this.comments = response.data;
    //     })
    //     .catch(error => {
    //       console.log(error);
    //     });
    // }
  },
  // mounted(){

  //   this.getItems();

  // },
  computed: {

  },
  mounted() {
    console.log("ほげ");
  }
};
</script>