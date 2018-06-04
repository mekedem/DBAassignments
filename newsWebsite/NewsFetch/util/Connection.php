<?php

class Connection
{
    public static function query($queryString)
    {
        $username = "root";
        $password = "";
        $serverName = "localhost";
        $databaseName = "sea";

        $con = mysqli_connect($serverName, $username, $password) or die(mysql_error());
        mysqli_select_db($con, $databaseName) or die(mysql_error());
        $result = mysqli_query($con, $queryString) or die(mysql_error());
        
        return $result;
    }
}

?>