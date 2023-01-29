<?php 

namespace App\Traits;

use App\Models\Log;

trait Logging
{
    protected function insertLog($user_id, $action, $uri)
    {
        $log = new Log();
        $log->user_id = $user_id;
        $log->action = $action;
        $log->uri = $uri;
        $log->save();
        return;
    }
}