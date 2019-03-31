<?php

// EDUCATION

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DEMO</title>
  </head>
  <body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.2/parsley.min.js" type="text/javascript"></script>

    <form id="demo-form" action="" method="post" autocomplete="off">
      <?php include "greenhouse/schools.php" ?>
      <label for="name">School</label>
      <input name="name" id="name" list="school-list" oninput="onInput()" required="">
      <input type="submit" name="submit" value="Submit">
      <datalist id="school-list">
      </datalist>
    </form>


    <script type="text/javascript">
      var baseUrl = "https://boards-api.greenhouse.io/v1/boards/romeopower/education/schools";
      var selectedSchoolId = "";

      $(function () {
        $('#demo-form').parsley().on('field:validated', function() {
          var ok = $('.parsley-error').length === 0;
          $('.bs-callout-info').toggleClass('hidden', !ok);
          $('.bs-callout-warning').toggleClass('hidden', ok);
        })
        .on('form:submit', function() {
          console.log("School ID:", selectedSchoolId);
          return false; // Don't submit form for this demo
        });
      });

      // This is to check if any item was selected and to store its id if any.
      function isSelected() {
        var term = $('#name').val();
        var options = document.getElementById('school-list').children;
        for(var i=0; i<options.length; i++) {
          if (options[i].value === term) {
            selectedSchoolId = options[i].dataset.id;
            $('#school-list').empty();
            return true;
          }
        }
        selectedSchoolId = "";
        return false;
      }

      // This function is triggered by user's input and selection from list.
      // If it is input we pull school list from api and fill list. If it is selection from list, we store item id and don't call api.
      function onInput() {
        window.setTimeout(() => {
          if (isSelected()) {
            return;
          }
          
          var term = $('#name').val();
          if (term.length > 3) {
            $.get(baseUrl + "?term=" + term, function(data) {
              $('#school-list').empty();
              var items = data.items;
              var lenLimit = 20;
              var length = (items.length > lenLimit) ? lenLimit : items.length;
              for (var i=0; i<length; i++) {
                var optionNode = document.createElement("option");
                optionNode.value = items[i].text;
                optionNode.dataset.id = items[i].id;
                $('#school-list').append(optionNode);
              }
            });
          }
        }, 1);
      }
    </script>

  </body>
</html>
