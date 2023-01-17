<?php

defined( 'ABSPATH' ) || die( "Can't access directly" );

Class DisabledApi
{
    public function __construct()
    {
        add_action( 'rest_api_init', [$this, 'restrict_access_API'], 0 );
    }

    private function white_list_IP()
    {
        $white_list_IP = [
            '127.0.0.1',
            "::1"
        ];

        return $white_list_IP;
    }


    public function restrict_access_API()
    {
        $white_list_IP = $this->white_list_IP();
        if( ! in_array($_SERVER['REMOTE_ADDR'], $white_list_IP ) ) die( 'REST API is Disabled.' ); 
    }
}

new DisabledApi();