<?php 
require 'vendor/autoload.php';
$client = new MongoDB\Client('mongodb://viewer:7576sc0VmGXE3uHv@cluster0-shard-00-00-egp3y.mongodb.net:27017,cluster0-shard-00-01-egp3y.mongodb.net:27017,cluster0-shard-00-02-egp3y.mongodb.net:27017/test?ssl=true&replicaSet=Cluster0-shard-0&authSource=admin');

$blogdb = $client->Blog_DataBase;
$open_blog = $blogdb->Travel_Stories;
$document1 = $open_blog->find(
	['just_C' => 'justCurious'],
	[
		'limit' => 8,
		'sort' => ['_id' => -1]
	]
);
foreach ($document1 as $key1) {
echo '<div class="container "id = "'.htmlspecialchars($key1['Blog_title']).''.htmlspecialchars($key1['Blog_Chpt']).'";"'."\n";
echo  '<div class="card " style="width:80%;   box-shadow: 10px 10px 5px grey; border: 50px solid transparent;
    padding: 15px;" >'."\n";
echo    '<div class="card-body">'."\n";
echo      '<h4 class="card-title">'.htmlspecialchars($key1['Blog_title']).','.htmlspecialchars($key1['Blog_edition']).','.htmlspecialchars($key1['Blog_Chpt']).'</h4>'."\n";
echo      $key1['Blog_Content'];
echo    '</div>'."\n";
 echo '</div>'."\n";

}
?>