<?php

function mJsonArray_encode($jsonArray)
{
    $newArray = array();
    // encode
    for ($i = 0; $i < count($jsonArray); $i++) {
        $jsonObject = $jsonArray[$i];

        foreach ($jsonObject as $key => $value) {
            $newObject[$key] = urlencode($value);
        }
        array_push($newArray, $newObject);
    }
    // decode
    return urldecode(json_encode($newArray));
}

function mJsonObject_encode($jsonObject)
{
    $newArray = array();
    // encode
    foreach ($jsonObject as $key => $value) {
        $newObject[$key] = urlencode($value);
    }
    array_push($newArray, $newObject);

    // decode
    return urldecode(json_encode($newArray));
}


?>