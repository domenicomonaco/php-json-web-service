<?php
/**
 * Developer Domenico Monaco - domenico.monaco@kiuz.it
 * 
 * Simple PHP service for fast prototipyng JSON from MySql Queries.
 * 
 * http://<YOUR_DOMAIN>/service.php?q=<IDENTFIER_QUERY>&debug=<1|0>
 * http://<YOUR_DOMAIN>/service.php?q=<IDENTFIER_QUERY>
 * 
 * $querys = array(
 *	"IDENTIFIER" => "SELECT * FROM <TABLE_NAME>.... ",
 * );
 *
 */
header("Content-type: application/json");

include("db.conf");
include("lib.inc");

/* Retrive identifier of queryes, identifier is ID of array's query */
$q = $_GET['q'];

/* Detect debug mode */
$debugMODE=($_GET['debug'] == '1' ? TRUE : FALSE);

/* Queryes list with identifier */
$querys = array(
	"listofname" 			=> "SELECT * FROM Name",
	"listofcity" 			=> "SELECT * FROM City",
);

/* make connection */
$mysqli = new mysqli($host, $user, $pass, $database);

/* Encode Json from array generated from selected query */
echo json_encode(array("output" => query_encode($mysqli, $querys[$q],$debugMODE)));

$mysqli->close();
?>