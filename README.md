# Simple PHP JSON Web Service 

### Current Author
Domenico Monaco - domenico.monaco@kiuz.it

### Summary
A simple shell for creating a JSON web service using PHP with data retrieved with MySql queries.

### Requirements
+ PHP 5.2+
+ MySQL

### How to Use
1. Change the `SELECT` statement to the query needed to fetch your data from the database.
1. Modify the `$_GET` parameters and master array as needed.

### Example
An example request would look like this:

```html
http://<YOUR_DOMAIN>/service.php?q=<IDENTFIER_QUERY>&debug=<1|0>
http://<YOUR_DOMAIN>/service.php?q=<IDENTFIER_QUERY>
```

Where 'listofname' is identifier of query stored into code as:

$query = array(
			"listofname" => "SELECT * FROM name WHERE ....",
			"listofcity" => "SELECT * FROM city WHERE ...",
			...
		);