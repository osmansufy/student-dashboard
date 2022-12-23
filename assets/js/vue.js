// call vue for app id
new Vue({
  el: "#app",
  data: {
    message: "Hello Vue!",
  },
  //   call sa_learners_change_leaderBoard_reward action with axios post method
  methods: {
    changeLeaderBoardReward: function (event) {
      let nonce = event.target.dataset.nonce;
      let month = event.target.value;
      let data = {
        // action: "sa_learners_change_leaderBoard_reward",
        _wpnonce: nonce,
        month: month,
      };
      axios
        .post(pluginData.ajax_url, data, {
          headers: {
            "Content-Type": "application/json",
          },
        })
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
});

// Path: wp-content\plugins\sa-learners-dashboard\assets\js\vue.js
