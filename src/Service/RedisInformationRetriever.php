<?php

namespace RedisAnalizer\Service;

use Predis\Client;
use RedisAnalizer\Dto\ClientsDto;
use RedisAnalizer\Dto\CpuDto;
use RedisAnalizer\Dto\KeyspaceDto;
use RedisAnalizer\Dto\MemoryDto;
use RedisAnalizer\Dto\PersistenceDto;
use RedisAnalizer\Dto\RedisClientInfo;
use RedisAnalizer\Dto\ReplicationDto;
use RedisAnalizer\Dto\ServerDto;
use RedisAnalizer\Dto\StatsDto;

/**
 * Description of RedisInformationRetriever.
 *
 * @author Stefano Perrini <perrini.stefano@gmail.com> aka La Matrigna
 */
class RedisInformationRetriever
{
    private readonly Client $client;
    private array $allClients;
    private ?int $numberOfConnection = null;

    public function __construct()
    {
        $this->client = RedisConnection::getInstance()->getClient();
        $this->init();
    }

    private function init(): void
    {
        $clientList = $this->client->client('LIST');
        $this->allClients = [];
        foreach ($clientList as $singleClient) {
            $redisClientInfo = new RedisClientInfo();
            $redisClientInfo->__unserialize($singleClient);
            $this->allClients[] = $redisClientInfo;
        }

        $this->numberOfConnection = count($this->allClients);
    }

    public function getClientList(): array
    {
        return $this->allClients;
    }

    public function getNumberOfConnection(): int
    {
        return $this->numberOfConnection;
    }

    public function getInfo(): array
    {
        return $this->client->info();
    }

    public function getServerInfo(): ServerDto
    {
        $info = $this->client->info('server');
        // var_dump($info); exit;
        $serverDto = new ServerDto();
        $serverDto->__unserialize($info);

        return $serverDto;
    }

    public function getMemoryInfo(): MemoryDto
    {
        $info = $this->client->info('memory');
        $memoryDto = new MemoryDto();
        $memoryDto->__unserialize($info);

        return $memoryDto;
    }

    public function getStatsInfo(): StatsDto
    {
        $info = $this->client->info('stats');
        $statsDto = new StatsDto();
        $statsDto->__unserialize($info);

        return $statsDto;
    }

    public function getCpuInfo(): CpuDto
    {
        $info = $this->client->info('cpu');
        $cpuDto = new CpuDto();
        $cpuDto->__unserialize($info);

        return $cpuDto;
    }

    public function getClientsInfo(): ClientsDto
    {
        $info = $this->client->info('clients');
        $clientsDto = new ClientsDto();
        $clientsDto->__unserialize($info);

        return $clientsDto;
    }

    public function getKeyspaceInfo(): KeyspaceDto
    {
        $info = $this->client->info('keyspace');
        // var_dump($info); exit;
        $keyspaceDto = new KeyspaceDto();
        $keyspaceDto->__unserialize($info);

        return $keyspaceDto;
    }

    public function getReplicationInfo(): ReplicationDto
    {
        $info = $this->client->info('replication');
        $replicationDto = new ReplicationDto();
        $replicationDto->__unserialize($info);

        return $replicationDto;
    }

    public function getPersistenceInfo(): PersistenceDto
    {
        $info = $this->client->info('persistence');
        $persistenceDto = new PersistenceDto();
        $persistenceDto->__unserialize($info);

        return $persistenceDto;
    }

    public function getAllInfo(): array
    {
        return [
            'server' => $this->getServerInfo(),
            'memory' => $this->getMemoryInfo(),
            'stats' => $this->getStatsInfo(),
            'cpu' => $this->getCpuInfo(),
            'clients' => $this->getClientsInfo(),
            'keyspace' => $this->getKeyspaceInfo(),
            'replication' => $this->getReplicationInfo(),
            'persistence' => $this->getPersistenceInfo(),
        ];
    }
}
