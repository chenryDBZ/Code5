<?php
namespace App;
require_once('Lexus.php');

// Question
// 
// You are given the below ResponseInterface and json blob
// 
// Write a class that implements ResponseInterface which takes a json string and parses the response into the following parts:
// 	* Search
// 	* Data
// 	* Code
// 	* Message
// 	* ResultCount
// 	
// NOTE: Response class should be read-only. 
// 		 Both Code and ResultCount should have default values of 0
// 		 Data should have an empty array as its default value

interface ResponseInterface
{
    public function getCode();

    public function getMessage();

    public function getResultCount();

    public function getData();

    public function getSearch();
}
//$data = file_get_contents("data.json");
//
//$class = new Lexus();
//$class->populateJson($data);
//$class->allocateData();
//
//$class->getParseSearch();
//$class->getParseData();
//
//echo "\nCode: " . $class->getCode() . "\n";
//echo "Message: " . $class->getMessage() . "\n";
//echo "Result Count: " . $class->getResultCount() . "\n";
