'use strict';

function confirm(e)
{
  $('#confirm').removeClass("hidden");

  $('#no').on('click', function() {
    $('#confirm').addClass("hidden");
  });

};

$(document).ready(function() {

  $('#delete').on('click', confirm);

});
