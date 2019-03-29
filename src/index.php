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

    <form id="demo-form" action="" method="post">

      <?php include "greenhouse/schools.php" ?>

      <input type="submit" name="submit" value="Submit">

    </form>


    <script type="text/javascript">
    $(function () {
      $('#demo-form').parsley().on('field:validated', function() {
        var ok = $('.parsley-error').length === 0;
        $('.bs-callout-info').toggleClass('hidden', !ok);
        $('.bs-callout-warning').toggleClass('hidden', ok);
      })
      .on('form:submit', function() {

        console.log("LOG THE VALUE OF THE SEARCH FIELD HERE.");

        return false; // Don't submit form for this demo
      });
    });
    </script>

  </body>
</html>
