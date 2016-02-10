
//asynchronous call to get the content of the json file
$.ajax({
	url: "tweetsFromTwitter.json",
	async: false,
	dataType: 'json',
	success: function(data) {
	$.each(data, function(iii, item){
		// create the tweet html element
		var currentTweet = "<div class='tweet'><div class='well well-sm'><img class='twitterAvatar img-circle' src='" + item.user.profile_image_url +"'><span class='tweetText'>"+ item.text +"</span><p class='twitterHandle'> - " + item.user.screen_name +"</p></div></div>"
		$("#tweetSpace").append(currentTweet);
		
		//create the profile html element
		var currentProfile = "<ul class='profile'><img class='profileAvatar img-circle ' src=" + item.user.profile_image_url +"><li class='list-group-item'>Name: " + item.user.name + " </li><li class='list-group-item'>Screen Name: " + item.user.screen_name + " </li><li class='list-group-item'>Description: " + item.user.description + " </li><li class='list-group-item'>Last Active: " + item.created_at + " </li><li class='list-group-item'>Latest Tweet: " + item.text + " </li><li class='list-group-item'>Followers: " + item.user.followers_count + " </li><li class='list-group-item'>Friends: " + item.user.friends_count + " </li><li class='list-group-item'>On Twitter Since: " + item.user.created_at + " </li></ul>";
		$("#profileSpace").append(currentProfile);

		});
	

		
	}
});


//this function will cycle throgh the json list one item every 3 seconds
setInterval(function() { 
  $('#tweetSpace > div:first')
	.slideUp(3000)
	.next()
	.end()
	.queue(function (next) {
		$(this).appendTo('#tweetSpace');
		next();
	});
	
	$('#profileSpace > ul:first')
	.slideUp(3000)
	.next()
	.end()
	.queue(function (next) {
		$(this).appendTo('#profileSpace');
		next();
	});
	
},  3000);