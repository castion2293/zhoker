<?php

namespace App\Services;

use Jenssegers\Agent\Agent;

class AgentService
{

    /**
     * AgentService constructor.
     * @param 
     */
    public function __construct()
    {
        
    }

    /**
     * AgentService Agent().
     * @param 
     */
    public function agent()
    {
        $agent = new Agent();

        if ($agent->isMobile()) {
          dd("mobile"); 
        } else {
          return 'desktop.index';
        }
    }
}