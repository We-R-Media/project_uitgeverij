/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/maps.js ***!
  \******************************/
// maps.js

function initMap() {
  // Initialize the map
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {
      lat: -34.397,
      lng: 150.644
    },
    zoom: 8
  });

  // Add a marker
  var marker = new google.maps.Marker({
    position: {
      lat: -34.397,
      lng: 150.644
    },
    map: map,
    title: 'Marker Title'
  });
}
/******/ })()
;