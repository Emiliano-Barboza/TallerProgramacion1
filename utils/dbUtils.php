<?php
class dbUtils {
    public static function convertArrayToQueryValues($data){
        $values = '';
        
        foreach ($data as $value) {
            if (is_string($value)) {
                $values .= '"' . $value . '"';
            } else {
                $values .= $value;
            }
            $values .= ",";
        }
        return rtrim($values, ",");
    }
}
