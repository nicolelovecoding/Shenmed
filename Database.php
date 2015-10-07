<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<?php
 $hostname = 'localhost';  //'localhost'; 'localhost:/tmp/mysql.sock';
 $dbname = 'test';
 $db_user= 'root';
 $db_pass= ""; 
 $link= mysql_connect($hostname,$db_user)or die("Not connected : ".mysql_error());
 mysql_select_db($dbname,$link) or die("can't connect to the server!");
?>