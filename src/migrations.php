<?php

namespace App;

use App\DB;

$db = DB::mysql_connector();

$sql = "CREATE TABLE produits (id int primary key auto_increment, nom varchar(50), prix float)";

try {
	$db->exec($sql);
	echo "Table produits creee avec success";
} catch (Exception $e) {
	echo $e->getMessage();
}