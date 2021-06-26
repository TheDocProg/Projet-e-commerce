'use strict';

function deleteArticle(e)
{
  let target = e.target;
  let id = target.value;

  $.ajax({
    type: "GET",
    url: "cart.php",
    data: "id=" + id
  });
  location.reload();
};

function calcCart()
 {
   let result = 0;

   if(total_article.length > 1)
   {
     for (let i = 0; i < total_article.length; i++) {
       result += parseFloat(total_article[i].textContent);
     };
   } else {
     result = total_article.textContent;
   };

   sous_total.textContent = parseFloat(result).toFixed(2) + '€';
};

function eventListener()
{
  if(total_article.length > 1)
  {
    for(let i = 0; i < total_article.length; i++) {
      let j = "#delete" + i;
      $(j).on('click', deleteArticle);
    };
  } else {
    $("#delete0").on('click', deleteArticle);
  }
};

$(document).ready(function() {

  const total_article = document.querySelectorAll('#total_article');

  if (total_article.length > 0)
  {
    let sous_total = $('#sous_total');
    let total = $('#total');

    calcCart();
    eventListener();

    for(let i = 0; i < total_article.length; i++)
    {
      let j = $("#stock" + i).val();

      if(j == 0)
      {
        $("#delete" + i).click();
      };
    };

  };

});
