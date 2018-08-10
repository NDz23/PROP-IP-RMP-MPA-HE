$('.form').find('input, textarea, select').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});
$('.form').ready(function() {
    // No selection at start
    $('#my_select').prop("selectedIndex", -1);

    // Set the position of the overlay
    var offset = $('#my_select').offset();
    offset.top += 3;
    offset.left += 3;
    $('#default_message_overlay').offset(offset);

    // Remove the overlay when selection changes
    $('#my_select').change(function() {
        if ($(this).prop("selectedIndex") != -1) {
            $('#default_message_overlay').hide();
        }
    });
});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});