// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 2; // min caracters to display the autocomplete
	var keyword = $('#user_id').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#user_list_id').show();
				$('#user_list_id').html(data);
			}
		});
	} else {
		$('#user_list_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#user_id').val(item);
	// hide proposition list
	$('#user_list_id').hide();
}