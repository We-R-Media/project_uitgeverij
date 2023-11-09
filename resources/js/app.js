import './bootstrap';
import jQuery from 'jquery';
import select2 from 'Select2';

window.$ = jQuery;

$(document).ready(function() {
    select2(window, $);
    $('.select2').select2();
});

import Dropzone from "dropzone";
window.Dropzone = Dropzone;
