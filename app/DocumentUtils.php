<?php


namespace App;


class DocumentUtils extends Lexus
{
    public static function parseResponseToDocuments($import)
    {
        if ($import) {
            foreach ($import as $key => $value) {
                if (is_array($value)) {
                    self::parseResponseToDocuments($value);
                    echo "\n";
                } else {
                    echo $key. ":" . $value . "\n";
                }
            }
        }
    }
}