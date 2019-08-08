<script>
$(function(){
	var defaultOption = '<option value=""> ------- เลือก ------ </option>';
	var loadingImage  = '<img src="tools/images/loading4.gif" alt="loading" />';
	// Bind an event handler to the "change" JavaScript event, or trigger that event on an element.
	$('#selProvince').change(function() {
		$("#selDistricts").html(defaultOption);
		$("#selSubdistricts").html(defaultOption);
		// Perform an asynchronous HTTP (Ajax) request.
		$.ajax({
			// A string containing the URL to which the request is sent.
			url: "jsonActionFromddd.php",
			// Data to be sent to the server.
			data: ({ nextList : 'districts', provinces_id: $('#selProvince').val() }),
			// The type of data that you're expecting back from the server.
			dataType: "json",
			// beforeSend is called before the request is sent
			beforeSend: function() {
				$("#waitDistricts").html(loadingImage);
			},
			// success is called if the request succeeds.
			success: function(json){
				$("#waitDistricts").html("");
				// Iterate over a jQuery object, executing a function for each matched element.
				$.each(json, function(index, value) {
					// Insert content, specified by the parameter, to the end of each element
					// in the set of matched elements.
					 $("#selDistricts").append('<option value="' + value.districts_id + '">' + value.districts_name + '</option>');
				});
			}
		});
	});
	
	$('#selDistricts').change(function() {
		$("#selSubdistricts").html(defaultOption);
		$.ajax({
			url: "jsonActionFromddd.php",
			data: ({ nextList : 'subdistricts', districts_id: $('#selDistricts').val() }),
			dataType: "json",
			beforeSend: function() {
				$("#waitSubdistricts").html(loadingImage);
			},
			success: function(json){
				$("#waitSubdistricts").html("");
				$.each(json, function(index, value) {
					 $("#selSubdistricts").append('<option value="' + value.subdistricts_id + '">' + value.subdistricts_name + '</option>');
				});
			}
		});
	});
});
</script>   