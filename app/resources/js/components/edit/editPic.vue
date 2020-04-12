<template>
  <div class="p-photoEdit__pic">

    <img v-show="uploadedImage" :src="uploadedImage" />

    <img v-if="!uploadedImage && picture.id" :src="'/storage/images/photo/' + picture.pic" :alt="picture.title">

    <input type="file" name="pic" v-on:change="onFileChange" />
  </div>
</template>

<script>
export default {
    props: {
        picture: {
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