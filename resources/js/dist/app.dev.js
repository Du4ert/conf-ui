"use strict";

var _jquery = _interopRequireDefault(require("jquery"));

require("bootstrap");

require("./bootstrap");

require("@fortawesome/fontawesome-free/js/all.min.js");

require("./theme");

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

window.$ = window.jQuery = _jquery["default"];
$(document).on({
  ajaxStart: function ajaxStart() {
    $('#spinner-div').show();
  },
  ajaxStop: function ajaxStop() {
    $('#spinner-div').hide();
  }
});
$('body').on('hidden.bs.modal', '.modal', function () {
  $(this).find('form')[0].reset();
  $(this).find('input[type="text"],input[type="email"],textarea,select').each(function () {
    if (this.defaultValue != '' || this.value != this.defaultValue) {
      this.value = this.defaultValue;
    } else {
      this.value = '';
    }
  });
});