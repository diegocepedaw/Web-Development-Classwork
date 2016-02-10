	$(function() {
    $( "#menu" ).menu();
	});
	
	$.getJSON("menuItems.json", function(result){
		$.each(result.files, function(i, item){
			li = "<li id ='" + item.filename + "'><a href='" + item.solution + "' onclick=window.open('" + item.location +  "')>" + item.filename + "</a></li>";
			temp = '#' + item.category; 
			$(temp).append(li);
		
		});
	});
		
	  