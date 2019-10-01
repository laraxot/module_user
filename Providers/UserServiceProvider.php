<?php
namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Foundation\AliasLoader;

//---- bases ----
use Modules\Xot\Providers\XotBaseServiceProvider;

class UserServiceProvider extends XotBaseServiceProvider{
    protected $module_dir= __DIR__;
    protected $module_ns=__NAMESPACE__;
    public $module_name='user'; 
}
