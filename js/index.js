$(document).ready(function() {
	scroll();
});

function scroll() 
{
	var marquee = $('div.marquee');
	marquee.each(function() {
	    var mar = $(this),indent = mar.width();
	    mar.marquee = function() {
	        indent--;
	        mar.css('text-indent',indent);
	        if (indent < -1 * mar.children('div.marquee-text').width()) {
	            indent = mar.width();
	        }
	    };
	    mar.data('interval',setInterval(mar.marquee,1000/60));
	});​
}