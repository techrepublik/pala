// custom.js --
$(document).ready(function(){
  $('.toggle-show').click(function(){
    console.log('adfsdf');
  });
  console.log('Loded');
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
  $('.toggle-show').click(function(){
    console.log('Hey');
    var to_show = $(this).closest('.tour-package').find('.to-show');
    to_show.slideToggle('slow');
    var caption = $(this).text();
    if (caption == 'read more...'){
      $(this).text('hide...');
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

  