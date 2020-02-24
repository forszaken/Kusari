<?php


namespace Kusari\Controller;

use Kusari\View\View;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller implements IController
{
    /**
     * @var View
     */
    protected $view;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * @param $path
     * @param array $data
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function render($path, $data = [])
    {
        return new Response($this->view->make($path, $data));
    }
}
