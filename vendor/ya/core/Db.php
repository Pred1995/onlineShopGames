<?php


namespace ya;


class Db
{
    use TSingletone;

    protected function __construct()
    {
        $db = require_once CONF . '/config_db.php';
        class_alias('\RedBeanPHP\R', '\R');
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        if(!\R::testConnection()) {
            throw new \Exception('ВУэй Саединений нета', 500);
        }
        \R::freeze(true);
        if(DEBUG) {
            \R::debug(true, 1);
        }

        \R::ext('xdispense', function( $type ){
            return \R::getRedBean()->dispense( $type );
        });
    }


}