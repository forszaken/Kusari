<?php


namespace Kusari\Controller;

interface IController
{
    /**
     * @param $path
     * @param array $data
     * @return mixed
     */
    public function render($path, $data = []);
}
