<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
		$router->addRoute('<presenter>/<action>[/<id>]', 'Homepage:default');
		$router->addRoute('prihlaseni/','Sign:in');
		$router->addRoute('registrace/','Register:register');
		$router->addRoute('blog/','Blog:blog');
		return $router;
	}
}
