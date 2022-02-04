# Save link
This is a single page fully loaded with ajax

1. First you have to create a local MySQL database named SaveLink
1.1. You can edit the database connection information in the file "\API\joss_private\connect_db.php" to connect to the database.
2. Query function with get
ex: localhost?act=add_new_link
2.1. act=add_new_link
2.1.1. it has input password to complete save
2.1.2. you can change it at file "\API\Link_Add.php"
2.1.2.1. (characters to the right of the equal sign) in line 6 is the password to save the link default. It will show up at the top list.
2.1.2.2. (characters to the right of the equal sign) in line 8 is the password to save the hidden link. It will hide at the top list. You must add GET at point 2 to see this list.
2.2. act=<password> - see hidden list link
2.2.1. you can change it at file "\API\GetContentFunction.php" line 11 (the characters to the right of the equal sign)
2.3. detail=<id> - view details of a link by id
  
Note: I WILL TRY TO CONTINUE TO COMPLETE BASIC FEATURES IN NEXT UPDATES
Thank you for viewing and using my app
If you need to contact me, please contact me via email: ttngoc653@gmail.com (I'm Vietnamese) 
