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
     * @return string
     */
    public function agent()
    {
        $agent = new Agent();

        if ($agent->isMobile()) {
          return 'mobile';
        } else if ($agent->isTablet()) {
          dd('tablet');
        } else {
          return 'desktop';
        }
    }
}