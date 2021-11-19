$(".btn-expand-collapse").click(function (e) {
  $(".navbar-primary").toggleClass("collapsed");
});

// percentage
(function () {
  window.onload = function () {
    var totalProgress, progress;
    const circles = document.querySelectorAll(".progress_bar");
    for (var i = 0; i < circles.length; i++) {
      totalProgress = circles[i]
        .querySelector("circle")
        .getAttribute("stroke-dasharray");
      progress = circles[i].parentElement.getAttribute("data-percent");

      circles[i].querySelector(".bar").style["stroke-dashoffset"] =
        (totalProgress * progress) / 100;
    }
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
      },
      beforeSend: function () {
        // $("#sa-loading-state").style.display = "block";
        // $("#sa-user-update-btn").style.display = "none";
      },
      success: function (data) {
        console.log(data);
        let message = `<h4 class="text-danger">${data.data.message}</h4`;
        // $("#sa-loading-state").hide();
        $("#sa-data-div").html(message); // Replace the div with the retrieved data
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
