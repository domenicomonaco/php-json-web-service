<?php

  /* Require the user as the parameter */
  if(isset($_GET["user"]) && intval($_GET["user"])) {

    /* Soak in the passed variable or set our own */
    $number_of_items = isset($_GET["num"]) ? intval($_GET["num"]) : 10; // 10 is default
    $user_id = intval($_GET["user"]); // no default

    /* Connect to the DB */
    $connect = mysql_connect("localhost", "username", "password") or die("Cannot connect to the DB");
    mysql_select_db("db_name", $connect) or die("Cannot select the DB");

    /* Grab the items from the DB */
    $query = "SELECT column_1, column_2 FROM table_name WHERE columns_1 = $user_id ORDER BY ID DESC LIMIT $number_of_items";
    $result = mysql_query($query, $connect) or die("Errant query: ".$query);

    /* Create one master array of the records */
    $items = array();
    if(mysql_num_rows($result)) {
      while($item = mysql_fetch_assoc($result)) {
        $items[] = array("item" => $item);
      }
    }

    /* Output in JSON format */
    header("Content-type: application/json");
    echo json_encode(array("items" => $items));

    /* Disconnect from the DB */
    @mysql_close($connect);
  }

?>