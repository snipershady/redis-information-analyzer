<?php

namespace RedisAnalizer\Service;

use Predis\Client;

/**
 * Description of RedisConnection.
 *
 * @author Stefano Perrini <perrini.stefano@gmail.com> aka La Matrigna
 */
class RedisConnection
{
    private readonly ?Client $client;
    private static ?RedisConnection $redisConnection = null;

    private function __construct(string $server = 'redis-server', int $port = 6379, string $connectionIdentifier = 'redis-analyzer-predis01', bool $isPersistent = true)
    {
        $this->client = new Client([
            'scheme' => 'tcp',
            'host' => $server,
            'port' => $port,
            'persistent' => $isPersistent,
            'conn_uid' => $connectionIdentifier,
        ], [
            'parameters' => [
                'client_name' => $connectionIdentifier,
            ],
        ]);
    }

    /**
     * <p>Returns a Singleton Instance of class implementation. RedisConnection</p>.
     *
     * @returns RedisConnection
     */
    public static function getInstance(): RedisConnection
    {
        if (null === self::$redisConnection) {
            self::$redisConnection = new RedisConnection();
        }

        return self::$redisConnection;
    }

    /**
     * <p>Returns Predis Client</p>.
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}
