<?php
/**
 * Created by PhpStorm.
 * User: Taha
 * Date: 9/21/2019
 * Time: 5:46 PM
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Repository\User\UserRepository;
use App\Repository\Content\ContentRepository;
use App\Structures\Interfaces\Repository\UserInterface;
use App\Structures\Interfaces\Repository\ContentInterface;

class GraphServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            ContentInterface::class,
            ContentRepository::class
        );
    }
}