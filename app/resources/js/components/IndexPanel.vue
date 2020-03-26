<template>
  <div class="c-panels">
    <article class="c-panels__item" v-for="picture in pictures.data" :key="picture.id">
      <a href class>
        <div class="c-panels__head">
          <img :src="'storage/images/photo/'+ picture.pic" :alt="picture.title" />
        </div>
      </a>
      <div class="c-panels__body">
        <h2 class="c-panels__title">{{ picture.title}}</h2>
        <div class="c-panels__favorite--wrapper">
          <i class="fa fa-star c-panels__favorite-icon"></i>
        </div>
      </div>
      <div class="c-panels__footer">
        <div class="c-panels__info">
          <a class="c-panels__avator">
            <div class="c-panels__avator-pic">
              <img :src="'/storage/images/profile/' + picture.user.pic" :alt="picture.user.name" class="u-avator--radius" />
            </div>
            <span class="c-panels__author">{{ picture.user.name }}</span>
          </a>
        </div>

        <div class="c-panels__date">
            {{ picture.created_at | moment("YYYY.M.D") }}
        </div>
      </div>
    </article>

        <pagi-nation :data="pictures" @move-page="movePage($event)"></pagi-nation>

  </div>
</template>

<script>
export default {
  data: function() {
    return {
      page: 1,
      pictures: []
    };
  },
  methods: {
    getItems() {

      const url = '/index?page='+ this.page;
      axios.get(url).then((response) => {
        console.log('成功');
        console.log(response);
        console.log(response.data);

        this.pictures = response.data;

      }).catch((error) => {
        console.log(error);
      });

    },
    movePage(page) {
      this.page = page;
      this.getItems();
    }
  },
  mounted() {

    this.getItems();
  }
};
</script>