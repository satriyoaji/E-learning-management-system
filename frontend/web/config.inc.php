<?
    $dbhostname = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbdatabase = "elearning";
    
    mysql_connect($dbhostname,$dbusername,$dbpassword) or die ("Error Connection");
    mysql_select_db($dbdatabase) or die ("Cannot Find Database");
?>