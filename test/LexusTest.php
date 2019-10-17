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

    public function testSetResult()
    {
        $code = new \App\Lexus();

        $this->assertEquals(0, $code->getResultCount());
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

        $this->assertEquals(0, $code->getCode());
    }

    public function testGetResultCount()
    {
        $result = new \App\Lexus();

        $this->assertEquals(0, $result->getResultCount());
    }

    public function testGetData()
    {
        $class = new \App\Lexus();
        $class->populateJson($this->data);

        $this->assertNotNull(true, $class->getData());
    }

    public function testParser()
    {
        $class = new \App\Lexus();
        $class->populateJson($this->data);
        $class->allocateData();

        $this->assertNotEmpty($class->getParseSearch());
    }

}