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

function submit(e) {

  e.preventDefault();
  const title = $('#title').val();
  const content = $('#content').val();
  const art_id = $('#art_id').val();

  if (title != "" && content != "") {

    $.ajax({
      type: "POST",
      url: "comment.php",
      data: {
        art_id: art_id,
        title: title,
        content: content
      },
      success: function() {
        location.reload();
      }
    });

  } else {
    alert("Erreur : Merci de remplir tout les champs avant de poster un commentaire.");
  };
};

$(document).ready(function() {

  $('#submit').on('click', addToCart);
  $('#commentSubmit').on('click', submit);

});
