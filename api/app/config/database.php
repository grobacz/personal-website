<?php

/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */

declare(strict_types=1);

use Spiral\Database\Driver;

return [
    'default' => 'default',
    'databases' => [
        'default' => ['driver' => 'runtime'],
    ],
    'drivers' => [
        'runtime' => [
            'driver' => Driver\Postgres\PostgresDriver::class,
            'connection' => 'pgsql:host=db;dbname=api',
            'username' => 'api',
            'password' => file_get_contents('/run/secrets/POSTGRESS_PASSWORD'),
        ],
    ]
];
