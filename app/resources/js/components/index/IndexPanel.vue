<template>
  <div class="c-panels">
    <article class="c-panels__item" v-for="picture in pictures" :key="picture.id">
      <a :href="'/detail/' + picture.id" class>
        <div class="c-panels__head">
          <img :src="'storage/images/photo/'+ picture.pic" :alt="picture.title" />
        </div>
      </a>
      <div class="c-panels__body">
        <h2 class="c-panels__title">{{ picture.title}}</h2>
      </div>
      <div class="c-panels__footer">
        <div class="c-panels__info">
          <a class="c-panels__avator">
            <div class="c-panels__avator-pic">
              <img
                :src="'/storage/images/profile/' + picture.user.pic"
                :alt="picture.user.name"
                class="u-avator--radius"
              />
            </div>
            <span class="c-panels__author">{{ picture.user.name }}</span>
          </a>
        </div>

        <div class="c-panels__date">{{ picture.created_at | moment("YYYY.M.D") }}</div>
      </div>
    </article>
  </div>
</template>

<script>
export default {
  props: ["pictures"],
  data: function() {
    return {};
  },
  methods: {},
  components: {}
};
</script>