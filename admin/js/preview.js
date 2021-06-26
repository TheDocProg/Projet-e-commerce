'use strict';

function previewImg() {
  let preview = document.querySelector('#preview');
  let file = document.querySelector('input[type=file]').files[0];
  let reader = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
};

document.addEventListener('DOMContentLoaded', function()
{
  let download = document.querySelector('input[type=file]');
  download.addEventListener("change", previewImg);
});
