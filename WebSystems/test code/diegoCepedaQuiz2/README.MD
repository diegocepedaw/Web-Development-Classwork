a. How	you	would	go	about	adding	functionality	to	allow	the	delete	selection	of	a	
song	to	work

Very similar to the insert. Check if the username of the session has admin priviledges and if so use the DELETE statement
to remove a song.


b. Describe	how	you	would	handle	a	situation	where a	user	came	to	the	site	for	the	
very	first	time	and	no	database	existed	(Think	install)

Essentially I would include a check at the top of every page that uses a database which would create a blank database if noone existed.
Depending on the situation also populate it with a single admin account, admin admin maybe.


c. Describe	how	you	would	propose	editing	songs	or	users	in	the	database
Implement a feature which where beside every song (and if your an admin you would see a list of users with similar tools) you have the option to delete edit
and then it's a simple matter of using php to query the database. 

d. Describe	how	you	would	allow	multiple	users	to	keep	list	of	their	own	songs	in	
this	application

instead of just loading from the same table every time when an account is created it would also create a table for that user, and after checking
which user is logged in through session it would load fromm his or her personal list.