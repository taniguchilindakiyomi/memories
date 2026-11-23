/******/ (() => { // webpackBootstrap
/*!******************************!*\
  !*** ./resources/js/edit.js ***!
  \******************************/
document.addEventListener('DOMContentLoaded', function () {
  // 日付変更用
  var dateButton = document.getElementById('date-button');
  var dateInput = document.getElementById('date-input');
  dateButton.addEventListener('click', function () {
    if (typeof dateInput.showPicker === 'function') {
      dateInput.showPicker();
    } else {
      dateInput.click();
    }
  });
  dateInput.addEventListener('change', function () {
    dateButton.textContent = dateInput.value;
  });

  // 画像プレビュー用
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