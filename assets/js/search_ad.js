function searchSegment() {
    if($("#catagory").val() == 0) {
        hideSegment();
        hideSubsegment();
    } else {
        showSegment();

        $.ajax({
            url: '/ads/findsegment/'+$("#catagory").val(),
            type: 'POST',
            dataType: 'html',
            data: "catagory=" + $("#catagory").val(),
            success: function (data) {
                $("#segment").html(data);

                $.ajax({
                    url: '/ads/findsubsegment/'+$("#segment").val(),
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
}

searchSegment();

$("#catagory").change(function(e) {
    if ($(this).val() == 0) {
        hideSegment();
        hideSubsegment();
    } else{
        showSegment();
        searchSegment();
    }
});

$("#segment").change(function(event) {
	if ($(this).val() == 0) {
		hideSubsegment();
	} else{
        showSubsegment();
		$.ajax({
			url: '/ads/findsubsegment/'+$(this).val(),
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
    if($("#district").val() == 0) {
        hideThana();
    } else {
        showThana();

        $.ajax({
            url: '/ads/findthana/'+$("#district").val(),
            type: 'POST',
            dataType: 'html',
            data: "district=" + $("#district").val(),
            success: function (data) {
                $("#thana").html(data);
            }
        });
    }
}

function hideSegment() {
    $("#segment_div").hide();
}

function showSegment() {
    $("#segment_div").show();
}

function hideSubsegment() {
    $("#subsegment_div").hide();
}

function showSubsegment() {
    $("#subsegment_div").show();
}

function hideThana() {
    $("#thana").hide();
    $("label[for=thana]").hide();
}

function showThana() {
    $("#thana").show();
    $("label[for=thana]").show();
}

searchDistrict();

$("#district").change(function(e) {
	searchDistrict();
});