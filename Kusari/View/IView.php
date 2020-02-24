<?php

namespace Kusari\View;

interface IView
{
    public function make($path, $data = []);
}
