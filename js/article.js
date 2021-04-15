'use strict';

function addToCart(e) {

  e.preventDefault();
  const id = $('#id').val();
  const quantity = $('#quantity').val();

  $.ajax({
    type: "POST",
    url: "article.php",
    data: {
      id: id,
      quantity: quantity
    },
    success: function() {
      $('#popup').removeClass("hidden");

      setTimeout(function(){
        $('#popup').addClass("hidden");
      }, 1500);
    }
  });

};

$(document).ready(function() {

  $('#submit').on('click', addToCart);

});
