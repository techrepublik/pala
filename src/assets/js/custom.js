// custom.js --
$(document).ready(function(){

    $('#print_now').on('click', function(){
        $('#printable').show().printElement();
    });

  $('select[name^="room_reservations"]').on('change', function(){
        console.log('Test');
        get_subtotal($(this).closest('.main_row'));
        get_total();
        var toggle = false;
        $('select[name^="room_reservations"]').each(function(){
            if($(this).val() != 0){
               toggle = true;
            }
        });
        if(toggle){
           $('#reserve').prop('disabled', false);
        } else {
           $('#reserve').prop('disabled', 'disabled');
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
      $('#total_amount').val(total);
    }

  $('.toggle-show').click(function(){
    console.log('adfsdf');
  });

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
  var currentDate = new Date();
  $('#arrival').datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'd MM, yy',
    minDate: currentDate,
    setDate: currentDate,
    onSelect: function (date) {
        var date2 = $('#arrival').datepicker('getDate');
        date2.setDate(date2.getDate() + 1);
        $('#departure').datepicker('setDate', date2);
        //sets minDate to dt1 date + 1
        $('#departure').datepicker('option', 'minDate', date2);
    }
  });

  $('#departure').datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'd MM, yy',
    minDate: currentDate,
    onClose: function () {
        var dt1 = $('#arrival').datepicker('getDate');
        var dt2 = $('#departure').datepicker('getDate');
        //check to prevent a user from entering a date below date of dt1
        if (dt2 <= dt1) {
            var minDate = $('#departure').datepicker('option', 'minDate');
            $('#departure').datepicker('setDate', minDate);
        }
    }
  });

  $('.arrival').find('button').click(function () {
    $('#arrival').datepicker('show');
  });

  $('.departure').find('button').click(function () {
    $('#departure').datepicker('show');
  });

  $('#carousel-form').on('submit', function(){
    if($('#arrival').val().length > 0 && $('#departure').val().length > 0 && new Date($('#arrival').val()) < new Date($('#departure').val())){
      $('#booking').modal('show');
      $('#booking').find('.modal-title').html($('#arrival').val() + ' - ' + $('#departure').val());
    }
  });

  //
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

  $('#booking').find('button').on('click', function(){

  });

  $('.toggle-show').click(function(){
    console.log('Hey');
    var to_show = $(this).closest('.tour-package').find('.to-show');
    to_show.slideToggle('slow');
    var caption = $(this).text();
    if (caption == 'read more...'){
      $(this).text('hide details...');
    } else {
      $(this).text('read more...'); 
    }
  });
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
//<!-- end custom.js -->

  