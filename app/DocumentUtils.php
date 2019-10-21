<?php


namespace App;


use mysql_xdevapi\Exception;

class DocumentUtils extends Lexus
{
    public static function parseResponseToDocuments($import)
    {
        try{
            if (isset($import)) {
                foreach ($import as $key => $value) {
                    if (is_array($value)) {
                        self::parseResponseToDocuments($value);
                        echo "\n";
                    } else {
                        echo $key. ":" . $value . "\n";
                    }
                }
            }else{
                throw new Exception("Not a Json Array");
            }
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }
}