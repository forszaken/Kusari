<?php


namespace Kusari\View;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View implements IView
{
    private $twig;

    public function __construct()
    {
        $filesystemLoader = new FilesystemLoader(realpath(__DIR__ . '/../../') . '/views');
        $environment = new Environment($filesystemLoader);
        $this->twig = $environment;
    }

    public function make($path, $data = [])
    {
        echo $this->twig->render($path, $data);
    }
}