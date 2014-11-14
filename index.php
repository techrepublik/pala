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
        <div id="space" class="row">
          <h1>Experience Fun and the Luxury of the House while at Palawan!</h1>
        </div> <!-- end space -->
        <br/><br/><br><hr/>
        <?php include("_/comp/accomodation.php"); ?><hr/>
        <?php include("_/comp/services.php"); ?><hr />
        <?php include("_/comp/tour.php"); ?><hr />
        <?php include("_/comp/location.php"); ?>
      </div>
    </section>

    <?php include("_/comp/footer.php") ?>

    
    <script type='text/javascript' src='_/js/jquery-1.11.0.js'></script>
    <script type='text/javascript' src='_/js/jquery-ui.min.js'></script>
    <script type='text/javascript' src='_/js/bootstrap.min.js'></script>
    <!-- custom.js -->
    <script type='text/javascript'>
      $('.thumbnail').on('click', function(e){
        e.preventDefault();
        var src = $(this).find('img').prop('src');
        $('#thumbnail-full').find('img').prop('src', src);
        $('#thumbnail-full').find('.modal-title').html($(this).find('img').prop('alt'));
        $('#thumbnail-full').modal('show');
      });

      $('#readmore4').find('button').click(function () {
        var src = $(this).find('img').prop('src');
        $('#thumbnail-full').find('img').prop('src', src);
        $('#thumbnail-full').find('.modal-title').html($(this).find('img').prop('alt'));
        $('#thumbnail-full').modal('show');
      });

      $('.jquery-ui-datepicker').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'd MM, yy'
      });

      $('.arrival').find('button').click(function () {
        $('#arrival').datepicker('show');
        });

        $('.departure').find('button').click(function () {
        $('#departure').datepicker('show');
        });

        $('#book_me').on('click', function(){
          if($('#arrival').val().length > 0 && $('#departure').val().length > 0){
            $('#booking').find('.modal-title').html($('#arrival').val() + ' - ' + $('#departure').val());
          }
          var double_max = parseInt($('.double_room_row').find('.remaining_rooms').html());
          $('.double_room_row').find('select').html('');
          for (i = 0; i <= double_max; i++) {
          $('.double_room_row').find('select').append($("<option />").val(i).text(i))
        }

          var double_room_val = ( parseInt($('#double_room').val()) > 0 ) ? parseInt($('#double_room').val()) : 0;
          $('#double_room_select').val(double_room_val);
          get_subtotal('.double_room_row');
          $('.double_room_row').find('select').on('change', function(){
            get_subtotal('.double_room_row');
          });

          var single_max = parseInt($('.single_room_row').find('.remaining_rooms').html());
          $('.single_room_row').find('select').html('');
          for (i = 0; i <= single_max; i++) {
          $('.single_room_row').find('select').append($("<option />").val(i).text(i))
        }

          var single_room_val = ( parseInt($('#single_room').val()) > 0 ) ? parseInt($('#single_room').val()) : 0;
          $('#single_room_select').val(single_room_val);
          get_subtotal('.single_room_row');
          $('.single_room_row').find('select').on('change', function(){
            get_subtotal('.single_room_row');
          });
        });

      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });

      function get_subtotal(row){
        var rate_per_room = parseFloat(removeCommas($(row).find('.rate').html()));
        var number_of_rooms = parseFloat($(row).find('select').val());
        var subtotal = rate_per_room * number_of_rooms;
        $(row).find('span.subtotal').html((subtotal % 1 != 0 ? addCommas(subtotal) : addCommas(subtotal.toFixed(2))));
        get_total();
      }

      function get_total(){
        var total = 0;
        $('span.subtotal').each(function(){
          total += ( parseFloat(removeCommas($(this).html())) > 0 ) ? parseFloat(removeCommas($(this).html())) : 0;
        });
        $('span.total').html((total % 1 != 0 ? addCommas(total) : addCommas(total.toFixed(2))));
      }

      function removeCommas(str) {
          return(str.replace(/,/g,''));
      }

      function addCommas(nStr){
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
          x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
      }

      //palawan tour transistion
      $(document).ready(function(){
        $("#city_tour").click(function(){
          $("#city_add").slideToggle("slow");
          //$("#city_pic").fadeToggle("slow");
           var caption = $("#city_tour").text();
          if (caption == "read more...")
            $("#city_tour").text("hide...");
          else
            $("#city_tour").text("read more..."); 
        });
      });
      $(document).ready(function(){
        $("#underground_btn").click(function(){
          $("#underground").slideToggle("slow");
           var caption = $("#underground_btn").text();
          if (caption == "read more...")
            $("#underground_btn").text("hide...");
          else
            $("#underground_btn").text("read more..."); 
        });
      });
      $(document).ready(function(){
        $("#honda_btn").click(function(){
          $("#honda").slideToggle("slow");
           var caption = $("#honda_btn").text();
          if (caption == "read more...")
            $("#honda_btn").text("hide...");
          else
            $("#honda_btn").text("read more..."); 
        });
      });
      $(document).ready(function(){
        $("#dolphin_btn").click(function(){
          $("#dolphin").slideToggle("slow");
           var caption = $("#dolphin_btn").text();
          if (caption == "read more...")
            $("#dolphin_btn").text("hide...");
          else
            $("#dolphin_btn").text("read more..."); 
        });
      });
    </script>
    <!-- end custom.js -->
  </body>
</html>