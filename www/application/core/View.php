<?php

class View
{
    function generate($contentView, $templateView, $data = null, $pageInfo = null)
    {
        /*
        if(is_array($data)) {
            extract($data);
        }
        */
        include 'application/views/' . $templateView;
    }
}
