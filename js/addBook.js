function fillForm()
{
	$.getJSON("../php/newIbsnCrawler.php?ibsn="+$("#book-ibsn").val(), 
	function(data)
	{
		$("#standby").html("Looking up ISBN...Please wait...")
		if (data.totalItems >= 1) {
			setTimeout(function() {
				$("#standby").html(data.items[0].volumeInfo.title + "<br>");		
				$("#standby").append(data.items[0].volumeInfo.description + "<br>");
				$("input[name=book-name]").val(data.items[0].volumeInfo.title);			
			}, 0);

			// $.each(data, function(i,info)
			// {
			// 	$("body").append(data.kind);
			// 	$("body").append("this is a test");
			// });
		}
		else {
			$("#standby").append("The ISBN number you typed is either invalid or has not been assigned yet. Please try again. <br>")
		}
	});
}