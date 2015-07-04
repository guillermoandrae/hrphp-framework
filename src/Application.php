<?php
/**
 * This file is part of the hrphp-framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hrphp;

/**
 * Application
 *
 * @todo Add methods for head, put, delete, options
 * @todo Add descriptions to the docblocks
 * @todo Add code for the run method
 * @todo Integrate the HTTP request and response
 *
 * @package Hrphp
 * @author Guillermo A. Fisher <me@guillermoandraefisher.com>
 */
class Application
{
    use ConfigurableTrait;

    /**
     * @var View
     */
    protected $view;

    /**
     * @var Environment
     */
    protected $environment;

    /**
     * @var array
     */
    protected $routes = [];

    /**
     * @param View $view
     * @param Environment $environment
     * @param array $options
     */
    public function __construct(View $view, Environment $environment = null, array $options = [])
    {
        $this->setView($view);
        if (!$environment) {
            $environment = new Environment();
        }
        $this->setEnvironment($environment);
        if ($options) {
            $this->setOptions($options);
        }
        $this->init();
    }

    /**
     * @return View
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param View $view
     */
    public function setView($view)
    {
        $this->view = $view;
    }

    /**
     * @return Environment
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param Environment $environment
     */
    public function setEnvironment(Environment $environment)
    {
        $this->environment = $environment;
    }

    /**
     * @param string $layout
     * @return $this
     */
    public function setLayout($layout)
    {
        $this->getView()->setLayout($layout);
        return $this;
    }

    /**
     * @param string $partial
     * @return $this
     */
    public function setPartial($partial)
    {
        $this->getView()->setPartial($partial);
        return $this;
    }

    /**
     * Run it!
     */
    public function run()
    {
        // check the current route, execute the code for the matching route, send a response
    }

    /**
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * @param string $pattern
     * @param callable $callable
     * @param array $validationRules
     */
    public function get($pattern, callable $callable, array $validationRules = [])
    {
        $this->addRoute('GET', $pattern, $callable, $validationRules);
    }

    /**
     * @param string $pattern
     * @param callable $callable
     * @param array $validationRules
     */
    public function post($pattern, callable $callable, array $validationRules = [])
    {
        $this->addRoute('POST', $pattern, $callable, $validationRules);
    }

    /**
     * @param string $httpMethod
     * @param string $pattern
     * @param callable $callable
     * @param array $validationRules
     * @return Application
     */
    public function addRoute($httpMethod, $pattern, callable $callable, array $validationRules = [])
    {
        $route = new Route($httpMethod, $pattern, $callable);
        if ($validationRules) {
            $route->setValidationRules($validationRules);
        }
        $this->routes[] = $route;
        return $this;
    }

    protected function init()
    {
        Di::set('view', $this->getView());
        Di::set('environment', $this->getEnvironment());
    }
}
