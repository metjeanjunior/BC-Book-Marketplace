function fillForm()
{
	$.getJSON("../php/newIbsnCrawler.php?ibsn="+$("#book-ibsn").val(), 
	function(data)
	{
		if (data.totalItems >= 1 && verifyISBN() == true) {
			setTimeout(function() {
				var res = "\
					<div class=\"alert alert-success fade in\">\
					    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\
					    <strong>Sucess!</strong>\
					    We found a bookmatch for the ISBN you provided!\
					</div>";
				$("#standby").html(res);		
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
			var res ="\
				<div class=\"alert alert-danger fade in\">\
				    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\
				    <strong>Sorry :(</strong>\
				    The ISBN number you typed is either invalid or has not been assigned yet. Please try again.\
				</div>";
			$("#standby").append(res);
		}
	});
}

function verifyISBN() {
	var ISBN = document.getElementById("book-ibsn").value;
	return (ISBN.length == 10 || ISBN.length == 13);	
}