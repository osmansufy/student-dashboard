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
    $(".sal-claim-reward").on("click", this.onClaimReward);
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
        $(`.sal_coupon_${coupon_id}`).html('<i class="fas fa-spinner"></i>');
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
        $("#sal_user_point_earned").html('<i class="fas fa-spinner"></i>');
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
        valueContainer.textContent = `${progressValue}`;
        progressBar.style.background = `conic-gradient(
                  #4d5bf9 ${progressValue * 3.6}deg,
                  #cadcff ${progressValue * 3.6}deg
                  )`;
        if (progressValue == progressEndValue || progressEndValue == 0) {
          clearInterval(progress);
        }
        progressValue++;
      }, speed);
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
      success: (data) => {
        // alert.slideLeft();
        console.log(data);
        $(`.sa-cart-btn_${product_id}`).css("display", "none");
        $(`.sa-gotoCart-btn_${product_id}`).css("display", "inline-block");
        let alert_html = `<strong>${course_title}</strong> course has been added to your cart.`;
        this.toaster(alert_html);
      },
    });
  }
}
new Learners();
