'use strict';

 function agree(e)
 {
   e.preventDefault();

   $.ajax({
     type: "GET",
     url: "index.php",
     data: 'cookie=' + "yes",
     success: function() {
       $('#cookie').addClass("hidden");
     }
   });
 };

 function disagree(e)
 {
   e.preventDefault();

   $.ajax({
     type: "GET",
     url: "index.php",
     data: 'cookie=' + "no",
     success: function() {
       $('#cookie').addClass("hidden");
     }
   });
 };

 $(document).ready(function() {

   $('#agree').on('click', agree);
   $('#disagree').on('click', disagree);

 });
