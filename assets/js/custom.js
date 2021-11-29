$(".btn-expand-collapse").click(function (e) {
  $(".navbar-primary").toggleClass("collapsed");
});

// percentage
(function () {
  window.onload = function () {
    // var totalProgress, progress;
    // const circles = document.querySelectorAll(".progress_bar");
    // for (var i = 0; i < circles.length; i++) {
    //   totalProgress = circles[i]
    //     .querySelector("circle")
    //     .getAttribute("stroke-dasharray");
    //   progress = circles[i].parentElement.getAttribute("data-percent");
    //   circles[i].querySelector(".bar").style["stroke-dashoffset"] =
    //     (totalProgress * progress) / 100;
    // }
  };
})();

function simple_ajax_call() {
  let $ = jQuery;
  let name = prompt("What is your Name?");
  $.post(
    pluginData.ajax_url,
    { action: "sa_learners_simple", data: name },
    function (data) {
      console.log(data);
    }
  );
}

$(document).ready(function () {
  // filter content with search hide parent
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
  $("#txtSearch").keyup(function () {
    var search_content = $(this).val();

    $("#sal-my-course .sal-course-wrapper").filter(function () {
      $(this).toggle(
        $(this)
          .find(".sal-course-title")
          .text()
          .toLowerCase()
          .indexOf(search_content) > -1
      );
    });
  });
  // percentage

  // add to cart product on woocommerce with ajax
  var alert = $(".alert-container");
  alert.hide();
  // toaster function
  function toaster(message) {
    alert.animate({
      width: "toggle",
    });
    $(".sa-alert-text").html(message);
    window.setTimeout(function () {
      alert.animate({
        width: "toggle",
      });
      // alert.slideRight();
    }, 3000);
  }
  $(".sal_add_to_cart_button").click(function (e) {
    e.preventDefault();

    // alert.hide();
    let $ = jQuery;
    let product_id = $(this).attr("data-product_id");
    let course_title = $(this).attr("data-course-title");
    $.ajax({
      url: pluginData.ajax_url,
      type: "POST",
      data: {
        action: "sa_learners_add_to_cart",
        product_id: product_id,
      },
      success: function (data) {
        // alert.slideLeft();
        $(`.sa-cart-btn_${product_id}`).css("display", "none");
        $(`.sa-gotoCart-btn_${product_id}`).css("display", "inline-block");
        let alert_html = `<strong>${course_title}</strong> course has been added to your cart.`;
        toaster(alert_html);
      },
    });
  });

  // update user profile picture on change
  let profile_picture;
  $("#sal_profile_picture").change(function () {
    profile_picture = this.files[0];
    let fileType = profile_picture?.type;
    let fileSize = profile_picture?.size;
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
    reader.readAsDataURL(profile_picture);
  });
  // update user profile picture on submit form
  $("#sal_user_form").submit(function (e) {
    e.preventDefault();
    // let profile_picture = $("#sal_profile_picture").files[0];
    let formData = new FormData(this);
    formData.append("action", "sa_learners_update_profile_picture");
    formData.append("profile_picture", profile_picture);
    let user_profile_picture_nonce = $("#user_profile_picture_nonce").val();
    formData.append("nonce", user_profile_picture_nonce);
    $.ajax({
      url: pluginData.ajax_url,
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (data) {
        console.log(data);
        if (data.success) {
          $(".upload_image_preview_img").attr("src", data.url);
          let message = `<strong>${data?.data.message}</strong>`;
          toaster(message);
          // alert("Profile picture updated successfully");
        } else {
          let message = `<strong>Error updating profile picture</strong>`;
          toaster(message);
        }
      },
    });
  });
  // remove course from wishlist
  $(".sal-remove-wishlist").click(function (e) {
    e.preventDefault();

    let course_id = $(this).attr("data-course_id");
    let user_id = $(this).attr("data-user_id");
    // let nonce = $(this).attr("data-nonce");
    $.ajax({
      url: pluginData.ajax_url,
      type: "POST",
      data: {
        action: "sa_learners_remove_wishlist",
        course_id: course_id,
        user_id: user_id,
        // nonce: nonce,
      },
      success: function (data) {
        console.log(data);
        if (data.success) {
          // $(`.sal-wishlist-btn_${course_id}`).css("display", "inline-block");
          // $(`.sal-remove-wishlist_${course_id}`).css("display", "none");
          let message = `<strong>${data?.data.message}</strong>`;
          $(`sal-save-course-wrap_${course_id}`).css("display", "none");
          toaster(message);
          console.log($(`sal-save-course-wrap_${course_id}`));
        } else {
          toaster("<strong>Error removing course from wishlist</strong>");
        }
      },
    });
  });

  // user password change with ajax input validation
  $("form#sal_user_pass_from").submit(function (e) {
    e.preventDefault();

    let old_password = $("#sal_old_password").val();
    // $user_id = $("#sal_user_id").val();
    $user_email = $("#sal_user_email").val();
    let new_password = $("#sal_new_password").val();
    let confirm_password = $("#sal_confirm_password").val();
    let nonce = $("#sal_user").val();

    if (old_password == "") {
      let message = `<strong>Current Password is required</strong>`;
      toaster(message);
      return false;
    }
    if (new_password == "") {
      let message = `<strong>New Password is required</strong>`;
      toaster(message);
      return false;
    }
    if (confirm_password == "") {
      let message = `<strong>Confirm Password is required</strong>`;
      toaster(message);
      return false;
    }
    if (new_password != confirm_password) {
      let message = `<strong>New password and confirm password does not match</strong>`;
      toaster(message);
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
        user_email: $user_email,
        sal_nonce: nonce,
      },
      success: function (data) {
        console.log(data);
        if (data.success) {
          // alert("Password updated successfully");
          let message = `<strong>Password updated successfully</strong>`;
          toaster(message);
        } else {
          let message = `<strong>${data?.data.message}</strong>`;
          toaster(message);
        }
      },
      // error: function (data) {
      //   let message = `<strong>${data.data.message}</strong>`;
      //   toaster(message);
      //   console.log(data);
      // },
    });
  });
  // When the page first loads
  $("form.sa-learners-edit-user").on("submit", function (e) {
    e.preventDefault();
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
      success: function (data) {
        console.log(data);
        let message = `<h4 class="text-danger">${data.data.message}</h4`;
        // $("#sa-loading-state").hide();
        // $("#sa-data-div").html(message); // Replace the div with the retrieved data
        toaster(message);
      },
      error: function (errorThrown) {
        console.log(errorThrown);
      },
    });
  });
});
// owl sir

jQuery(".owl-carousel").owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  dots: false,
  navText: [
    "<i class='fas fa-chevron-left'></i>",
    "<i class='fas fa-chevron-right'></i>",
  ],
  responsive: {
    0: {
      items: 0,
    },
    700: {
      items: 2,
    },
    1000: {
      items: 3,
    },
  },
});
