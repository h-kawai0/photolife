<template>
  <div class="p-detail__favorite--wrapper">
    <i
      class="fa fa-star p-detail__favorite-icon"
      :class="{ 'p-detail__favorite-icon--active': toggleLike }"
      aria-hidden="true"
      @click="postFavorite" v-if="user"
    ></i>
  </div>
</template>

<script>
export default {
  props: {
    isLike: {
      required: false
    },
    picture: {
        required: true
    },
    user: {
        required: false
    }
  },
  data: function() {
    return {
        toggleLike: ''
    };
  },
  mounted: function() {
      if(this.isLike){
          this.toggleLike = true;
      }else{
          this.toggleLike = false;
      }
  },
  methods: {
    postFavorite() {
      let url = "/app/detail/" + this.picture.id + "/favorite";
        console.log(url);
      axios
        .post(url, {
          userId: this.user,
          pictureId: this.picture.id
        })
        .then(response => {
          console.log(response);
          this.toggleLike = !this.toggleLike;
        })
        .catch(error => {
          console.log(error);
        });
    }
  }
};
</script>