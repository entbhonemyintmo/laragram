<template>
  <div>
    <button
      class="btn btn-primary"
      @click="followUser"
      v-text="isFollow"
    ></button>
  </div>
</template>

<script>
export default {
  props: ["userId", "follows"],
  mounted() {
    console.log('Component Mounted');
  },

  data: function () {
    return {
      status: this.follows,
    };
  },

  methods: {
    followUser() {
      axios
        .post(`/follow/${this.userId}`)
        .then((res) => {
          if (res.status === 200) this.status = !this.status;
        })
        .catch(error => {
          if (error.data.status === 401) (window.location = "/login");
        });
    },
  },
  computed: {
    isFollow() {
      return this.status ? "Unfollow" : "Follow";
    },
  },
};
</script>
