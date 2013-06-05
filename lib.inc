<?php
/**
 * Developer Domenico Monaco - domenico.monaco@kiuz.it
 * 
 * Simple PHP service for fast prototipyng JSON from MySql Queries.
 */

function query_encode($mysqli, $query=null, $_DEBUGMODE=FALSE){

	if($query==null){
		$information[] = 
			array(
			"result" => FALSE,
			"error" => null,
			"qinfo"	 => null);
	}else if (mysqli_connect_errno()) {
		$information[] = 
			array(
			"result" => FALSE,
			"error" => mysqli_connect_error(),
			"qinfo"	 => null);
	}else{
		if ($result = $mysqli->query($query)) {
			$information[] = 
				array(
					"result" => TRUE,
					"qinfo"  => array(
								"field_count" => $mysqli->field_count,
								"num_row" => $result->num_rows
								)
					);

			/* fetch associative array */
			while ($row = $result->fetch_assoc()) {
				$items[] = array("item" => $row);
			}
		}else{
			$information[] = 
				array(
					"result" => FALSE,
					"qinfo"	 => null);
		}
	}

	/* Aggregate output array */
	$out["items"] = $items;
	$out["information"] = $information;


	if($_DEBUGMODE == TRUE){
		print_r($out);
	}
return $out;
}

?>

