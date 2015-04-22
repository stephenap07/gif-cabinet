<?php

$config = array (
	"db" => array (
		"dbname" => "group1",
		"username" => "group1",
		"password" => "cop1group1",
		"host" => "localhost"
	),
    "paths" => array (
        "resources" => "resources/",
        "images" => array (
            "content" => $_SERVER["DOCUMENT_ROOT"] . "/images/content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "/images/layout"
        ),
	"uploads" => "uploads/"
    )
);
 
defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));
     
defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));

ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);

?>
