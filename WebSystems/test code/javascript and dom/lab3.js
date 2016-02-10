	
	var tree = ""
	var depthMarker = ""
	traverseTree(document.getElementsByTagName("html")[0], "");
	
	function traverseTree(element, depthMarker){
	
		if (element.nodeType == 1){
			tree += depthMarker + element.tagName + "\n";
			
			var att = document.createAttribute("onclick"); // Create a "class" attribute
			att.value = "clickForName(" + '"<' + element.tagName + '>"'+ ")"; // Set the value of the class attribute
			element.setAttributeNode(att); // Add the class attribute
			
			if(element.id){
				att = document.createAttribute("onmouseover"); // Create a "class" attribute
				att.value = "cssManipulationOn('" + element.id + "')"; // Set the value of the class attribute
				element.setAttributeNode(att); // Add the class attribute
				
				att = document.createAttribute("onmouseout"); // Create a "class" attribute
				att.value = "cssManipulationOff('" + element.id + "')"; // Set the value of the class attribute
				element.setAttributeNode(att); // Add the class attribute
			}
			
				
		}
		
		if(element.hasChildNodes()){ //if it has children elements recurse through them and and increment depth counter
			var nodes = element.children;
			for(var iii = 0; iii < nodes.length; iii++){
				
				traverseTree(nodes[iii], depthMarker + "-"); 
		
			}
		}
	}
	
	function clickForName(tagName){
		alert(tagName);
	}
	
	function cssManipulationOn(id){

		document.getElementById(id).style.backgroundColor = "lightblue";
		document.getElementById(id).style.marginLeft = "30%";
	
	
	}
	
	function cssManipulationOff(id){

		document.getElementById(id).style.backgroundColor = "white";
		document.getElementById(id).style.marginLeft = "auto";
	}
	

	
	document.getElementById("info").innerHTML = tree;
		
	var quotes = document.getElementsByClassName("quote"); //select all elements of class quote and put them in array "quotes"
	var clone = quotes[1].cloneNode(true)
	clone.id = "q5" //give new id to clone
	clone.setAttribute("onmouseover", "cssManipulationOn('q5')"); //correct mouse function 
	clone.setAttribute("onmouseout", "cssManipulationOff('q5')"); //correct mouse function 

	document.getElementsByTagName("body")[0].appendChild(clone); // clone the first element of array quotes and append it to body
	