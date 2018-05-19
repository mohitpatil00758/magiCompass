<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client;
$blogdb = $client->blogdb;
$open_blog = $blogdb->openblog;
/*
$document = $open_blog->findOne(
['_id' => '1']
);
*/

$documentlist = $open_blog->find(

);

foreach($documentlist as $doc)
{
	var_dump($doc);
}

?>