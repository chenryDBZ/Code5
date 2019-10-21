<?php


namespace App;

class Document extends Lexus
{
    protected $documents = array();

    public function __construct($import)
    {
        parent::__construct($import);
    }

    public function setDocuments()
    {
        $this->documents = $this->data;
    }

    public function getDocuments()
    {
        return $this->documents;
    }
}

class document_attribute extends Lexus
{
    protected $doc_attributes = array();

    public function __construct($import)
    {
        parent::__construct($import);
    }

    public function setDocAttributes()
    {
        $this->doc_attributes = array_column($this->data, "document_attributes");
    }

    public function getDocAttributes(): array
    {
        return $this->doc_attributes;
    }
}
