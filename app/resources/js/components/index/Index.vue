<template>
  <div>
    <div class="p-search">
      <form method="GET" action>
        <h1 class="p-search__title">表示順</h1>

        <div class="p-search__selectBox p-search__sl">
          <select name="sort" class="p-search__select">
            <option>選択してください</option>
            <option>投稿日が新しい順</option>
            <option>投稿日が古い順</option>
          </select>
        </div>
        <input type="submit" class="p-search__btn" value="検索する" />
      </form>
    </div>

    <h1 class="p-index__title">写真一覧</h1>

    <index-panel :pictures="pictures" @move-page="movePage($event)"></index-panel>
  </div>
</template>

<script>
import IndexPanel from "./IndexPanel";

export default {
  data: function() {
    return {
      page: 1,
      pictures: []
    };
  },
  methods: {
    getItems() {
      const url = "/index?page=" + this.page;
      axios
        .get(url)
        .then(response => {
          console.log("成功");
          console.log(response);
          console.log(response.data);

          this.pictures = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    movePage(page) {

        console.log("ほげ");
      this.page = page;
      this.getItems();
    }
  },
  mounted() {
      console.log("mounted")
    this.getItems();
  },
  components: {
    indexPanel: IndexPanel
  }
};
</script>