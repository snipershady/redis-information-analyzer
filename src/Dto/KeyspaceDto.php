<?php

namespace RedisAnalizer\Dto;

/**
 * @author Stefano Perrini <perrini.stefano@gmail.com>
 */
class KeyspaceDto implements \Stringable
{
    private array $databases = [];

    public function __unserialize(array $data): void
    {
        foreach ($data['Keyspace'] as $key => $value) {
            if (str_starts_with((string) $key, 'db')) {
                $dbNumber = (int) substr((string) $key, 2);
                $this->databases[$dbNumber] = $this->parseDbStats($value);
            }
        }
    }

    private function parseDbStats(array $stats): array
    {
        return [
            'keys' => (int) ($stats['keys'] ?? 0),
            'expires' => (int) ($stats['expires'] ?? 0),
            'avg_ttl' => (int) ($stats['avg_ttl'] ?? 0),
            'subexpiry' => (int) ($stats['subexpiry'] ?? 0),
        ];
    }

    public function getDatabases(): array
    {
        return $this->databases;
    }

    public function getDatabase(int $dbNumber): ?array
    {
        return $this->databases[$dbNumber] ?? null;
    }

    public function getTotalKeys(): int
    {
        $total = 0;
        foreach ($this->databases as $database) {
            $total += $database['keys'] ?? 0;
        }

        return $total;
    }

    public function getTotalExpires(): int
    {
        $total = 0;
        foreach ($this->databases as $database) {
            $total += $database['expires'] ?? 0;
        }

        return $total;
    }

    public function getDatabaseCount(): int
    {
        return count($this->databases);
    }

    public function getKeysInDatabase(int $dbNumber): int
    {
        return $this->databases[$dbNumber]['keys'] ?? 0;
    }

    public function getExpiresInDatabase(int $dbNumber): int
    {
        return $this->databases[$dbNumber]['expires'] ?? 0;
    }

    public function getAvgTtlInDatabase(int $dbNumber): int
    {
        return $this->databases[$dbNumber]['avg_ttl'] ?? 0;
    }

    public function getSubexpiryInDatabase(int $dbNumber): int
    {
        return $this->databases[$dbNumber]['subexpiry'] ?? 0;
    }

    public function __toString(): string
    {
        return sprintf(
            'Keyspace: %d databases, Total keys: %d, Total expires: %d',
            $this->getDatabaseCount(),
            $this->getTotalKeys(),
            $this->getTotalExpires()
        );
    }
}
