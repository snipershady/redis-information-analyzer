<?php

namespace RedisAnalizer\Dto;

/**
 * @author Stefano Perrini <perrini.stefano@gmail.com>
 */
class StatsDto implements \Stringable
{
    private readonly int $totalConnectionsReceived;
    private readonly int $totalCommandsProcessed;
    private readonly float $instantaneousOpsPerSec;
    private readonly int $totalNetInputBytes;
    private readonly int $totalNetOutputBytes;
    private readonly float $instantaneousInputKbps;
    private readonly float $instantaneousOutputKbps;
    private readonly int $rejectedConnections;
    private readonly int $syncFull;
    private readonly int $syncPartialOk;
    private readonly int $syncPartialErr;
    private readonly int $expiredKeys;
    private readonly float $expiredStalePerc;
    private readonly int $expiredTimeCapReachedCount;
    private readonly int $expireeCycleCpuMilliseconds;
    private readonly int $evictedKeys;
    private readonly int $evictedClients;
    private readonly int $totalEvictionExceededTime;
    private readonly int $currentEvictionExceededTime;
    private readonly int $keyspaceHits;
    private readonly int $keyspaceMisses;
    private readonly int $pubsubChannels;
    private readonly int $pubsubPatterns;
    private readonly int $pubsubShardChannels;
    private readonly int $latestForkUsec;
    private readonly int $totalForksss;
    private readonly int $migrateCachedSockets;
    private readonly int $slaveExpiresTrackedKeys;
    private readonly int $activeDefragHits;
    private readonly int $activeDefragMisses;
    private readonly int $activeDefragKeyHits;
    private readonly int $activeDefragKeyMisses;
    private readonly int $totalActiveDefragTime;
    private readonly int $currentActiveDefragTime;
    private readonly int $trackingTotalKeys;
    private readonly int $trackingTotalItems;
    private readonly int $trackingTotalPrefixes;
    private readonly int $unexpectedErrorReplies;
    private readonly int $totalErrorReplies;
    private readonly int $dumpPayloadSanitizations;
    private readonly int $totalReadsProcessed;
    private readonly int $totalWritesProcessed;
    private readonly int $ioThreadedReadsProcessed;
    private readonly int $ioThreadedWritesProcessed;
    private readonly int $replyBufferShrinks;
    private readonly int $replyBufferExpands;

    public function __unserialize(array $data): void
    {
        $this->totalConnectionsReceived = (int) ($data['Stats']['total_connections_received'] ?? 0);
        $this->totalCommandsProcessed = (int) ($data['Stats']['total_commands_processed'] ?? 0);
        $this->instantaneousOpsPerSec = (float) ($data['Stats']['instantaneous_ops_per_sec'] ?? 0);
        $this->totalNetInputBytes = (int) ($data['Stats']['total_net_input_bytes'] ?? 0);
        $this->totalNetOutputBytes = (int) ($data['Stats']['total_net_output_bytes'] ?? 0);
        $this->instantaneousInputKbps = (float) ($data['Stats']['instantaneous_input_kbps'] ?? 0);
        $this->instantaneousOutputKbps = (float) ($data['Stats']['instantaneous_output_kbps'] ?? 0);
        $this->rejectedConnections = (int) ($data['Stats']['rejected_connections'] ?? 0);
        $this->syncFull = (int) ($data['Stats']['sync_full'] ?? 0);
        $this->syncPartialOk = (int) ($data['Stats']['sync_partial_ok'] ?? 0);
        $this->syncPartialErr = (int) ($data['Stats']['sync_partial_err'] ?? 0);
        $this->expiredKeys = (int) ($data['Stats']['expired_keys'] ?? 0);
        $this->expiredStalePerc = (float) ($data['Stats']['expired_stale_perc'] ?? 0);
        $this->expiredTimeCapReachedCount = (int) ($data['Stats']['expired_time_cap_reached_count'] ?? 0);
        $this->expireeCycleCpuMilliseconds = (int) ($data['Stats']['expire_cycle_cpu_milliseconds'] ?? 0);
        $this->evictedKeys = (int) ($data['Stats']['evicted_keys'] ?? 0);
        $this->evictedClients = (int) ($data['Stats']['evicted_clients'] ?? 0);
        $this->totalEvictionExceededTime = (int) ($data['Stats']['total_eviction_exceeded_time'] ?? 0);
        $this->currentEvictionExceededTime = (int) ($data['Stats']['current_eviction_exceeded_time'] ?? 0);
        $this->keyspaceHits = (int) ($data['Stats']['keyspace_hits'] ?? 0);
        $this->keyspaceMisses = (int) ($data['Stats']['keyspace_misses'] ?? 0);
        $this->pubsubChannels = (int) ($data['Stats']['pubsub_channels'] ?? 0);
        $this->pubsubPatterns = (int) ($data['Stats']['pubsub_patterns'] ?? 0);
        $this->pubsubShardChannels = (int) ($data['Stats']['pubsub_shard_channels'] ?? 0);
        $this->latestForkUsec = (int) ($data['Stats']['latest_fork_usec'] ?? 0);
        $this->totalForksss = (int) ($data['Stats']['total_forks'] ?? 0);
        $this->migrateCachedSockets = (int) ($data['Stats']['migrate_cached_sockets'] ?? 0);
        $this->slaveExpiresTrackedKeys = (int) ($data['Stats']['slave_expires_tracked_keys'] ?? 0);
        $this->activeDefragHits = (int) ($data['Stats']['active_defrag_hits'] ?? 0);
        $this->activeDefragMisses = (int) ($data['Stats']['active_defrag_misses'] ?? 0);
        $this->activeDefragKeyHits = (int) ($data['Stats']['active_defrag_key_hits'] ?? 0);
        $this->activeDefragKeyMisses = (int) ($data['Stats']['active_defrag_key_misses'] ?? 0);
        $this->totalActiveDefragTime = (int) ($data['Stats']['total_active_defrag_time'] ?? 0);
        $this->currentActiveDefragTime = (int) ($data['Stats']['current_active_defrag_time'] ?? 0);
        $this->trackingTotalKeys = (int) ($data['Stats']['tracking_total_keys'] ?? 0);
        $this->trackingTotalItems = (int) ($data['Stats']['tracking_total_items'] ?? 0);
        $this->trackingTotalPrefixes = (int) ($data['Stats']['tracking_total_prefixes'] ?? 0);
        $this->unexpectedErrorReplies = (int) ($data['Stats']['unexpected_error_replies'] ?? 0);
        $this->totalErrorReplies = (int) ($data['Stats']['total_error_replies'] ?? 0);
        $this->dumpPayloadSanitizations = (int) ($data['Stats']['dump_payload_sanitizations'] ?? 0);
        $this->totalReadsProcessed = (int) ($data['Stats']['total_reads_processed'] ?? 0);
        $this->totalWritesProcessed = (int) ($data['Stats']['total_writes_processed'] ?? 0);
        $this->ioThreadedReadsProcessed = (int) ($data['Stats']['io_threaded_reads_processed'] ?? 0);
        $this->ioThreadedWritesProcessed = (int) ($data['Stats']['io_threaded_writes_processed'] ?? 0);
        $this->replyBufferShrinks = (int) ($data['Stats']['reply_buffer_shrinks'] ?? 0);
        $this->replyBufferExpands = (int) ($data['Stats']['reply_buffer_expands'] ?? 0);
    }

    public function getTotalConnectionsReceived(): int
    {
        return $this->totalConnectionsReceived;
    }

    public function getTotalCommandsProcessed(): int
    {
        return $this->totalCommandsProcessed;
    }

    public function getInstantaneousOpsPerSec(): float
    {
        return $this->instantaneousOpsPerSec;
    }

    public function getTotalNetInputBytes(): int
    {
        return $this->totalNetInputBytes;
    }

    public function getTotalNetOutputBytes(): int
    {
        return $this->totalNetOutputBytes;
    }

    public function getInstantaneousInputKbps(): float
    {
        return $this->instantaneousInputKbps;
    }

    public function getInstantaneousOutputKbps(): float
    {
        return $this->instantaneousOutputKbps;
    }

    public function getRejectedConnections(): int
    {
        return $this->rejectedConnections;
    }

    public function getSyncFull(): int
    {
        return $this->syncFull;
    }

    public function getSyncPartialOk(): int
    {
        return $this->syncPartialOk;
    }

    public function getSyncPartialErr(): int
    {
        return $this->syncPartialErr;
    }

    public function getExpiredKeys(): int
    {
        return $this->expiredKeys;
    }

    public function getExpiredStalePerc(): float
    {
        return $this->expiredStalePerc;
    }

    public function getExpiredTimeCapReachedCount(): int
    {
        return $this->expiredTimeCapReachedCount;
    }

    public function getExpireeCycleCpuMilliseconds(): int
    {
        return $this->expireeCycleCpuMilliseconds;
    }

    public function getEvictedKeys(): int
    {
        return $this->evictedKeys;
    }

    public function getEvictedClients(): int
    {
        return $this->evictedClients;
    }

    public function getTotalEvictionExceededTime(): int
    {
        return $this->totalEvictionExceededTime;
    }

    public function getCurrentEvictionExceededTime(): int
    {
        return $this->currentEvictionExceededTime;
    }

    public function getKeyspaceHits(): int
    {
        return $this->keyspaceHits;
    }

    public function getKeyspaceMisses(): int
    {
        return $this->keyspaceMisses;
    }

    public function getPubsubChannels(): int
    {
        return $this->pubsubChannels;
    }

    public function getPubsubPatterns(): int
    {
        return $this->pubsubPatterns;
    }

    public function getPubsubShardChannels(): int
    {
        return $this->pubsubShardChannels;
    }

    public function getLatestForkUsec(): int
    {
        return $this->latestForkUsec;
    }

    public function getTotalForksss(): int
    {
        return $this->totalForksss;
    }

    public function getMigrateCachedSockets(): int
    {
        return $this->migrateCachedSockets;
    }

    public function getSlaveExpiresTrackedKeys(): int
    {
        return $this->slaveExpiresTrackedKeys;
    }

    public function getActiveDefragHits(): int
    {
        return $this->activeDefragHits;
    }

    public function getActiveDefragMisses(): int
    {
        return $this->activeDefragMisses;
    }

    public function getActiveDefragKeyHits(): int
    {
        return $this->activeDefragKeyHits;
    }

    public function getActiveDefragKeyMisses(): int
    {
        return $this->activeDefragKeyMisses;
    }

    public function getTotalActiveDefragTime(): int
    {
        return $this->totalActiveDefragTime;
    }

    public function getCurrentActiveDefragTime(): int
    {
        return $this->currentActiveDefragTime;
    }

    public function getTrackingTotalKeys(): int
    {
        return $this->trackingTotalKeys;
    }

    public function getTrackingTotalItems(): int
    {
        return $this->trackingTotalItems;
    }

    public function getTrackingTotalPrefixes(): int
    {
        return $this->trackingTotalPrefixes;
    }

    public function getUnexpectedErrorReplies(): int
    {
        return $this->unexpectedErrorReplies;
    }

    public function getTotalErrorReplies(): int
    {
        return $this->totalErrorReplies;
    }

    public function getDumpPayloadSanitizations(): int
    {
        return $this->dumpPayloadSanitizations;
    }

    public function getTotalReadsProcessed(): int
    {
        return $this->totalReadsProcessed;
    }

    public function getTotalWritesProcessed(): int
    {
        return $this->totalWritesProcessed;
    }

    public function getIoThreadedReadsProcessed(): int
    {
        return $this->ioThreadedReadsProcessed;
    }

    public function getIoThreadedWritesProcessed(): int
    {
        return $this->ioThreadedWritesProcessed;
    }

    public function getReplyBufferShrinks(): int
    {
        return $this->replyBufferShrinks;
    }

    public function getReplyBufferExpands(): int
    {
        return $this->replyBufferExpands;
    }

    public function getHitRate(): float
    {
        $total = $this->keyspaceHits + $this->keyspaceMisses;

        return $total > 0 ? ($this->keyspaceHits / $total) * 100 : 0;
    }

    public function __toString(): string
    {
        return sprintf(
            'Stats: %d commands, %.2f ops/sec, Hit rate: %.2f%%, Connections: %d',
            $this->totalCommandsProcessed,
            $this->instantaneousOpsPerSec,
            $this->getHitRate(),
            $this->totalConnectionsReceived
        );
    }
}
