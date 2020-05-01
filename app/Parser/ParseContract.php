<?php

namespace App\Parser;

Interface ParseContract
{
    public function getParse($path);

    public function text($obj, $val = null);

    public function html($obj, $val = null);
}
