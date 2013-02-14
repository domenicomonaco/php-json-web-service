# PHP JSON Web Service

### Summary
A simple shell for creating a JSON web service using PHP.

### Requirements
+ PHP 5.2+
+ MySQL

### How to Use
1. Update the `mysql_connect` and `mysql_select_db` parameters to reflect your database credentials.
1. Change the `SELECT` statement to the query needed to fetch your data from the database.
1. Modify the `$_GET` parameters and master array as needed.


### Example
An example request would look like this:

```html
http://example.com/service.php?user=2&num=10
```

### Documentation
+ [Create a Basic Web Service Using PHP, MySQL, XML, and JSON](http://davidwalsh.name/web-service-php-mysql-xml-json)
+ [json_encode on PHP.net](http://php.net/manual/en/function.json-encode.php)