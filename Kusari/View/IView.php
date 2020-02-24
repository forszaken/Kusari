<?php

namespace Kusari\View;

interface IView
{
    /**
     * @param $path
     * @param array $data
     * @return mixed
     */
    public function make($path, $data = []);
}
