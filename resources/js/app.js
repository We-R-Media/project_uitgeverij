import './bootstrap';
import jQuery from 'jquery';
import select2 from 'select2';
import Dropzone from "dropzone";
import AirDatepicker from 'air-datepicker';

new AirDatepicker('#deactivated_at');

window.$ = jQuery;
window.Dropzone = Dropzone;

$(document).ready(function() {
    if( $('.select2') ) {
        select2(window, $);
        $('.select2').select2();
    }
});
