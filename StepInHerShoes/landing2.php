<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
        body, html {
          height: 100%;
          margin: 0;
        }

        .bg-image {
          background-image: url("coverpage.png");
          height: 100%; 
          background-position: center;
          background-repeat: no-repeat;
          background-size: 1535px 763px;
        }
      </style>
  </head>
  <body>
    <div class="bg-image"></div>
    <?php 
      header("refresh:2.5;url=register.php");
    ?>
  </body>
  <!-- <script>
    window.setTimeout(function(){
        // Move to a new location or you can do something else
        window.location.href = "register.php";
    }, 2000);
  </script> -->
</html>
