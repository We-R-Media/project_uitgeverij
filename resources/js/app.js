import './bootstrap';
import jQuery from 'jquery';
import select2 from 'select2';
import Dropzone from "dropzone";
// import AirDatepicker from 'air-datepicker';
// import localeNL from 'air-datepicker/locale/nl';

window.$ = jQuery;
window.Dropzone = Dropzone;

$(document).ready(function() {
    if( $('.select2') ) {
        select2(window, $);
        $('.select2').select2();
    }
    // new AirDatepicker('.field__date', {
    //     locale: localeNL,
    //     dateFormat: 'dd-M-yyyy', // Set the date format

    // });
});


// 'format' => 'd-m-Y H:i:s',
