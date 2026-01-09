<?php

namespace RedisAnalizer\Dto;

/**
 * @author Stefano Perrini <perrini.stefano@gmail.com>
 */
class ServerDto implements \Stringable
{
    private readonly string $redisVersion;
    private readonly string $redisGitSha1;
    private readonly string $redisGitDirty;
    private readonly string $redisBuildId;
    private readonly string $redisMode;
    private readonly string $os;
    private readonly int $archBits;
    private readonly string $multiplexingApi;
    private readonly string $atomicvarApi;
    private readonly string $gccVersion;
    private readonly int $processId;
    private readonly string $processSupervised;
    private readonly string $runId;
    private readonly int $tcpPort;
    private readonly string $serverTimeUsec;
    private readonly int $uptimeInSeconds;
    private readonly int $uptimeInDays;
    private readonly int $hz;
    private readonly int $configuredHz;
    private readonly int $lruClock;
    private readonly string $executable;
    private readonly string $configFile;
    private readonly int $ioThreadsActive;
    private readonly ?string $listenerPort;

    public function __unserialize(array $data): void
    {
        $this->redisVersion = $data['Server']['redis_version'] ?? '';
        $this->redisGitSha1 = $data['Server']['redis_git_sha1'] ?? '';
        $this->redisGitDirty = $data['Server']['redis_git_dirty'] ?? '';
        $this->redisBuildId = $data['Server']['redis_build_id'] ?? '';
        $this->redisMode = $data['Server']['redis_mode'] ?? '';
        $this->os = $data['Server']['os'] ?? '';
        $this->archBits = (int) ($data['Server']['arch_bits'] ?? 0);
        $this->multiplexingApi = $data['Server']['multiplexing_api'] ?? '';
        $this->atomicvarApi = $data['Server']['atomicvar_api'] ?? '';
        $this->gccVersion = $data['Server']['gcc_version'] ?? '';
        $this->processId = (int) ($data['Server']['process_id'] ?? 0);
        $this->processSupervised = $data['Server']['process_supervised'] ?? '';
        $this->runId = $data['Server']['run_id'] ?? '';
        $this->tcpPort = (int) ($data['Server']['tcp_port'] ?? 0);
        $this->serverTimeUsec = $data['Server']['server_time_usec'] ?? '';
        $this->uptimeInSeconds = (int) ($data['Server']['uptime_in_seconds'] ?? 0);
        $this->uptimeInDays = (int) ($data['Server']['uptime_in_days'] ?? 0);
        $this->hz = (int) ($data['Server']['hz'] ?? 0);
        $this->configuredHz = (int) ($data['Server']['configured_hz'] ?? 0);
        $this->lruClock = (int) ($data['Server']['lru_clock'] ?? 0);
        $this->executable = $data['Server']['executable'] ?? '';
        $this->configFile = $data['Server']['config_file'] ?? '';
        $this->ioThreadsActive = (int) ($data['Server']['io_threads_active'] ?? 0);
        $this->listenerPort = $data['Server']['listener0'] ?? null;
    }

    public function getRedisVersion(): string
    {
        return $this->redisVersion;
    }

    public function getRedisGitSha1(): string
    {
        return $this->redisGitSha1;
    }

    public function getRedisGitDirty(): string
    {
        return $this->redisGitDirty;
    }

    public function getRedisBuildId(): string
    {
        return $this->redisBuildId;
    }

    public function getRedisMode(): string
    {
        return $this->redisMode;
    }

    public function getOs(): string
    {
        return $this->os;
    }

    public function getArchBits(): int
    {
        return $this->archBits;
    }

    public function getMultiplexingApi(): string
    {
        return $this->multiplexingApi;
    }

    public function getAtomicvarApi(): string
    {
        return $this->atomicvarApi;
    }

    public function getGccVersion(): string
    {
        return $this->gccVersion;
    }

    public function getProcessId(): int
    {
        return $this->processId;
    }

    public function getProcessSupervised(): string
    {
        return $this->processSupervised;
    }

    public function getRunId(): string
    {
        return $this->runId;
    }

    public function getTcpPort(): int
    {
        return $this->tcpPort;
    }

    public function getServerTimeUsec(): string
    {
        return $this->serverTimeUsec;
    }

    public function getUptimeInSeconds(): int
    {
        return $this->uptimeInSeconds;
    }

    public function getUptimeInDays(): int
    {
        return $this->uptimeInDays;
    }

    public function getHz(): int
    {
        return $this->hz;
    }

    public function getConfiguredHz(): int
    {
        return $this->configuredHz;
    }

    public function getLruClock(): int
    {
        return $this->lruClock;
    }

    public function getExecutable(): string
    {
        return $this->executable;
    }

    public function getConfigFile(): string
    {
        return $this->configFile;
    }

    public function getIoThreadsActive(): int
    {
        return $this->ioThreadsActive;
    }

    public function getListenerPort(): ?string
    {
        return $this->listenerPort;
    }

    public function getUptimeFormatted(): string
    {
        return sprintf('%d days, %d hours', $this->uptimeInDays, ($this->uptimeInSeconds % 86400) / 3600);
    }

    public function __toString(): string
    {
        return sprintf(
            'Redis %s - Mode: %s, OS: %s, PID: %d, Uptime: %s',
            $this->redisVersion,
            $this->redisMode,
            $this->os,
            $this->processId,
            $this->getUptimeFormatted()
        );
    }
}
