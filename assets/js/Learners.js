class Learners {
  $ = jQuery;
  constructor() {
    this.events();

    this.alertContainer.hide();
    this.circularProgress();
  }
  profile_picture = "";
  alertContainer = $(".alert-container");
  // toaster function
  toaster(message) {
    this.alertContainer.animate({
      width: "toggle",
    });
    $(".sa-alert-text").html(message);
    window.setTimeout(() => {
      this.alertContainer.animate({
        width: "toggle",
      });
      // alert.slideRight();
    }, 3000);
  }

  events() {
    $("#txtSearch").on("keyup", this.onSearch);
    $(".sal_add_to_cart_button").click(this.addToCart.bind(this));
    $("#sal_profile_picture").on(
      "change",
      this.onChangeProfilePicture.bind(this)
    );
    $("#sal_user_form").on("submit", this.onSubmitProfilePicture.bind(this));
    $("form#sal_user_pass_from").on("submit", this.onSubmitPassword.bind(this));
    $("form.sa-learners-edit-user").on(
      "submit",
      this.onSubmitEditUser.bind(this)
    );
    $("#sa_user_reward").on("change", this.onChangeReward);
    $(".btn-expand-collapse").click(function (e) {
      $(".navbar-primary").toggleClass("collapsed");
    });
    // add collapse class  for mobile screen and remove when others

    $(window).on("load", function () {
      if (window.matchMedia("(max-width: 992px)").matches) {
        $(".navbar-primary").addClass("collapsed");
      } else {
        $(".navbar-primary").removeClass("collapsed");
      }
    });
    $(".sal-claim-reward").on("click", this.onClaimReward);
    $("#sal_gf_coupon").on("click", this.onClaimRewardGfCoupon);

    $(".start-course-btn").on("click", this.onStartCourse.bind(this));
    $(function () {
      $(".sa-top-nav li .nav-link").click(function () {
        $(".sa-top-nav li .nav-link").removeClass("active");
        $(this).addClass("active");
      });
    });
    this.$("#sa-sidebar-btn-expand").on("click", console.log("logout"));
    this.onChangeLeaderBoardReward("monthly_leaderBoard1");
    this.onChangeLeaderBoardReward("monthly_leaderBoard2");
  }
  onChangeLeaderBoardReward(identifier) {
    $("#" + identifier).on("change", function (e) {
      let month = $(e.target).val();
      $.ajax({
        type: "POST",
        url: pluginData.ajax_url,
        data: {
          action: "sa_learners_change_leaderBoard_reward",
          month: month,
        },
        beforeSend: function () {
          console.log("data-sending");
          $("#" + `${identifier}-table`).html(
            '<i class="fas fa-spinner fa-pulse" style="color: red; font-size: 40px;"></i>'
          );
        },
        success: (data) => {
          console.log(data);
          if (data) {
            let data_get = JSON.parse(data);
            let board_list_content = "";
            const award_image = `${pluginData.plugin_url}/assets/images/award.png`;
            if (data_get.length > 0) {
              data_get.forEach((item, index) => {
                board_list_content += `
                  <tr class="">
                    <th><img src="${award_image}" alt="award">
                    ${index + 1}</th>
                    <th>${item.display_name.toUpperCase()}</th>
                    <th>${item.total_reward}</th>
                  </tr>`;
              });
            } else {
              board_list_content = `<tr class="text-center">
                <th>No data found</th>
              </tr>`;
            }

            $("#" + `${identifier}-table`).html(board_list_content);
            console.log(board_list_content);
          } else {
            console.log(data.message);
          }
        },
      });
    });
  }

  // onChangeLeaderBoardReward(e) {
  //   let month = $(e.target).val();
  //   $.ajax({
  //     type: "POST",
  //     url: pluginData.ajax_url,
  //     data: {
  //       action: "sa_learners_change_leaderBoard_reward",
  //       month: month,
  //     },
  //     beforeSend: function () {
  //       console.log("data-sending");
  //       $("#leader_board_table").html(
  //         '<i class="fas fa-spinner fa-pulse" style="color: red; font-size: 40px;"></i>'
  //       );
  //     },
  //     success: (data) => {
  //       console.log(data);
  //       if (data) {
  //         let data_get = JSON.parse(data);
  //         let board_list_content = "";
  //         if (data_get.length > 0) {
  //           data_get.forEach((item, index) => {
  //             board_list_content += `

  //           <tr class="">
  //           <th><img src="https://www.trainingexpress.org.uk/wp-content/uploads/2021/09/award.png" alt="award">
  //           ${index + 1}</th>
  //           </th>
  //   <th>${item.display_name.toUpperCase()}</th>
  //   <th>${item.total_reward}</th>

  //   </tr>`;
  //           });
  //         } else {
  //           board_list_content = `<tr class="text-center">
  //           <th>No data found</th>

  //           </tr>`;
  //         }

  //         $("#leader_board_table").html(board_list_content);

  //         console.log(board_list_content);
  //         // $("#leader_board_table").html(board_list_content);
  //       } else {
  //         console.log(data.message);
  //       }
  //     },
  //   });
  // }

  onClaimRewardGfCoupon(e) {
    e.preventDefault();

    let nonce = e.target.dataset.nonce;
    let userId = e.target.dataset.userid;
    let reward_used = e.target.dataset.reward;
    console.log(reward_used, userId, nonce);
    $.ajax({
      // Send the username to the php file
      type: "POST",
      url: pluginData.ajax_url,
      data: {
        action: "sa_learners_claim_gf_reward",
        user_id: userId,
        reward_used: reward_used,
        sal_nonce: nonce,
      },
      beforeSend: function () {
        let content = `<div>
    <span>Coupon Code:<i class="fas fa-spinner fa-pulse" style="color: red; font-size: 40px;"></i></span>
        </div>`;
        $(".sal_gf_coupon_code").html(content);
      },
      success: (data) => {
        console.log(data);
        if (data.success) {
          console.log(data.data.message);
          let content = `<div>
    <span>Coupon Code:${data.data.coupon_code}</span>
    </div>`;
          $(".sal_gf_coupon_code").html(content);
        } else {
          console.log(data.message);
        }
      },
    });
  }
  onClaimReward(e) {
    // $userId = $(e.target).data("userid");
    let reward_used = e.target.dataset.reward;
    let coupon_id = e.target.dataset.couponid;

    let userId = e.target.dataset.userid;
    let user_email = e.target.dataset.user_email;
    let nonce = e.target.dataset.nonce;

    console.log(reward_used, coupon_id, user_email, userId);
    $.ajax({
      // Send the username to the php file
      type: "POST",
      url: pluginData.ajax_url,
      data: {
        action: "sa_learners_claim_reward",
        reward_used: reward_used,
        coupon_id: coupon_id,
        user_email: user_email,
        userId: userId,
        nonce: nonce,
      },
      beforeSend: function () {
        $(`.sal_coupon_${coupon_id}`).html(
          '<i class="fas fa-spinner fa-pulse" style="color: red; font-size: 40px;"></i>'
        );
      },
      success: (data) => {
        console.log(data);
        if (data.success) {
          console.log(data.data.message);
          let content = `<div>
    <span>Coupon Code:${data.data.coupon_code}</span>
    </div>`;
          $(`.sal_coupon_${coupon_id}`).html(content);
        } else {
          console.log(data.message);
        }
      },
    });
  }
  onChangeReward(e) {
    console.log(e.target.value);
    // get data attribute
    console.log(e.target.dataset.userid);
    let userId = e.target.dataset.userid;
    let reward = e.target.value;
    $.ajax({
      // Send the username to the php file
      type: "POST",
      url: pluginData.ajax_url,
      data: {
        action: "sa_learners_change_reward",
        user_id: userId,
        date_range: reward,
      },
      beforeSend: function () {
        $("#sal_user_point_earned").html(
          '<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>'
        );
      },
      success: (data) => {
        console.log(data);
        $("#sal_user_point_earned").text(data);
      },
    });
  }
  circularProgress() {
    let progressBars = document.querySelectorAll(".circular-progress");
    console.log(progressBars);
    for (var i = 0; i < progressBars.length; i++) {
      let progressBar = progressBars[i];
      let value = progressBar.getAttribute("data-percent");
      let progressValue = 0;
      let progressEndValue = parseInt(value) ? parseInt(value) : 0;
      let speed = 50;

      let progress = setInterval(() => {
        let valueContainer = progressBar.querySelector(".value-container");
        valueContainer.textContent = `${progressEndValue}`;
        progressBar.style.background = `conic-gradient(
                  #7BA631 ${progressValue * 3.6}deg,
                  #DFE9D3 ${progressValue * 3.6}deg
                  )`;
        if (progressValue == progressEndValue || progressEndValue == 0) {
          clearInterval(progress);
        }
        progressValue++;
      }, speed);
      console.log(progressValue);
    }
  }
  onSubmitEditUser(e) {
    e.preventDefault();
    console.log(e);
    // When the button is clicked
    let firstName = $("#sa-firstName").val();
    let lastName = $("#sa-lastName").val();
    let userId = $("#sa-userId").val();
    let email = $("#sa-email").val();
    let description = $("#sa-description").val();
    let displayName = $("#sa-displayName").val();
    $.ajax({
      // Send the username to the php file
      type: "POST",
      url: pluginData.ajax_url,
      data: {
        action: "sa_learners_update",
        firstName: firstName,
        lastName: lastName,
        id: userId,
        email: email,
        description: description,
        displayName: displayName,
        sal_nonce: pluginData.sal_nonce,
      },
      beforeSend: function () {
        // $("#sa-loading-state").style.display = "block";
        // $("#sa-user-update-btn").style.display = "none";
      },
      success: (data) => {
        console.log(data);
        let message = `<h4 class="text-danger">${data.data.message}</h4`;
        // $("#sa-loading-state").hide();
        // $("#sa-data-div").html(message); // Replace the div with the retrieved data
        this.toaster(message);
      },
      error: function (errorThrown) {
        console.log(errorThrown);
      },
    });
  }
  onSubmitPassword(e) {
    e.preventDefault();

    let old_password = $("#sal_old_password").val();
    // $user_id = $("#sal_user_id").val();
    let user_email = $("#sal_user_email").val();
    let new_password = $("#sal_new_password").val();
    let confirm_password = $("#sal_confirm_password").val();
    let nonce = $("#sal_user").val();

    if (old_password == "") {
      let message = `<strong>Current Password is required</strong>`;
      this.toaster(message);
      return false;
    }
    if (new_password == "") {
      let message = `<strong>New Password is required</strong>`;
      this.toaster(message);
      return false;
    }
    if (confirm_password == "") {
      let message = `<strong>Confirm Password is required</strong>`;
      this.toaster(message);
      return false;
    }
    if (new_password != confirm_password) {
      let message = `<strong>New password and confirm password does not match</strong>`;
      this.toaster(message);
      return false;
    }

    $.ajax({
      url: pluginData.ajax_url,
      type: "POST",
      data: {
        action: "sa_learners_change_password",
        old_password: old_password,
        new_password: new_password,
        confirm_password: confirm_password,
        user_email: user_email,
        sal_nonce: nonce,
      },
      success: (data) => {
        console.log(data);
        if (data.success) {
          // alert("Password updated successfully");
          let message = `<strong>Password updated successfully</strong>`;
          this.toaster(message);
        } else {
          let message = `<strong>${data?.data.message}</strong>`;
          this.toaster(message);
        }
      },
      // error: function (data) {
      //   let message = `<strong>${data.data.message}</strong>`;
      //   toaster(message);
      //   console.log(data);
      // },
    });
  }

  onChangeProfilePicture() {
    this.profile_picture = $("#sal_profile_picture").prop("files")[0];
    console.log(this.profile_picture);

    let fileType = this.profile_picture?.type;
    let fileSize = this.profile_picture?.size;
    let validImageTypes = ["image/gif", "image/jpeg", "image/png", "image/jpg"];
    if ($.inArray(fileType, validImageTypes) < 0) {
      let message = `<strong>"Please upload a valid image file (jpg, jpeg, png, gif</strong>`;
      toaster(message);
      $("#sal_profile_picture").val("");
      return false;
    }
    if (fileSize > 1000000) {
      console.log(fileSize);
      // alert("Please upload a file less than 1MB");
      let message = `<strong>"Please upload a file less than 1MB</strong>`;
      toaster(message);
      $("#sal_profile_picture").val("");
      return false;
    }

    var reader = new FileReader();
    reader.onload = function (e) {
      $(".upload_image_preview_img").attr("src", e.target.result);
    };
    reader.readAsDataURL(this.profile_picture);
  }
  onSubmitProfilePicture(e) {
    e.preventDefault();
    let formData = new FormData();
    formData.append("action", "sa_learners_update_profile_picture");
    formData.append("profile_picture", this.profile_picture);
    let user_profile_picture_nonce = $("#user_profile_picture_nonce").val();
    formData.append("nonce", user_profile_picture_nonce);
    $.ajax({
      url: pluginData.ajax_url,
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: (data) => {
        console.log(data);
        if (data.success) {
          $(".upload_image_preview_img").attr("src", data.url);
          let message = `<strong>${data?.data.message}</strong>`;
          console.log(this);
          this.toaster(message);
          // alert("Profile picture updated successfully");
        } else {
          let message = `<strong>Error updating profile picture</strong>`;
          this.toaster(message);
        }
      },
    });
  }
  onSearch(e) {
    let search_content = $(this).val().toLowerCase();

    $("#sal-my-course .sal-course-wrapper").filter(function () {
      $(this).toggle(
        $(this)
          .find(".sal-course-title")
          .text()
          .toLowerCase()
          .indexOf(search_content) > -1
      );
    });
  }
  addToCart(e) {
    e.preventDefault();
    console.log(e.target.getAttribute("data-product_id"));
    let product_id = e.target.getAttribute("data-product_id");
    let course_title = e.target.getAttribute("data-course-title");
    $.ajax({
      url: pluginData.ajax_url,
      type: "POST",
      data: {
        action: "sa_learners_add_to_cart",
        product_id: product_id,
      },
      beforeSend: () => {
        $(`.sa-cart-btn_${product_id}`).css("pointer-events", "none");
      },

      success: (data) => {
        $(`.sa-cart-btn_${product_id}`).css("display", "none");
        $(`.sa-gotoCart-btn_${product_id}`).css("display", "inline-block");
        let alert_html = `<strong>${course_title}</strong> course has been added to your cart.`;
        this.toaster(alert_html);

        // redirect to cart page
        window.open(data.data.redirect_url, "_blank");
      },
    });
  }
  onStartCourse(e) {
    e.preventDefault();
    let course_id = e.target.dataset.courseId;
    let user_id = e.target.dataset.userId;
    console.log(course_id, user_id);
    $.ajax({
      url: pluginData.ajax_url,
      type: "POST",
      data: {
        action: "sa_learners_start_course",
        course_id: course_id,
        user_id: user_id,
      },
      beforeSend: () => {
        // hide start course button after click on it and show loader  icon
        $(`#start-course-btn-${course_id}`).css("display", "none");

        // show loader icon
        $(`#start-course-loader-${course_id}`).css("display", "inline-block");
      },
      success: (data) => {
        // redirect to course status page with new tab after success

        if (data.success) {
          window.open(data.data.redirect_url, "_blank");
        }
        // hide loader icon
        $(`#start-course-loader-${course_id}`).css("display", "none");
        // show start course button after click on it and hide loader  icon
        $(`#start-course-btn-${course_id}`).css("display", "inline-block");
      },
      error: (data) => {
        let message = `<strong>${data.data.message}</strong>`;
        this.toaster(message);
        // hide loader icon
        $(`#start-course-loader-${course_id}`).css("display", "none");
        // show start course button after click on it and hide loader  icon
        $(`#start-course-btn-${course_id}`).css("display", "inline-block");
      },
    });
  }
}
new Learners();
