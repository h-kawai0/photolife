<template>
  <div>

    <div class="p-search">
      <h1 class="p-search__title">表示順</h1>

      <div class="p-search__selectBox p-search__sl">

        <select class="p-search__select" v-model="selected" @change="onSort">
          <option selected="selected" value="0">選択してください</option>
          <option value="1">投稿日が新しい順</option>
          <option value="2">投稿日が古い順</option>
        </select>

      </div>
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
      selected: "0",
    };
  },
  methods: {
    getItems() {
      // const url = "/index?page=" + this.page + "&sort=" + this.selected + "&check=" + this.checked;

      // axios.interceptors.request.use( request => {
      //   console.log('Starting Request: ', request);

      //   return request;
      // });

      // axios.interceptors.response.use( response => {
      //   console.log('Response: ', response);
      //   return response;
      // });

      axios
        .get('/index', {
          params: {
            page: this.page,
            sort: this.selected,
          }
        })
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
    onSort() {
      console.log(this.selected);

      switch (this.selected) {
        case "0": {
          console.log("ppaaaaaaaaaaa");
          break;
        }
        case "1": {
          console.log("降順");
          this.getItems();
          break;
        }
        case "2": {
          console.log("昇順");
          this.getItems();
          break;
        }
        default: {
          console.log("一致なし");
        }
      }
    },
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
