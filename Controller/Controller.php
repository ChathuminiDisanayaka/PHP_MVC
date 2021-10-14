<?php
// (A) DATABASE CONNECTION
require "../Model/Model.php";
$DB = new DB();

$search_name =  "{$_POST['search-name']}";
$search = ["{$_POST['search']}%"];


if($search_name == 'name'){
    $results = $DB->select("SELECT * FROM `users` WHERE `name` LIKE ?", $search);
}
else if($search_name=='city') {
    $results = $DB->select("SELECT * FROM `users` WHERE `city` LIKE ?", $search);}
else{
        $results = $DB->select("SELECT * FROM `users` WHERE `age` LIKE ?", $search);

}
// OUTPUT RESULTS
echo json_encode(count($results)==0 ? null : $results);

