<?php

namespace App;
require_once('Lexus.php');
require_once('Document.php');
require_once('DocumentUtils.php');

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

$data = file_get_contents("..\payload\data2.json");
$json_array = json_decode($data, true);

$class = new Lexus($data);
$class->allocateData();

$docs = new Document($data);
$docs->allocateData();
$docs->setDocuments();
$docs->getDocuments();

$NVP = new document_attribute($data);
$NVP->allocateData();
$NVP->setDocAttributes();
$NVP->getDocAttributes();

$class->getParseSearch();
$class->getParseData();
$class->printCode();
$class->printMessage();
$class->printResultCount();

echo "\nStatic DocumentUtils\n";
$utlis = new DocumentUtils();
$utlis->parseResponseToDocuments($json_array);

// PART 2
// In the provided JSON Blob the Data property contained a collection of "Documents". Write two classes
// one for "Document" and one for the object that represents the document_attribute collection. Since the
// attributes are name value pairs, call this object "NVP".
//
// Each object should be read-only.


// PART 3
// Now write a "static" class called  DocumentUtils that has a static method called parseResponseToDocuments
// that takes a ResponseInterface as input and returns a collection of Documents.
//
// Please ensure that this function also parses document attribute objects
// @throws \Exception when either the Document or its attribute do not have the correct
