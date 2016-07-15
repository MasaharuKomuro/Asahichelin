<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(
    'default' => array(
        'type' => 'pdo',
        'connection' => array(
            'dsn' => 'mysql:host=localhost;dbname=asahichelin;charset=utf8;unix_socket=/tmp/mysql.sock',
            'username' => 'www-server',
            'password' => 'pass',
            'persistent' => false,
            'compress' => false,
        ),
        'identifier' => '`',
        'table_prefix' => '',
        'charset' => 'utf8',
        'enable_cache' => true,
        'profiling' => false,
    ),
);
