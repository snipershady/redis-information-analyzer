<?php

namespace RedisAnalizer\Dto;

/**
 * @author Stefano Perrini <perrini.stefano@gmail.com>
 */
class ReplicationDto implements \Stringable
{
    private readonly string $role;
    private readonly int $connectedSlaves;
    private readonly ?string $masterHost;
    private readonly ?int $masterPort;
    private readonly ?string $masterLinkStatus;
    private readonly ?int $masterLastIoSecondsAgo;
    private readonly ?int $masterSyncInProgress;
    private readonly int $slaveReadOnly;
    private readonly int $slaveReplOffset;
    private readonly int $slavePriority;
    private readonly int $replBacklogActive;
    private readonly int $replBacklogSize;
    private readonly int $replBacklogFirstByteOffset;
    private readonly int $replBacklogHistlen;
    private readonly int $masterReplOffset;
    private readonly int $secondReplOffset;

    public function __unserialize(array $data): void
    {
        $this->role = $data['Replication']['role'] ?? 'unknown';
        $this->connectedSlaves = (int) ($data['Replication']['connected_slaves'] ?? 0);
        $this->masterHost = $data['Replication']['master_host'] ?? null;
        $this->masterPort = isset($data['Replication']['master_port']) ? (int) $data['Replication']['master_port'] : null;
        $this->masterLinkStatus = $data['Replication']['master_link_status'] ?? null;
        $this->masterLastIoSecondsAgo = isset($data['Replication']['master_last_io_seconds_ago']) ? (int) $data['Replication']['master_last_io_seconds_ago'] : null;
        $this->masterSyncInProgress = isset($data['Replication']['master_sync_in_progress']) ? (int) $data['Replication']['master_sync_in_progress'] : null;
        $this->slaveReadOnly = (int) ($data['Replication']['slave_read_only'] ?? 0);
        $this->slaveReplOffset = (int) ($data['Replication']['slave_repl_offset'] ?? 0);
        $this->slavePriority = (int) ($data['Replication']['slave_priority'] ?? 100);
        $this->replBacklogActive = (int) ($data['Replication']['repl_backlog_active'] ?? 0);
        $this->replBacklogSize = (int) ($data['Replication']['repl_backlog_size'] ?? 0);
        $this->replBacklogFirstByteOffset = (int) ($data['Replication']['repl_backlog_first_byte_offset'] ?? 0);
        $this->replBacklogHistlen = (int) ($data['Replication']['repl_backlog_histlen'] ?? 0);
        $this->masterReplOffset = (int) ($data['Replication']['master_repl_offset'] ?? 0);
        $this->secondReplOffset = (int) ($data['Replication']['second_repl_offset'] ?? -1);
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getConnectedSlaves(): int
    {
        return $this->connectedSlaves;
    }

    public function getMasterHost(): ?string
    {
        return $this->masterHost;
    }

    public function getMasterPort(): ?int
    {
        return $this->masterPort;
    }

    public function getMasterLinkStatus(): ?string
    {
        return $this->masterLinkStatus;
    }

    public function getMasterLastIoSecondsAgo(): ?int
    {
        return $this->masterLastIoSecondsAgo;
    }

    public function getMasterSyncInProgress(): ?int
    {
        return $this->masterSyncInProgress;
    }

    public function getSlaveReadOnly(): int
    {
        return $this->slaveReadOnly;
    }

    public function getSlaveReplOffset(): int
    {
        return $this->slaveReplOffset;
    }

    public function getSlavePriority(): int
    {
        return $this->slavePriority;
    }

    public function getReplBacklogActive(): int
    {
        return $this->replBacklogActive;
    }

    public function getReplBacklogSize(): int
    {
        return $this->replBacklogSize;
    }

    public function getReplBacklogFirstByteOffset(): int
    {
        return $this->replBacklogFirstByteOffset;
    }

    public function getReplBacklogHistlen(): int
    {
        return $this->replBacklogHistlen;
    }

    public function getMasterReplOffset(): int
    {
        return $this->masterReplOffset;
    }

    public function getSecondReplOffset(): int
    {
        return $this->secondReplOffset;
    }

    public function isMaster(): bool
    {
        return 'master' === $this->role;
    }

    public function isSlave(): bool
    {
        return 'slave' === $this->role;
    }

    public function isReplicaConnected(): bool
    {
        return 'up' === $this->masterLinkStatus;
    }

    public function __toString(): string
    {
        if ($this->isMaster()) {
            return sprintf(
                'Replication: Master with %d slaves, Offset: %d',
                $this->connectedSlaves,
                $this->masterReplOffset
            );
        }

        return sprintf(
            'Replication: Slave of %s:%d, Link: %s',
            $this->masterHost ?? 'unknown',
            $this->masterPort ?? 0,
            $this->masterLinkStatus ?? 'unknown'
        );
    }
}
