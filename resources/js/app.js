import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

import 'bootstrap';
import './bootstrap';

import '@fortawesome/fontawesome-free/js/all.min.js';
// import Popper from 'popper.js';

import './theme';



$(document).on({
    ajaxStart: function () {
        $('#spinner-div').show();
    },
    ajaxStop: function () {
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