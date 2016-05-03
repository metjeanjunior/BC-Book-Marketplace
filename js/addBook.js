function fillForm()
{
	$.getJSON("../php/newIbsnCrawler.php?ibsn="+$("#book-ibsn").val(), 
	function(data)
	{
		$("#standby").html("Looking up ISBN...Please wait...")
		if (data.totalItems >= 1 && verifyISBN() == true) {
			setTimeout(function() {
				$("#standby").html("Success! We found a bookmatch for the ISBN you provided!" + "<br>");		
				$("input[name=book-name]").val(data.items[0].volumeInfo.title);		
				$("textarea#description").val(data.items[0].volumeInfo.description);	
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

function verifyISBN() {
	var ISBN = document.getElementById("book-ibsn").value;
	return (ISBN.length == 10 || ISBN.length == 13);	
}