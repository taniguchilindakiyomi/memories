document.addEventListener('DOMContentLoaded', function () {

    // 日付変更用
    const dateButton = document.getElementById('date-button');
    const dateInput = document.getElementById('date-input');

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
    const imageInput = document.getElementById('image-input');
    const imagePreview = document.getElementById('image-preview');

    imageInput.addEventListener('change', function () {

        const file = imageInput.files[0];

        if (!file) {
            return;
        }

        const imageUrl = URL.createObjectURL(file);

        imagePreview.src = imageUrl;
        imagePreview.style.display = 'block';

    });

});