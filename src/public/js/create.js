/******/ (() => { // webpackBootstrap
/*!********************************!*\
  !*** ./resources/js/create.js ***!
  \********************************/
document.addEventListener('DOMContentLoaded', function () {
  var imageInput = document.getElementById('image-input');
  var imagePreview = document.getElementById('image-preview');
  imageInput.addEventListener('change', function () {
    var file = imageInput.files[0];
    if (!file) {
      return;
    }
    var imageUrl = URL.createObjectURL(file);
    imagePreview.src = imageUrl;
    imagePreview.style.display = 'block';
  });
});
/******/ })()
;