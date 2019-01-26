<?php
/**
 * Created by PhpStorm.
 * User: dario
 * Date: 25/01/2019
 * Time: 12:56
 */

namespace App\Controllers;

use Silex\Application;
use Silex\Provider\TwigServiceProvider;

class Controller extends Application
{
    /**
     * Controller constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->register(new TwigServiceProvider(), array(
            'twig.path' => __DIR__.'/../Views',
        ));
    }

    /**
     * @param $path
     * @param array|null $params
     * @return mixed
     */
    protected function rederView($path, array $params = [])
    {
        return $this['twig']->render($path.'.twig', $params);
    }
}