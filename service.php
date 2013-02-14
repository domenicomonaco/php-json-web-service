<?php

  /* Require the user as the parameter */
  if(isset($_GET["user"]) && intval($_GET["user"])) {

    /* Soak in the passed variable or set our own */
    $number_of_posts = isset($_GET["num"]) ? intval($_GET["num"]) : 10; // 10 is default
    $user_id = intval($_GET["user"]); // no default

    /* Connect to the DB */
    $connect = mysql_connect("localhost", "username", "password") or die("Cannot connect to the DB");
    mysql_select_db("db_name", $connect) or die("Cannot select the DB");

    /* Grab the posts from the DB */
    $query = "SELECT post_title, guid FROM wp_posts WHERE post_author = $user_id AND post_status = 'publish' ORDER BY ID DESC LIMIT $number_of_posts";
    $result = mysql_query($query, $connect) or die("Errant query: ".$query);

    /* Create one master array of the records */
    $posts = array();
    if(mysql_num_rows($result)) {
      while($post = mysql_fetch_assoc($result)) {
        $posts[] = array("post" => $post);
      }
    }

    /* Output in JSON format */
    header("Content-type: application/json");
    echo json_encode(array("posts" => $posts));

    /* Disconnect from the DB */
    @mysql_close($connect);
  }

?>