<?php

namespace RedisAnalizer\Dto;

/**
 * @author Stefano Perrini <perrini.stefano@gmail.com>
 */
class ClientsDto implements \Stringable
{
    private readonly int $connectedClients;
    private readonly int $clusterConnections;
    private readonly int $maxclients;
    private readonly int $clientRecentMaxInputBuffer;
    private readonly int $clientRecentMaxOutputBuffer;
    private readonly int $blockedClients;
    private readonly int $trackingClients;
    private readonly int $clientsInTimeoutTable;
    private readonly int $totalBlockingKeys;
    private readonly int $totalBlockingKeysOnNokey;

    public function __unserialize(array $data): void
    {
        $this->connectedClients = (int) ($data['Clients']['connected_clients'] ?? 0);
        $this->clusterConnections = (int) ($data['Clients']['cluster_connections'] ?? 0);
        $this->maxclients = (int) ($data['Clients']['maxclients'] ?? 0);
        $this->clientRecentMaxInputBuffer = (int) ($data['Clients']['client_recent_max_input_buffer'] ?? 0);
        $this->clientRecentMaxOutputBuffer = (int) ($data['Clients']['client_recent_max_output_buffer'] ?? 0);
        $this->blockedClients = (int) ($data['Clients']['blocked_clients'] ?? 0);
        $this->trackingClients = (int) ($data['Clients']['tracking_clients'] ?? 0);
        $this->clientsInTimeoutTable = (int) ($data['Clients']['clients_in_timeout_table'] ?? 0);
        $this->totalBlockingKeys = (int) ($data['Clients']['total_blocking_keys'] ?? 0);
        $this->totalBlockingKeysOnNokey = (int) ($data['Clients']['total_blocking_keys_on_nokey'] ?? 0);
    }

    public function getConnectedClients(): int
    {
        return $this->connectedClients;
    }

    public function getClusterConnections(): int
    {
        return $this->clusterConnections;
    }

    public function getMaxclients(): int
    {
        return $this->maxclients;
    }

    public function getClientRecentMaxInputBuffer(): int
    {
        return $this->clientRecentMaxInputBuffer;
    }

    public function getClientRecentMaxOutputBuffer(): int
    {
        return $this->clientRecentMaxOutputBuffer;
    }

    public function getBlockedClients(): int
    {
        return $this->blockedClients;
    }

    public function getTrackingClients(): int
    {
        return $this->trackingClients;
    }

    public function getClientsInTimeoutTable(): int
    {
        return $this->clientsInTimeoutTable;
    }

    public function getTotalBlockingKeys(): int
    {
        return $this->totalBlockingKeys;
    }

    public function getTotalBlockingKeysOnNokey(): int
    {
        return $this->totalBlockingKeysOnNokey;
    }

    public function getClientUsagePercentage(): float
    {
        return $this->maxclients > 0 ? ($this->connectedClients / $this->maxclients) * 100 : 0;
    }

    public function __toString(): string
    {
        return sprintf(
            'Clients: %d/%d (%.2f%%), Blocked: %d, Tracking: %d',
            $this->connectedClients,
            $this->maxclients,
            $this->getClientUsagePercentage(),
            $this->blockedClients,
            $this->trackingClients
        );
    }
}
