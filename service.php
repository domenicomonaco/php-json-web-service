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
 *
 * Forked from: 
 * 
 *
 */
header("Content-type: application/json");

include("db.conf");
include("lib.inc");

/* Retrive identifier of queryes, identifier is ID of array's query */
$q = $_GET['q'];
$annoaccademico = $_GET['annoaccademico'];
/* Detect debug mode */
//$debugMODE=($_GET['debug'] == '1' ? TRUE : FALSE);

/* Queryes list with identifier */
$querys = array(
	"listamaterie" 			=> "SELECT * FROM Materie",
	"listacorsodistudi" 	=> "SELECT * FROM CorsoDiStudi",
	"listaalunni" 			=> "SELECT * FROM Alunni",
	"listadocenti" 			=> "SELECT * FROM Docenti",

	"listaedizionecorsi"    => "SELECT * FROM EdizioniCorsi",
	"anniaccademici"    	=> "SELECT AnnoAccademico FROM EdizioniCorsi GROUP BY AnnoAccademico",
	"edcorsoAnnox"    	    => "SELECT * FROM EdizioniCorsi WHERE AnnoAccademico=".$annoaccademico
);

/* make connection */
$mysqli = new mysqli($host, $user, $pass, $database);

/* Encode Json from array generated from selected query */
echo json_encode(array("output" => query_encode($mysqli, $querys[$q],$debugMODE)));

$mysqli->close();
?>