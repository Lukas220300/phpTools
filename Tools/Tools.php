<?php

namespace SCHOENBECK\Tools;

class ArrayTools
{

    /**
     * @param array $base
     * @param array $ext
     * @return array
     */
    public static function mergeArrays(array $base, array $ext)
    {
        $extKeys = array_keys($ext);
        foreach ($extKeys as $key){
            $typeOfKeyValue = gettype($ext[$key]);
            if(isset($base[$key])){
                if($typeOfKeyValue === "array"){
                    $base[$key] = self::mergeArrays($base[$key], $ext[$key]);
                } else {
                    $base[$key] = $ext[$key];
                }
            } else {
               $base[$key] = $ext[$key];
            }
        }
        return $base;
    }

}
