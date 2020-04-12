<template>
  <div class="p-photoEdit__pic">

    <img v-show="uploadedImage" :src="uploadedImage" />

    <img v-if="!uploadedImage && user.pic" :src="'/storage/images/profile/' + user.pic" :alt="user.name">

    <input type="file" name="pic" v-on:change="onFileChange" />
  </div>
</template>

<script>
export default {
    props: {
        user: {
            required: false
        }
    },
  data: function() {
    return {
      uploadedImage: ""
    };
  },
  methods: {
    onFileChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();

      reader.onload = (e) => {
        this.uploadedImage = e.target.result;
      };

      reader.readAsDataURL(file);
    }
  }
};
</script>