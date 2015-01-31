getAll();

changeBySelection();

function getAll() {
	$.ajax({
		url: "/user/adpost/findsegment/" + $("#catagory").val(),
		method: "POST",
		dataType: "html",
		data: "catagory=" + $("#catagory").val(),
		success: function(data) {
			$("#segment").html(data);

			$.ajax({
				url: "/user/adpost/findsubsegment/" + $("#segment").val(),
				method: "POST",
				dataType: "html",
				data: "catagory=" + $("#catagory").val(),
				success: function(data) {
					$("#subsegment").html(data);
				}
			});

			changeBySegment();
		}
	});
}

function changeBySelection() {
	$("#catagory").change(function(e) {
		if($(this).val() == 0) {
			$("#segment").html('<option value="0">--- Select Category first--- </option>');
			$("#subsegment").html('<option value="0">--- Select Segment first --- </option>');
		} else {
			getAll();
		}
	});
}

function changeBySegment() {
	$("#segment").change(function(e) {
		$.ajax({
			url: "/user/adpost/findsubsegment/" + $("#segment").val(),
			method: "POST",
			dataType: "html",
			data: "catagory=" + $("#catagory").val(),
			success: function(data) {
				$("#subsegment").html(data);
			}
		});
	});
}