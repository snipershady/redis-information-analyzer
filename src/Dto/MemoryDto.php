<?php

namespace RedisAnalizer\Dto;

/**
 * @author Stefano Perrini <perrini.stefano@gmail.com>
 */
class MemoryDto implements \Stringable
{
    private readonly int $usedMemory;
    private readonly string $usedMemoryHuman;
    private readonly int $usedMemoryRss;
    private readonly string $usedMemoryRssHuman;
    private readonly int $usedMemoryPeak;
    private readonly string $usedMemoryPeakHuman;
    private readonly int $usedMemoryPeakPerc;
    private readonly int $usedMemoryOverhead;
    private readonly int $usedMemoryStartup;
    private readonly int $usedMemoryDataset;
    private readonly string $usedMemoryDatasetPerc;
    private readonly string $allocatorAllocated;
    private readonly string $allocatorActive;
    private readonly string $allocatorResident;
    private readonly float $allocatorFragRatio;
    private readonly int $allocatorFragBytes;
    private readonly float $allocatorRssRatio;
    private readonly int $allocatorRssBytes;
    private readonly float $rssOverheadRatio;
    private readonly int $rssOverheadBytes;
    private readonly float $memFragmentationRatio;
    private readonly int $memFragmentationBytes;
    private readonly int $memNotCountedForEvict;
    private readonly int $memReplicationBacklog;
    private readonly int $memClientsSlaves;
    private readonly int $memClientsNormal;
    private readonly int $memClusterLinks;
    private readonly int $memAofBuffer;
    private readonly string $memAllocator;
    private readonly int $activeDefragRunning;
    private readonly int $lazyfreeePendingObjects;
    private readonly int $lazyfreeeableObjects;

    public function __unserialize(array $data): void
    {
        $this->usedMemory = (int) ($data['Memory']['used_memory'] ?? 0);
        $this->usedMemoryHuman = $data['Memory']['used_memory_human'] ?? '';
        $this->usedMemoryRss = (int) ($data['Memory']['used_memory_rss'] ?? 0);
        $this->usedMemoryRssHuman = $data['Memory']['used_memory_rss_human'] ?? '';
        $this->usedMemoryPeak = (int) ($data['Memory']['used_memory_peak'] ?? 0);
        $this->usedMemoryPeakHuman = $data['Memory']['used_memory_peak_human'] ?? '';
        $this->usedMemoryPeakPerc = (int) ($data['Memory']['used_memory_peak_perc'] ?? 0);
        $this->usedMemoryOverhead = (int) ($data['Memory']['used_memory_overhead'] ?? 0);
        $this->usedMemoryStartup = (int) ($data['Memory']['used_memory_startup'] ?? 0);
        $this->usedMemoryDataset = (int) ($data['Memory']['used_memory_dataset'] ?? 0);
        $this->usedMemoryDatasetPerc = $data['Memory']['used_memory_dataset_perc'] ?? '';
        $this->allocatorAllocated = $data['Memory']['allocator_allocated'] ?? '';
        $this->allocatorActive = $data['Memory']['allocator_active'] ?? '';
        $this->allocatorResident = $data['Memory']['allocator_resident'] ?? '';
        $this->allocatorFragRatio = (float) ($data['Memory']['allocator_frag_ratio'] ?? 0);
        $this->allocatorFragBytes = (int) ($data['Memory']['allocator_frag_bytes'] ?? 0);
        $this->allocatorRssRatio = (float) ($data['Memory']['allocator_rss_ratio'] ?? 0);
        $this->allocatorRssBytes = (int) ($data['Memory']['allocator_rss_bytes'] ?? 0);
        $this->rssOverheadRatio = (float) ($data['Memory']['rss_overhead_ratio'] ?? 0);
        $this->rssOverheadBytes = (int) ($data['Memory']['rss_overhead_bytes'] ?? 0);
        $this->memFragmentationRatio = (float) ($data['Memory']['mem_fragmentation_ratio'] ?? 0);
        $this->memFragmentationBytes = (int) ($data['Memory']['mem_fragmentation_bytes'] ?? 0);
        $this->memNotCountedForEvict = (int) ($data['Memory']['mem_not_counted_for_evict'] ?? 0);
        $this->memReplicationBacklog = (int) ($data['Memory']['mem_replication_backlog'] ?? 0);
        $this->memClientsSlaves = (int) ($data['Memory']['mem_clients_slaves'] ?? 0);
        $this->memClientsNormal = (int) ($data['Memory']['mem_clients_normal'] ?? 0);
        $this->memClusterLinks = (int) ($data['Memory']['mem_cluster_links'] ?? 0);
        $this->memAofBuffer = (int) ($data['Memory']['mem_aof_buffer'] ?? 0);
        $this->memAllocator = $data['Memory']['mem_allocator'] ?? '';
        $this->activeDefragRunning = (int) ($data['Memory']['active_defrag_running'] ?? 0);
        $this->lazyfreeePendingObjects = (int) ($data['Memory']['lazyfree_pending_objects'] ?? 0);
        $this->lazyfreeeableObjects = (int) ($data['Memory']['lazyfreeable_objects'] ?? 0);
    }

    public function getUsedMemory(): int
    {
        return $this->usedMemory;
    }

    public function getUsedMemoryHuman(): string
    {
        return $this->usedMemoryHuman;
    }

    public function getUsedMemoryRss(): int
    {
        return $this->usedMemoryRss;
    }

    public function getUsedMemoryRssHuman(): string
    {
        return $this->usedMemoryRssHuman;
    }

    public function getUsedMemoryPeak(): int
    {
        return $this->usedMemoryPeak;
    }

    public function getUsedMemoryPeakHuman(): string
    {
        return $this->usedMemoryPeakHuman;
    }

    public function getUsedMemoryPeakPerc(): int
    {
        return $this->usedMemoryPeakPerc;
    }

    public function getUsedMemoryOverhead(): int
    {
        return $this->usedMemoryOverhead;
    }

    public function getUsedMemoryStartup(): int
    {
        return $this->usedMemoryStartup;
    }

    public function getUsedMemoryDataset(): int
    {
        return $this->usedMemoryDataset;
    }

    public function getUsedMemoryDatasetPerc(): string
    {
        return $this->usedMemoryDatasetPerc;
    }

    public function getAllocatorAllocated(): string
    {
        return $this->allocatorAllocated;
    }

    public function getAllocatorActive(): string
    {
        return $this->allocatorActive;
    }

    public function getAllocatorResident(): string
    {
        return $this->allocatorResident;
    }

    public function getAllocatorFragRatio(): float
    {
        return $this->allocatorFragRatio;
    }

    public function getAllocatorFragBytes(): int
    {
        return $this->allocatorFragBytes;
    }

    public function getAllocatorRssRatio(): float
    {
        return $this->allocatorRssRatio;
    }

    public function getAllocatorRssBytes(): int
    {
        return $this->allocatorRssBytes;
    }

    public function getRssOverheadRatio(): float
    {
        return $this->rssOverheadRatio;
    }

    public function getRssOverheadBytes(): int
    {
        return $this->rssOverheadBytes;
    }

    public function getMemFragmentationRatio(): float
    {
        return $this->memFragmentationRatio;
    }

    public function getMemFragmentationBytes(): int
    {
        return $this->memFragmentationBytes;
    }

    public function getMemNotCountedForEvict(): int
    {
        return $this->memNotCountedForEvict;
    }

    public function getMemReplicationBacklog(): int
    {
        return $this->memReplicationBacklog;
    }

    public function getMemClientsSlaves(): int
    {
        return $this->memClientsSlaves;
    }

    public function getMemClientsNormal(): int
    {
        return $this->memClientsNormal;
    }

    public function getMemClusterLinks(): int
    {
        return $this->memClusterLinks;
    }

    public function getMemAofBuffer(): int
    {
        return $this->memAofBuffer;
    }

    public function getMemAllocator(): string
    {
        return $this->memAllocator;
    }

    public function getActiveDefragRunning(): int
    {
        return $this->activeDefragRunning;
    }

    public function getLazyfreeePendingObjects(): int
    {
        return $this->lazyfreeePendingObjects;
    }

    public function getLazyfreeeableObjects(): int
    {
        return $this->lazyfreeeableObjects;
    }

    public function isFragmented(): bool
    {
        return $this->memFragmentationRatio > 1.5;
    }

    public function __toString(): string
    {
        return sprintf(
            'Memory: %s (RSS: %s), Peak: %s, Fragmentation: %.2f',
            $this->usedMemoryHuman,
            $this->usedMemoryRssHuman,
            $this->usedMemoryPeakHuman,
            $this->memFragmentationRatio
        );
    }
}
