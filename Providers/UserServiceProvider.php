<?php

namespace Modules\User\Providers;

//---- bases ----
use Modules\Xot\Providers\XotBaseServiceProvider;

class UserServiceProvider extends XotBaseServiceProvider {
    protected $module_dir = __DIR__;
    protected $module_ns = __NAMESPACE__;
    public $module_name = 'user';
}
