<?php

namespace Application\Core;

class View
{
    private $templateView = 'template-view.php';

    function generate($contentView, $data = null, $pageInfo = null)
    {
        include 'application/views/' . $this->templateView;
    }
}
