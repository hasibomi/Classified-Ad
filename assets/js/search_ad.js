function searchSegment() {
	$.ajax({
		url: 'ads/findsegment/'+$("#catagory").val(),
		type: 'POST',
		dataType: 'html',
		data: "catagory=" + $("#catagory").val(),
		success: function (data) {
			$("#segment").html(data);

			$.ajax({
				url: 'ads/findsubsegment/'+$("#segment").val(),
				type: 'POST',
				dataType: 'html',
				data: "segment=" + $("#segment").val(),
				success: function(data) {
					$("#subsegment").html(data);
				}
			});
		}
	});
}

searchSegment();

$("#catagory").change(function(e) {
	if ($(this).val() == 0) {
		$("#segment").html("Nothing");
	} else{
		searchSegment();
	}
});

$("#segment").change(function(event) {
	if ($(this).val() == 0) {
		$("#subsegment").html("Nothing");
	} else{
		$.ajax({
			url: 'ads/findsubsegment/'+$(this).val(),
			type: 'POST',
			dataType: 'html',
			data: "segment=" + $(this).val(),
			success: function (data) {
				$("#subsegment").html(data);
			}
		});
	}
});

function searchDistrict() {
	$.ajax({
		url: 'ads/findthana/'+$("#district").val(),
		type: 'POST',
		dataType: 'html',
		data: "district=" + $("#district").val(),
		success: function (data) {
			$("#thana").html(data);
		}
	});
}

searchDistrict();

$("#district").change(function(e) {
	searchDistrict();
});