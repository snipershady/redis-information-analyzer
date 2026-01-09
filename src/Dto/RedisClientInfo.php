<?php

namespace RedisAnalizer\Dto;

/**
 * @author Stefano Perrini <perrini.stefano@gmail.com>
 */
class RedisClientInfo implements \Stringable
{
    private readonly int $id;
    private readonly string $addr;
    private readonly string $laddr;
    private readonly int $fd;
    private readonly ?string $name;
    private readonly int $age;
    private readonly int $idle;
    private readonly string $flags;
    private readonly int $db;
    private readonly int $sub;
    private readonly int $psub;
    private readonly int $ssub;
    private readonly int $multi;
    private readonly int $watch;
    private readonly int $qbuf;
    private readonly int $qbufFree;
    private readonly int $argvMem;
    private readonly int $multiMem;
    private readonly int $rbs;
    private readonly int $rbp;
    private readonly int $obl;
    private readonly int $oll;
    private readonly int $omem;
    private readonly int $totMem;
    private readonly string $events;
    private readonly ?string $cmd;
    private readonly string $user;
    private readonly int $redir;
    private readonly int $resp;
    private readonly ?string $libName;
    private readonly ?string $libVer;
    private readonly int $ioThread;

    public function __unserialize(array $data): void
    {
        $this->id = (int) $data['id'];
        $this->addr = $data['addr'];
        $this->laddr = $data['laddr'];
        $this->fd = (int) $data['fd'];
        $this->name = !empty($data['name']) ? $data['name'] : null;
        $this->age = (int) $data['age'];
        $this->idle = (int) $data['idle'];
        $this->flags = $data['flags'];
        $this->db = (int) $data['db'];
        $this->sub = (int) $data['sub'];
        $this->psub = (int) $data['psub'];
        $this->ssub = (int) $data['ssub'];
        $this->multi = (int) $data['multi'];
        $this->watch = (int) $data['watch'];
        $this->qbuf = (int) $data['qbuf'];
        $this->qbufFree = (int) $data['qbuf-free'];
        $this->argvMem = (int) $data['argv-mem'];
        $this->multiMem = (int) $data['multi-mem'];
        $this->rbs = (int) $data['rbs'];
        $this->rbp = (int) $data['rbp'];
        $this->obl = (int) $data['obl'];
        $this->oll = (int) $data['oll'];
        $this->omem = (int) $data['omem'];
        $this->totMem = (int) $data['tot-mem'];
        $this->events = $data['events'];
        $this->cmd = $data['cmd'] ?? null;
        $this->user = $data['user'];
        $this->redir = (int) $data['redir'];
        $this->resp = (int) $data['resp'];
        $this->libName = $data['lib-name'] ?? null;
        $this->libVer = $data['lib-ver'] ?? null;
        $this->ioThread = (int) $data['io-thread'];
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getAddr(): string
    {
        return $this->addr;
    }

    public function getLaddr(): string
    {
        return $this->laddr;
    }

    public function getFd(): int
    {
        return $this->fd;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getIdle(): int
    {
        return $this->idle;
    }

    public function getFlags(): string
    {
        return $this->flags;
    }

    public function getDb(): int
    {
        return $this->db;
    }

    public function getSub(): int
    {
        return $this->sub;
    }

    public function getPsub(): int
    {
        return $this->psub;
    }

    public function getSsub(): int
    {
        return $this->ssub;
    }

    public function getMulti(): int
    {
        return $this->multi;
    }

    public function getWatch(): int
    {
        return $this->watch;
    }

    public function getQbuf(): int
    {
        return $this->qbuf;
    }

    public function getQbufFree(): int
    {
        return $this->qbufFree;
    }

    public function getArgvMem(): int
    {
        return $this->argvMem;
    }

    public function getMultiMem(): int
    {
        return $this->multiMem;
    }

    public function getRbs(): int
    {
        return $this->rbs;
    }

    public function getRbp(): int
    {
        return $this->rbp;
    }

    public function getObl(): int
    {
        return $this->obl;
    }

    public function getOll(): int
    {
        return $this->oll;
    }

    public function getOmem(): int
    {
        return $this->omem;
    }

    public function getTotMem(): int
    {
        return $this->totMem;
    }

    public function getEvents(): string
    {
        return $this->events;
    }

    public function getCmd(): ?string
    {
        return $this->cmd;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function getRedir(): int
    {
        return $this->redir;
    }

    public function getResp(): int
    {
        return $this->resp;
    }

    public function getLibName(): ?string
    {
        return $this->libName;
    }

    public function getLibVer(): ?string
    {
        return $this->libVer;
    }

    public function getIoThread(): int
    {
        return $this->ioThread;
    }

    // Metodi di utilità
    public function getClientIp(): string
    {
        return explode(':', $this->addr)[0];
    }

    public function getClientPort(): int
    {
        return (int) explode(':', $this->addr)[1];
    }

    public function getTotalMemoryKB(): float
    {
        return round($this->totMem / 1024, 2);
    }

    public function isIdle(): bool
    {
        return $this->idle > 0;
    }

    public function __toString(): string
    {
        return sprintf(
            'Client #%d [%s] - Name: %s, Age: %ds, Idle: %ds, Memory: %s KB',
            $this->id,
            $this->addr,
            $this->name ?? 'unnamed',
            $this->age,
            $this->idle,
            $this->getTotalMemoryKB()
        );
    }
}
