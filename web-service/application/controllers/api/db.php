<?php
    function getConnection() {
        $dbhost="localhost";
        $dbuser="root";
        $dbpass="p@ssw0rd";
        $dbname="webservice";
        $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    }
?>