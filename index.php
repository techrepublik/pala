<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Julieta's Pension House - Home</title>

    <link rel="stylesheet" type="text/css" href="_/css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="_/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="_/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="_/css/custom.css">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="home" class="body-bg">
    <?php include("_/comp/nav.php"); ?>
    <section class="text-center">
      <header class="container">
        <?php include("_/comp/mainnav.php"); ?>
      </header>
      <?php include("_/comp/carousel.php"); ?>

      <div class="container" style="margin-top: 20px">
        <div id="accomodation" class="row">
          <h1>Experience <strong class="font-color-gn">Fun</strong> and the <strong class="font-color-gn">Luxury</strong> of the House while in <strong class="font-color-gn">Palawan!</strong></h1>
        </div> <!-- end space -->
        <br>
        <?php include("page/accomodation.php"); ?>
        <div class="hr compact"></div>
        <?php include("page/services.php"); ?>
        <div class="hr compact"></div>
        <?php include("page/tour.php"); ?>
        <div class="hr compact"></div>
        <?php include("page/location.php"); ?>
      </div>
    </section>
    <?php include("page/thumb_modal.php"); ?>
    <?php include("page/booking_modal.php"); ?>
    <?php include("_/comp/footer.php"); ?>

    <script type='text/javascript' src='_/js/jquery-1.11.0.js'></script>
    <script type='text/javascript' src='_/js/jquery-ui.min.js'></script>
    <script type='text/javascript' src='_/js/bootstrap.min.js'></script>
    <script type='text/javascript' src='_/js/custom.js'></script>
  </body>
</html>