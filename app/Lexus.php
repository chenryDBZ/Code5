<?php

namespace App;
trait jsonDoc
{
    public function Doc($json)
    {
        $value = json_decode($json, true);
        return $value;
    }
}

class Lexus implements ResponseInterface
{
    use jsonDoc;
    protected $data = array(); //empty array
    protected $resultcount = 0; //default 0
    protected $code = 0; //default 0
    protected $import;
    protected $search = array();
    protected $message;

    //Receive JSON Import
    public function populateJson($import)
    {
        $this->import = $this->Doc($import);
    }

    public function getJsonData()
    {
        return $this->import;
    }

    //Parse JSON Child values
    public function parser($input)
    {
        if ($input) {
            $iterate = new \RecursiveIteratorIterator(
                new \RecursiveArrayIterator($input),
                \RecursiveIteratorIterator::SELF_FIRST);

            foreach ($iterate as $key => $val) {
                if (is_array($val)) {
                    echo "$key:\n";
                } else {
                    echo "$key = $val\n";
                }
            }
        }
    }

    //print Data
    public function getParseData()
    {
        $this->parser($this->getData());
    }

    public function getParseSearch()
    {
        $this->parser($this->getSearch());
    }

    public function printCode()
    {
        echo "\nCode: " . $this->getCode() . "\n";
    }

    public function printMessage()
    {
        echo "Message: " . $this->getMessage() . "\n";
    }

    public function printResultCount()
    {
        echo "Result Count: " . $this->getResultCount() . "\n";
    }

    //Setting Values
    public function allocateData()
    {
        $sort = $this->getJsonData();
        $this->search = $sort["Search"];
        $this->data = $sort["Data"];
        $this->message = $sort["Message"];
        $this->code = $sort["Code"];
        $this->resultcount = $sort["ResultCount"];
    }

    //Getters
    public function getCode()
    {
        return $this->code;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getResultCount()
    {
        return $this->resultcount;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getSearch()
    {
        return $this->search;
    }
}