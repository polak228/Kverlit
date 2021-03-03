var images = [
  "/assets/media/images/logo.png"
];
$(images).each(function() {
  var image = $('<img />').attr('src', this);
});