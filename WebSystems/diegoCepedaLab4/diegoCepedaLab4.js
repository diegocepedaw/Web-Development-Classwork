function onClick(){
					$.getJSON("diegoCepedaLab4.json", function(result){
						$.each(result.playlist, function(i, item){
							tr = "<tr>";
							tr += "<td>" + item.title + "</td>";
							tr += "<td>" + item.artist + "</td>";
							tr += "<td>" + item.album + "</td>";
							tr += "<td>" + item.release + "</td>";
							tr += "<td>" + item.genre + "</td>";
							tr += "<td><a href='" + item.website + "'>" + item.website + "</a></td>";
							tr += "<td><img src='" + item.cover + "'></td>";
							tr += "</tr>";
							
							$("#playlist").append(tr);
						
						});
					});
			}