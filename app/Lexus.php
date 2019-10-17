<?php

namespace App;

class Lexus implements ResponseInterface
{
    protected $parse;
    protected $data;
    protected $resultcount = 0;
    protected $code = 0;
    protected $search;
    protected $message;

    public function populateJson($import)
    {
        $this->parse = json_decode($import, true);
    }

    public function getJsonData()
    {
        return $this->parse;
    }

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

    public function getParseData()
    {
        $this->parser($this->getData());
    }

    public function getParseSearch()
    {
        $this->parser($this->getSearch());
    }

    public function allocateData()
    {
        $sort = $this->getJsonData();
        $this->search = $sort["Search"];
        $this->data = $sort["Data"];
        $this->message = $sort["Message"];
    }

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