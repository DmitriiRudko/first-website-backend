<?php

class View
{
    function generate($content_view, $template_view, $data = null)
    {
        /*
        if(is_array($data)) {
            extract($data);
        }
        */
        //$data = ['1' => ['name' => 'qwe', 'barcode' => '123']];
        include 'application/views/' . $template_view;
    }
}

?>