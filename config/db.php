<?php

$Mysql_Command = 'app\components\system\DbCommand';
return [

    'db' => [
        'class'       => 'yii\db\Connection',
        'dsn'         => $scm_config['triangel.db.dsn'],
        'username'    => $scm_config['triangel.db.username'],
        'password'    => $scm_config['triangel.db.password'],
        'charset'     => 'utf8',
        'commandClass' => $Mysql_Command
    ]


    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
