jQuery(function ($) {
  "use strict";

  var allPopup = $(".k-pop");
  var loginPopup = $(".k-pop--login");
  var loginPopper = $(".k-popper-login a");
  var closePopup = $(".k-pop--closer");

  loginPopper.click(function () {
    if (allPopup.hasClass("visible")) {
      allPopup.removeClass("visible");
      allPopup.fadeOut(200);
      loginPopup.fadeIn(300);
      loginPopup.addClass("visible");
    } else {
      loginPopup.fadeIn(300);
      loginPopup.addClass("visible");
    }
  });

  closePopup.click(function () {
    allPopup.removeClass("visible");
    allPopup.fadeOut(200);
  });
});
