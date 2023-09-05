<?php

namespace App\Commands;

use Illuminate\Contracts\Bus\SelfHandling;

class GetUserActionPermission extends Command implements SelfHandling
{
    protected $user;

    protected $code;

    /**
     * Create a new command instance.
     */
    public function __construct($user, $code)
    {
        $this->user = $user;
        $this->code = $code;
    }

    /**
     * Execute the command.
     *
     * @return bool
     */
    public function handle()
    {

        if ($this->user == null || $this->user->role == null) {
            return false;
        }

        $actions = $this->user->role->actions;
        $permitted = 0;

        foreach ($actions as $action) {
            if ($this->code == $action->code) {
                //if found get the permission and stop the finding
                $permitted = $action->pivot->permitted;
                break;
            }
        }

        return $permitted == 1;
    }
}
