<template>
  <div class="c-pagination">
    <ul class="c-pagination--wrap" role="navigation">
      <li class="c-pagination__item" v-if="hasPrev">
        <a href="#" @click.prevent="move(data.current_page - 1)" class="c-pagination__link">&lt;</a>
      </li>

      <li v-for="page in pages" :key="page" class="c-pagination__item" :class="getPageClass(page)">
        <a href="#" @click.prevent="move(page)" class="c-pagination__link">{{ page }}</a>
      </li>

      <li class="c-pagination__item" v-if="hasNext">
        <a href="#" @click.prevent="move(data.current_page + 1)" class="c-pagination__link">&gt;</a>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    data: {}
  },
  data: function() {
    return {};
  },
  methods: {
    move(page) {
      if (!this.isCurrentPage(page)) {
        console.log(page);
        this.$emit("move-page", page);
      }
    },
    isCurrentPage(page) {
      return this.data.current_page == page;
    },
    getPageClass(page) {
      let classes = [];

      if (this.isCurrentPage(page)) {
        classes.push("c-pagination__item--active");
      }

      return classes;
    }
  },
  computed: {
    hasPrev() {
      return this.data.prev_page_url != null;
    },
    hasNext() {
      return this.data.next_page_url != null;
    },
    pages() {
      let pages = [];

      for (let i = 1; i <= this.data.last_page; i++) {
        pages.push(i);
      }

      return pages;
    }
  }
};
</script>
