<?php
equire '../vendor/autoload.php';
//$app_id=“KSDJFKASJFI3S8DSJFDH”;
//$master_key = “LASDK823JKHR87SDFJSDHF8DFHASFDF”;
//$rest_key = “abcdefghiklmnopqrstuvwxyz”;

/*
    Team
    Fullname
    Username
    Email Address
    Role

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

$query = new ParseQuery("Team");
$query->limit(100);
$results = $query->find();

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

<button><a href='comments.php'>View Log</a></button>
<button><a href='view_user_lists.php'>View Tasks</a></button>
<button><a href='cal.php'>Assign Tasks</a></button>


<form method='POST' action='save_user.php'>

<table>
  <tr>
    <th>Fullname</th>
    <th>Username</th>
    <th>Email</th>
    <th>Role</th>
  </tr>

";

for($i = 0; $i < count($results); $i++){
    $object = $results[$i];
    $fullname = $object->get("Fullname");
    $username = $object->get("username");
    $email = $object->get("email_address");
    $role = $object->get("role");

    echo "
    <tr>
        <td>".$fullname."</td>
        <td>".$username."</td>
        <td>".$email."</td>
        <td>".$role."</td>
        <td>
        <select name='role$i'>
        <option value='editor'>Editor</option>
        <option value='pseudo'>Psuedo User</option>
        </select>
        <input type='submit' name='submit$i' value='Save'/>
        </td>
    </tr>
    ";
}

echo"</table>
</form></body></html>";


?>