<?php

namespace App;
require_once('Lexus.php');
require_once('Document.php');
require_once('DocumentUtils.php');

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
