var multiple = $('.ads');

$('#toggle').click(function(e) {
	for (var i = 0; i < multiple.length; i++) {
		multiple[i].checked = $(this)[0].checked;
	};
});

$('button[name=delete]').click(function(e) {
	var con = confirm("Are you sure?");

	if(! con) {
		e.preventDefault();
	}
});

multiple.change(function(e) {
	if ($('.ads:checked').length == $('.ads').length) {
       $('#toggle')[0].checked = true;
    } else {
    	$('#toggle')[0].checked = false;
    }
});