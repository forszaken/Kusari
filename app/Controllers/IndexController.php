<?php
namespace app\Controllers;

use Kusari\Controller\Controller;

class IndexController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function Index()
    {
        return $this->render("index.html", ['title' => 'test']);
    }
}
