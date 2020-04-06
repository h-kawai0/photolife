<template>
  <div>
    <ajax-request-msg :picture-id="pictureId" :comments="comments"></ajax-request-msg>

    <ajax-send-msg :user-id="userId" @handle-msg-submit="callBackAddMsg"></ajax-send-msg>
  </div>
</template>

<script>
import AjaxRequestMsg from "./ajaxRequestMsg";
import AjaxSendMsg from "./ajaxSendMsg";

export default {
  props: {
    pictureId: {
      required: true
    },
    userId: {
      required: false
    }
  },
  data: function() {
    return {
      comments: []
    };
  },
  methods: {
    callBackAddMsg(val) {
      console.log(val);

      const url = "/detail/" + this.pictureId + "/send";

      console.log(url);

      axios
        .post(url, {
          msg: val,
          userId: this.userId,
          pictureId: this.pictureId
        })
        .then(response => {
          console.log(response);
          this.bindSendMsg;
        })
        .catch(error => {
          console.log(error);
        });
    },
    getItems() {
      const url = "/detail/" + this.pictureId + "/comments";

      console.log(url);

      axios
        .get(url, {
          params: {
            picture_id: this.pictureId
          }
        })
        .then(response => {
          console.log(response);

          this.comments = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  computed: {
      bindSendMsg() {
          this.getItems();
      }
  },
  mounted() {
    this.getItems();
  },
  components: {
    ajaxRequestMsg: AjaxRequestMsg,
    ajaxSendMsg: AjaxSendMsg
  }
};
</script>