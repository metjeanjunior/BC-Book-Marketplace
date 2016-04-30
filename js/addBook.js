function fillForm()
{
	$.getJSON("../php/newIbsnCrawler.php?ibsn="+$("#book-ibsn").val(), 
	function(data)
	{
		$("body").append(data.kind);
		$("body").append(data.items.volumeInfo);
		// $.each(data, function(i,info)
		// {
		// 	$("body").append(data.kind);
		// 	$("body").append("this is a test");
		// });
	});
}