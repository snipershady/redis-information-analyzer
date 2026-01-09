<?php

namespace RedisAnalizer\Dto;

/**
 * @author Stefano Perrini <perrini.stefano@gmail.com>
 */
class CpuDto implements \Stringable
{
    private readonly float $usedCpuSys;
    private readonly float $usedCpuUser;
    private readonly float $usedCpuSysChildren;
    private readonly float $usedCpuUserChildren;
    private readonly float $usedCpuSysMainThread;
    private readonly float $usedCpuUserMainThread;

    public function __unserialize(array $data): void
    {
        $this->usedCpuSys = (float) ($data['CPU']['used_cpu_sys'] ?? 0);
        $this->usedCpuUser = (float) ($data['CPU']['used_cpu_user'] ?? 0);
        $this->usedCpuSysChildren = (float) ($data['CPU']['used_cpu_sys_children'] ?? 0);
        $this->usedCpuUserChildren = (float) ($data['CPU']['used_cpu_user_children'] ?? 0);
        $this->usedCpuSysMainThread = (float) ($data['CPU']['used_cpu_sys_main_thread'] ?? 0);
        $this->usedCpuUserMainThread = (float) ($data['CPU']['used_cpu_user_main_thread'] ?? 0);
    }

    public function getUsedCpuSys(): float
    {
        return $this->usedCpuSys;
    }

    public function getUsedCpuUser(): float
    {
        return $this->usedCpuUser;
    }

    public function getUsedCpuSysChildren(): float
    {
        return $this->usedCpuSysChildren;
    }

    public function getUsedCpuUserChildren(): float
    {
        return $this->usedCpuUserChildren;
    }

    public function getUsedCpuSysMainThread(): float
    {
        return $this->usedCpuSysMainThread;
    }

    public function getUsedCpuUserMainThread(): float
    {
        return $this->usedCpuUserMainThread;
    }

    public function getTotalCpuUsed(): float
    {
        return $this->usedCpuSys + $this->usedCpuUser;
    }

    public function getTotalCpuUsedChildren(): float
    {
        return $this->usedCpuSysChildren + $this->usedCpuUserChildren;
    }

    public function getTotalCpuUsedMainThread(): float
    {
        return $this->usedCpuSysMainThread + $this->usedCpuUserMainThread;
    }

    public function __toString(): string
    {
        return sprintf(
            'CPU: System: %.2fs, User: %.2fs, Total: %.2fs',
            $this->usedCpuSys,
            $this->usedCpuUser,
            $this->getTotalCpuUsed()
        );
    }
}
