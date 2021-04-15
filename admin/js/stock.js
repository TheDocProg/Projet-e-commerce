'use strict';

function updateStock(e)
{
  let target = e.target;
  let id = target.value;
  let name = '#stock' + id;
  let stock = $(name).val();

  $.ajax({
    type: "POST",
    url: "stock.php",
    data: {
            id: id,
            stock: stock
          }
  });
  location.reload();
};

function eventListener(list)
{
  if(list.length > 1)
  {
    for(let i = 0; i < list.length; i++) {
      let j = "#submit" + i;
      $(j).on('click', updateStock);
    };
  } else {
    $("#submit0").on('click', updateStock);
  }
};


$(document).ready(function() {

  const list = document.querySelectorAll('#count');

  if (list.length > 0)
  {

    eventListener(list);

  };

});
