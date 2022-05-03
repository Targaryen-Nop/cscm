<?php
####### Local Host #######################
$server     = "localhost";
$user       = "root";
$pwd        = "";
$dbname     = "cscm";
$connection = mysqli_connect($server, $user, $pwd, $dbname);
$connection->set_charset("utf8");
####### Remote Host ######################
$server_crm     = "localhost";
$user_crm       = "root";
$pwd_crm        = "";
$dbname_crm     = "cscm";
$connection_crm = mysqli_connect($server_crm, $user_crm, $pwd_crm, $dbname_crm);
$connection_crm->set_charset("utf8");
?>