<?php

class View
{
    function generate($content_view, $template_view, $data = null, $page_info = null)
    {
        /*
        if(is_array($data)) {
            extract($data);
        }
        */
        include 'application/views/' . $template_view;
    }
}

?>