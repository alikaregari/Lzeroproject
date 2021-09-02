<?php
use Illuminate\Support\Facades\Route;

 function is_Active($key,$ActiveClassName){
    if (is_array($key)):
        return Key_Has_Array($key, $ActiveClassName);
    else:
        return Key_Hasnt_Array($key, $ActiveClassName);
    endif;
}

/**
 * @param $key
 * @param $ActiveClassName
 * @return mixed|string
 */
function Key_Hasnt_Array($key, $ActiveClassName)
{
    return Route::currentRouteName() == $key ? $ActiveClassName : '';
}

/**
 * @param array $key
 * @param $ActiveClassName
 * @return mixed|string
 */
function Key_Has_Array(array $key, $ActiveClassName)
{
    return in_array(Route::currentRouteName(), $key) ? $ActiveClassName : '';
}
