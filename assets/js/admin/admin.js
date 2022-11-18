jQuery(document).ready(function ($) {
  $("#recomended_courses").select2({
    placeholder: "Select Recomended Courses",
    width: "80%",
    margin: "0 auto",
  });

  $("#sal_banner_image").on("click", function () {
    if (image) {
      image.open();
      return false;
    }
    var image = wp.media({
      title: "Upload Image",
      multiple: false,
    });

    image.on("select", function (e) {
      var uploaded_image = image.state().get("selection").first().toJSON();
      var thumbnail = uploaded_image.sizes.thumbnail.url;
      var image_url = uploaded_image.url;
      $("#sal_banner_image_url").val(thumbnail);
      $("#sal_banner_image_id").val(uploaded_image.id);
      $("#sa_banner_image_show").html(`<img src="${thumbnail}"  />`);
    });

    image.open();

    return false;
  });
  $("#sal_dashboard_logo").on("click", function () {
    if (logo) {
      logo.open();
      return false;
    }
    var logo = wp.media({
      title: "Upload Image",
      multiple: false,
    });

    logo.on("select", function (e) {
      var uploaded_image = logo.state().get("selection").first().toJSON();
      var thumbnail = uploaded_image.sizes.thumbnail.url;
      var image_url = uploaded_image.url;
      $("#sal_dashboard_logo_url").val(thumbnail);
      $("#sal_dashboard_logo_id").val(uploaded_image.id);
      $("#sal_dashboard_logo_show").html(`<img src="${thumbnail}"  />`);
    });

    logo.open();

    return false;
  });
});
