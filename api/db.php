<?php
    function getConnection() {
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="5555";
        $dbname="webservice";
        $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    }
?>