<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 7/11/17
 * Time: 6:17 PM
 */

namespace App\Providers;


use App\Http\ViewComposers\StatusMessageViewComposer;
use Illuminate\Support\Facades\View;
use TwigBridge\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function register()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        View::composer('status-message', StatusMessageViewComposer::class);
    }


}