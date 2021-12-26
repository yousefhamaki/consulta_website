<?php

namespace App\Traits;

trait Offertrait
{
    function saveimage($photo, $dir, $num){
        if($photo !== NULL){
            $file_extention = $photo->getClientOriginalExtension();
            $filename = sha1(time()) . $num . '.' . $file_extention;
            $path = $dir;
            $photo ->move($path, $filename);
            return $filename;
        }else{
            return NULL;
        }

    }
    function filter_text($index)
    {
        $content_filter =  str_replace('<', '&lt;', $index);
        $content_filter2 =  str_replace('>', '&gt;', $content_filter);
        $content = nl2br($content_filter2);
        return $content;
    }
}
