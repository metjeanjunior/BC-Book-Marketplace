function fillForm()
{
	$.getJSON("../php/newIbsnCrawler.php?ibsn="+$("#book-ibsn").val(), 
	function(data)
	{
		$("body").append(data.items[0].volumeInfo.title + "<br>");		
		$("body").append(data.totalItems);
		// $.each(data, function(i,info)
		// {
		// 	$("body").append(data.kind);
		// 	$("body").append("this is a test");
		// });
	});
}