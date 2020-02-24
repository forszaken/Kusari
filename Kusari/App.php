<?php
namespace Kusari;

use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;

class App
{
    private $request;


    private $router;
    private $routes;
    private $requestContext;

    private $controller;
    private $arguments;

    private $corePath;

    private static $instance = null;

    private function __construct($corePath)
    {
        $this->corePath = $corePath;
        $this->setRequest();
        $this->setRequestContext();
        $this->setRouter();
        $this->routes = $this->router->getRouteCollection();
    }


    private function setRequest()
    {
        $this->request = Request::createFromGlobals();
    }

    private function setRequestContext()
    {
        $this->requestContext = new RequestContext();
        $this->requestContext->fromRequest($this->request);
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getRequestContext()
    {
        return $this->requestContext;
    }

    private function setRouter()
    {
        $fileLocator = new FileLocator([__DIR__]);
        $this->router = new Router(
            new YamlFileLoader($fileLocator),
            $this->corePath . '/routes/routes.yaml',
            ['cache_dir' => $this->corePath . '/storage/cache']
        );
    }

    public static function getInstance($corePath)
    {
        if (is_null(static::$instance)) {
            static::$instance = new static($corePath);
        }

        return static::$instance;
    }

    public function getController()
    {
        return (new ControllerResolver())->getController($this->request);
    }

    public function getArguments($controller)
    {
        return (new ArgumentResolver())->getArguments($this->request, $controller);
    }

    public function run()
    {
        $matcher = new UrlMatcher($this->routes, $this->requestContext);

        try {
            $this->request->attributes->add($matcher->match($this->request->getPathInfo()));

            $this->controller = $this->getController();
            $this->arguments = $this->getArguments($this->controller);

            $response = call_user_func_array($this->controller, $this->arguments);
        } catch (ResourceNotFoundException $e) {
            echo $e->getMessage();
        }

        return $response;
    }
}
