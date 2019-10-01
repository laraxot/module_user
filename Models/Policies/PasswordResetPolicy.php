<?php
namespace Modules\User\Models\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\LU\Models\User as User;
use Modules\User\Models\PasswordReset as Post; 

use Modules\Xot\Models\Policies\XotBasePolicy;

class PasswordResetPolicy extends XotBasePolicy {
}
