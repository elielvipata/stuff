<?php
equire '../vendor/autoload.php';
//$app_id=“KSDJFKASJFI3S8DSJFDH”;
//$master_key = “LASDK823JKHR87SDFJSDHF8DFHASFDF”;
//$rest_key = “abcdefghiklmnopqrstuvwxyz”;

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

$query = new ParseQuery("Inventory");
$query->limit(100);
$results = $query->find();

for($i = 0; $i < 100; $i++){
    if(isset($_POST['submit$i'])){
        $object = $results[$i];
        $name = $_POST['name$i'];
        $price = $_POST['price$i'];
        $discount = $_POST['discount$i'];
        $purchases = $_POST['purchases$i'];
        $page_link = $_POST['page_link$i'];
        $total = $_POST['total$i'];

        $object->set("name", $name);
        $object->set("raw_price", $price);
        $object->set("discount", $discount);
        $object->set("purchases", $purchases);
        $object->set("product_link", $page_link);
        $object->set("total", $total);
        
        try {
            $object->save();
            echo 'Saved objectId: ' . $object->getObjectId();
            //Add file redirection
        } catch (ParseException $ex) {  
        // Execute any logic that should take place if the save fails.
        // error is a ParseException object with an error code and message.
        echo 'Failed to create new object, with error message: ' . $ex->getMessage();
        }

        break;

    }
}

?>