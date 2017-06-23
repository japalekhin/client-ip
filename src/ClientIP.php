<?php

namespace Alekhin\ClientIP;

class ClientIP {

    static $ip = NULL;

    static function get_client_ip() {
        if (!is_null(self::$ip)) {
            return self::$ip;
        }

        if (!is_null(filter_input(INPUT_SERVER, 'HTTP_X_FORWARDED_FOR'))) {
            self::$ip = filter_input(INPUT_SERVER, 'HTTP_X_FORWARDED_FOR');
            return self::$ip;
        }

        if (!is_null(filter_input(INPUT_SERVER, 'HTTP_CLIENT_IP'))) {
            self::$ip = filter_input(INPUT_SERVER, 'HTTP_CLIENT_IP');
            return self::$ip;
        }

        if (!is_null(filter_input(INPUT_SERVER, 'REMOTE_ADDR'))) {
            self::$ip = filter_input(INPUT_SERVER, 'REMOTE_ADDR');
            return self::$ip;
        }

        return NULL;
    }

}
