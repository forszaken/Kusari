<?php


namespace Kusari\View;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View implements IView
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * View constructor.
     */
    public function __construct()
    {
        $filesystemLoader = new FilesystemLoader(realpath(__DIR__ . '/../../') . '/views');
        $environment = new Environment($filesystemLoader);
        $this->twig = $environment;
    }

    /**
     * @param $path
     * @param array $data
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function make($path, $data = [])
    {
        echo $this->twig->render($path, $data);
    }
}
