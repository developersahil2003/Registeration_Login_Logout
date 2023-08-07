
<?php


#work of session :- it saves just our data and make helpful 
#example :- when i log in in instagram then i'll close and when i will reopen then i will not have to relogin 
#session destroy it uses for specially logout when i will log out and then it will logout my account 
session_start();
session_destroy();
header('location:login.php');
?>