<?php

namespace RedisAnalizer\Dto;

/**
 * @author Stefano Perrini <perrini.stefano@gmail.com>
 */
class PersistenceDto implements \Stringable
{
    private readonly int $loading;
    private readonly int $asyncLoading;
    private readonly int $currentCowSize;
    private readonly int $currentCowSizeAge;
    private readonly int $currentForkPerc;
    private readonly int $currentSaveKeysProcessed;
    private readonly int $currentSaveKeysTotal;
    private readonly int $rdbChangesSinceLastSave;
    private readonly int $rdbBgsaveInProgress;
    private readonly int $rdbLastSaveTime;
    private readonly string $rdbLastBgsaveStatus;
    private readonly int $rdbLastBgsaveTimeSec;
    private readonly int $rdbCurrentBgsaveTimeSec;
    private readonly int $rdbSavesSuccess;
    private readonly int $rdbSavesFailures;
    private readonly int $rdbLastCowSize;
    private readonly int $rdbLastLoadKeysExpired;
    private readonly int $rdbLastLoadKeysLoaded;
    private readonly int $aofEnabled;
    private readonly int $aofRewriteInProgress;
    private readonly int $aofRewriteScheduled;
    private readonly int $aofLastRewriteTimeSec;
    private readonly int $aofCurrentRewriteTimeSec;
    private readonly string $aofLastBgrewriteStatus;
    private readonly string $aofLastWriteStatus;
    private readonly int $aofLastCowSize;
    private readonly int $moduleForkedChild;
    private readonly int $aofCurrentSize;
    private readonly int $aofBaseSize;
    private readonly int $aofPendingRewrite;
    private readonly int $aofBufferLength;
    private readonly int $aofPendingBioFsync;
    private readonly int $aofDelayedFsync;

    public function __unserialize(array $data): void
    {
        $this->loading = (int) ($data['Persistence']['loading'] ?? 0);
        $this->asyncLoading = (int) ($data['Persistence']['async_loading'] ?? 0);
        $this->currentCowSize = (int) ($data['Persistence']['current_cow_size'] ?? 0);
        $this->currentCowSizeAge = (int) ($data['Persistence']['current_cow_size_age'] ?? 0);
        $this->currentForkPerc = (int) ($data['Persistence']['current_fork_perc'] ?? 0);
        $this->currentSaveKeysProcessed = (int) ($data['Persistence']['current_save_keys_processed'] ?? 0);
        $this->currentSaveKeysTotal = (int) ($data['Persistence']['current_save_keys_total'] ?? 0);
        $this->rdbChangesSinceLastSave = (int) ($data['Persistence']['rdb_changes_since_last_save'] ?? 0);
        $this->rdbBgsaveInProgress = (int) ($data['Persistence']['rdb_bgsave_in_progress'] ?? 0);
        $this->rdbLastSaveTime = (int) ($data['Persistence']['rdb_last_save_time'] ?? 0);
        $this->rdbLastBgsaveStatus = $data['Persistence']['rdb_last_bgsave_status'] ?? 'unknown';
        $this->rdbLastBgsaveTimeSec = (int) ($data['Persistence']['rdb_last_bgsave_time_sec'] ?? -1);
        $this->rdbCurrentBgsaveTimeSec = (int) ($data['Persistence']['rdb_current_bgsave_time_sec'] ?? -1);
        $this->rdbSavesSuccess = (int) ($data['Persistence']['rdb_saves'] ?? 0);
        $this->rdbSavesFailures = (int) ($data['Persistence']['rdb_saves_failures'] ?? 0);
        $this->rdbLastCowSize = (int) ($data['Persistence']['rdb_last_cow_size'] ?? 0);
        $this->rdbLastLoadKeysExpired = (int) ($data['Persistence']['rdb_last_load_keys_expired'] ?? 0);
        $this->rdbLastLoadKeysLoaded = (int) ($data['Persistence']['rdb_last_load_keys_loaded'] ?? 0);
        $this->aofEnabled = (int) ($data['Persistence']['aof_enabled'] ?? 0);
        $this->aofRewriteInProgress = (int) ($data['Persistence']['aof_rewrite_in_progress'] ?? 0);
        $this->aofRewriteScheduled = (int) ($data['Persistence']['aof_rewrite_scheduled'] ?? 0);
        $this->aofLastRewriteTimeSec = (int) ($data['Persistence']['aof_last_rewrite_time_sec'] ?? -1);
        $this->aofCurrentRewriteTimeSec = (int) ($data['Persistence']['aof_current_rewrite_time_sec'] ?? -1);
        $this->aofLastBgrewriteStatus = $data['Persistence']['aof_last_bgrewrite_status'] ?? 'unknown';
        $this->aofLastWriteStatus = $data['Persistence']['aof_last_write_status'] ?? 'unknown';
        $this->aofLastCowSize = (int) ($data['Persistence']['aof_last_cow_size'] ?? 0);
        $this->moduleForkedChild = (int) ($data['Persistence']['module_fork'] ?? 0);
        $this->aofCurrentSize = (int) ($data['Persistence']['aof_current_size'] ?? 0);
        $this->aofBaseSize = (int) ($data['Persistence']['aof_base_size'] ?? 0);
        $this->aofPendingRewrite = (int) ($data['Persistence']['aof_pending_rewrite'] ?? 0);
        $this->aofBufferLength = (int) ($data['Persistence']['aof_buffer_length'] ?? 0);
        $this->aofPendingBioFsync = (int) ($data['Persistence']['aof_pending_bio_fsync'] ?? 0);
        $this->aofDelayedFsync = (int) ($data['Persistence']['aof_delayed_fsync'] ?? 0);
    }

    public function getLoading(): int
    {
        return $this->loading;
    }

    public function getAsyncLoading(): int
    {
        return $this->asyncLoading;
    }

    public function getCurrentCowSize(): int
    {
        return $this->currentCowSize;
    }

    public function getCurrentCowSizeAge(): int
    {
        return $this->currentCowSizeAge;
    }

    public function getCurrentForkPerc(): int
    {
        return $this->currentForkPerc;
    }

    public function getCurrentSaveKeysProcessed(): int
    {
        return $this->currentSaveKeysProcessed;
    }

    public function getCurrentSaveKeysTotal(): int
    {
        return $this->currentSaveKeysTotal;
    }

    public function getRdbChangesSinceLastSave(): int
    {
        return $this->rdbChangesSinceLastSave;
    }

    public function getRdbBgsaveInProgress(): int
    {
        return $this->rdbBgsaveInProgress;
    }

    public function getRdbLastSaveTime(): int
    {
        return $this->rdbLastSaveTime;
    }

    public function getRdbLastBgsaveStatus(): string
    {
        return $this->rdbLastBgsaveStatus;
    }

    public function getRdbLastBgsaveTimeSec(): int
    {
        return $this->rdbLastBgsaveTimeSec;
    }

    public function getRdbCurrentBgsaveTimeSec(): int
    {
        return $this->rdbCurrentBgsaveTimeSec;
    }

    public function getRdbSavesSuccess(): int
    {
        return $this->rdbSavesSuccess;
    }

    public function getRdbSavesFailures(): int
    {
        return $this->rdbSavesFailures;
    }

    public function getRdbLastCowSize(): int
    {
        return $this->rdbLastCowSize;
    }

    public function getRdbLastLoadKeysExpired(): int
    {
        return $this->rdbLastLoadKeysExpired;
    }

    public function getRdbLastLoadKeysLoaded(): int
    {
        return $this->rdbLastLoadKeysLoaded;
    }

    public function getAofEnabled(): int
    {
        return $this->aofEnabled;
    }

    public function getAofRewriteInProgress(): int
    {
        return $this->aofRewriteInProgress;
    }

    public function getAofRewriteScheduled(): int
    {
        return $this->aofRewriteScheduled;
    }

    public function getAofLastRewriteTimeSec(): int
    {
        return $this->aofLastRewriteTimeSec;
    }

    public function getAofCurrentRewriteTimeSec(): int
    {
        return $this->aofCurrentRewriteTimeSec;
    }

    public function getAofLastBgrewriteStatus(): string
    {
        return $this->aofLastBgrewriteStatus;
    }

    public function getAofLastWriteStatus(): string
    {
        return $this->aofLastWriteStatus;
    }

    public function getAofLastCowSize(): int
    {
        return $this->aofLastCowSize;
    }

    public function getModuleForkedChild(): int
    {
        return $this->moduleForkedChild;
    }

    public function getAofCurrentSize(): int
    {
        return $this->aofCurrentSize;
    }

    public function getAofBaseSize(): int
    {
        return $this->aofBaseSize;
    }

    public function getAofPendingRewrite(): int
    {
        return $this->aofPendingRewrite;
    }

    public function getAofBufferLength(): int
    {
        return $this->aofBufferLength;
    }

    public function getAofPendingBioFsync(): int
    {
        return $this->aofPendingBioFsync;
    }

    public function getAofDelayedFsync(): int
    {
        return $this->aofDelayedFsync;
    }

    public function isAofEnabled(): bool
    {
        return 1 === $this->aofEnabled;
    }

    public function isRdbSaveInProgress(): bool
    {
        return 1 === $this->rdbBgsaveInProgress;
    }

    public function isAofRewriteInProgress(): bool
    {
        return 1 === $this->aofRewriteInProgress;
    }

    public function getRdbLastSaveTimeFormatted(): string
    {
        return date('Y-m-d H:i:s', $this->rdbLastSaveTime);
    }

    public function __toString(): string
    {
        return sprintf(
            'Persistence: RDB saves: %d (failures: %d), AOF: %s, Last save: %s',
            $this->rdbSavesSuccess,
            $this->rdbSavesFailures,
            $this->isAofEnabled() ? 'enabled' : 'disabled',
            $this->getRdbLastSaveTimeFormatted()
        );
    }
}
