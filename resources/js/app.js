import './bootstrap';

import jQuery from 'jquery';
window.$ = jQuery;

import select2 from 'Select2';
select2(window, $);
$('select').select2();

import swal from 'sweetalert2';
window.Swal = swal;
