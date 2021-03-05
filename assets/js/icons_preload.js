var images = [
  "/assets/media/images/logo.png",
  "/assets/media/images/mail_icon.png"
];
$(images).each(function() {
  var image = $('<img />').attr('src', this);
});