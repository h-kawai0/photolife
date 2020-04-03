<template>
  <div>
    <div class="p-search">
      <h1 class="p-search__title">表示順</h1>

      <div class="p-search__selectBox p-search__sl">
        <select class="p-search__select" v-model="selected" @change="onChange($event)">
          <option selected="selected" value="0">選択してください</option>
          <!-- <option v-for="item in orderItems" :key="item.value" :value="item.value">{{ item.name }}</option> -->

          <option value="1">投稿日が新しい順</option>
          <option value="2">投稿日が古い順</option>


        </select>
      </div>
      <input type="submit" class="p-search__btn" value="検索する" />
    </div>

    <h1 class="p-index__title">写真一覧</h1>

    <index-panel :pictures="pictures.data"></index-panel>

    <pagi-nation :data="pictures" @move-page="movePage($event)"></pagi-nation>
  </div>
</template>

<script>
import IndexPanel from "./IndexPanel";
import PagiNation from "./Pagination";

export default {
  data: function() {
    return {
      page: 1,
      pictures: [],
      selected: "",
    };
  },
  methods: {
    getItems() {
      // const url = "/index?page=" + this.page;

      let url = `/index?page=${this.page}&order=${this.selected}`;
      axios
        .get(url)
        .then(response => {

          this.pictures = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    movePage(page) {
      this.page = page;
      this.getItems();
    },
    sortByColumn(column) {
      if (column === this.selected) {
        this.order = this.order === "asc" ? "desc" : "asc";
      } else {
        this.selected = column;
        this.order = "asc";
      }
      console.log("並び替え");
      this.getItems();
    },
    onChange(event) {
      console.log(event.target.value);
    }
  },
  mounted() {

    this.getItems();
  },
  computed: {},

  components: {
    indexPanel: IndexPanel,
    pagiNation: PagiNation
  }
};
</script>
