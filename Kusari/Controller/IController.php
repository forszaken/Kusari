<?php


namespace Kusari\Controller;


interface IController
{

    public function render($path, $data = []);

}