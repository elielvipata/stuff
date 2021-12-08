<?php
require '../vendor/autoload.php';
//$app_id=“KSDJFKASJFI3S8DSJFDH”;
//$master_key = “LASDK823JKHR87SDFJSDHF8DFHASFDF”;
//$rest_key = “abcdefghiklmnopqrstuvwxyz”;

/*
    Payment Methods:
        Card - Automatic
        Echeck - 
        Crypto - 
*/

session_start();

use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;

ParseClient::initialize( "KSDJFKASJFI3S8DSJFDH",null, "LASDK823JKHR87SDFJSDHF8DFHASFDF");
ParseClient::setServerURL("http://localhost:1337/parse", '/');

$query = new ParseQuery("PaymentMethods");
$query->equalTo("type", "card");
$card = $query->find();

$query->equalTo("type", "crypto");
$crypto = $query->find();

$query->equalTo("type", "check");
$check = $query->find();




echo "

<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Team</h2>

<table>
  <tr>
    <th>Payment Method</th>
    <th>Status</th>
    <th>Action</th>
  </tr>

  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>

";

?>