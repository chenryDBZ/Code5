<?php

class LexusTest extends PHPUnit\Framework\TestCase
{
    protected $data = array();

    protected function setUp(): void
    {
        $json = '{
    "Search": {
        "total_records": 2,
        "start_at": 0,
        "max_records": 2
    },
    "Data": [
    	{
    		"id": 2,
    		"document_name": "Document One",
    		"published": true,
    		"document_attributes":[
				{
					"name": "sub_product_id",
					"value": "1"
				},
				{
					"name": "css_class",
					"value": "mbs-style-1"
				}
    		]
    	},
    	{
    		"id": 2,
    		"document_name": "Document Two",
    		"published": false,
    		"document_attributes":[
				{
					"name": "sub_product_id",
					"value": "2"
				},
				{
					"name": "css_class",
					"value": "mbs-style-2"
				}
    		]
    	}
    ],
    "Code": 0,
    "Message": "",
    "ResultCount": 2
}';
        $this->data = $json;
    }

    public function testGetMessage()
    {
        $class = new \App\Lexus();
        $class->populateJson($this->data);
        $class->allocateData();

        $this->assertEquals("", $class->getMessage());
    }

    public function testGetCode()
    {
        $code = new \App\Lexus();
        $code->populateJson($this->data);
        $code->allocateData();
        $this->assertEquals(0, $code->getCode());
    }

    public function testGetResultCount()
    {
        $result = new \App\Lexus();
        $result->populateJson($this->data);
        $result->allocateData();

        $this->assertEquals(2, $result->getResultCount());
    }

    public function testGetData()
    {
        $class = new \App\Lexus();
        $class->populateJson($this->data);
        $class->allocateData();
        $value = $class->getData();

        $this->assertEquals("Document One", $value[0]["document_name"]);
    }

    public function testGetSearch()
    {
        $class = new \App\Lexus();
        $class->populateJson($this->data);
        $class->allocateData();
        $value = $class->getSearch();

        $this->assertEquals(2, $value["total_records"]);
    }

    public function testParser()
    {
        $class = new \App\Lexus();
        $class->populateJson($this->data);
        $class->allocateData();
        $value = $class->getJsonData();

        $this->assertIsArray($value);
    }

}