<?php

require_once __DIR__.'/../vendor/autoload.php';

$retriever = new RedisAnalizer\Service\RedisInformationRetriever();
$allInfo = $retriever->getAllInfo();
$clientList = $retriever->getClientList();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redis Server Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px 0;
        }
        .info-card {
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .table th {
            width: 40%;
            background-color: #f8f9fa;
        }
        .section-icon {
            font-size: 1.5rem;
            margin-right: 10px;
        }
        .badge-success { background-color: #28a745; }
        .badge-danger { background-color: #dc3545; }
        .badge-warning { background-color: #ffc107; color: #000; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h1 class="display-4"><i class="bi bi-server"></i> Redis Server Information</h1>
                <p class="lead text-muted">Complete overview of your Redis instance</p>
            </div>
        </div>

        <!-- Server Information -->
        <div class="card info-card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0"><i class="bi bi-hdd-rack section-icon"></i>Server Information</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <th>Redis Version</th>
                            <td><?php echo $allInfo['server']->getRedisVersion() ?></td>
                        </tr>
                        <tr>
                            <th>Redis Mode</th>
                            <td><span class="badge bg-info"><?php echo $allInfo['server']->getRedisMode() ?></span></td>
                        </tr>
                        <tr>
                            <th>Operating System</th>
                            <td><?php echo $allInfo['server']->getOs() ?></td>
                        </tr>
                        <tr>
                            <th>Architecture</th>
                            <td><?php echo $allInfo['server']->getArchBits() ?> bits</td>
                        </tr>
                        <tr>
                            <th>Process ID</th>
                            <td><?php echo $allInfo['server']->getProcessId() ?></td>
                        </tr>
                        <tr>
                            <th>TCP Port</th>
                            <td><?php echo $allInfo['server']->getTcpPort() ?></td>
                        </tr>
                        <tr>
                            <th>Uptime</th>
                            <td>
                                <strong><?php echo $allInfo['server']->getUptimeInDays() ?> days</strong>
                                (<?php echo number_format($allInfo['server']->getUptimeInSeconds()) ?> seconds)
                            </td>
                        </tr>
                        <tr>
                            <th>Config File</th>
                            <td><code><?php echo $allInfo['server']->getConfigFile() ?: 'N/A' ?></code></td>
                        </tr>
                        <tr>
                            <th>Executable</th>
                            <td><code><?php echo $allInfo['server']->getExecutable() ?></code></td>
                        </tr>
                        <tr>
                            <th>Multiplexing API</th>
                            <td><?php echo $allInfo['server']->getMultiplexingApi() ?></td>
                        </tr>
                        <tr>
                            <th>GCC Version</th>
                            <td><?php echo $allInfo['server']->getGccVersion() ?></td>
                        </tr>
                        <tr>
                            <th>IO Threads Active</th>
                            <td><?php echo $allInfo['server']->getIoThreadsActive() ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Memory Information -->
        <div class="card info-card">
            <div class="card-header bg-success text-white">
                <h3 class="mb-0"><i class="bi bi-memory section-icon"></i>Memory Information</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <th>Used Memory</th>
                            <td><strong><?php echo $allInfo['memory']->getUsedMemoryHuman() ?></strong> (<?php echo number_format($allInfo['memory']->getUsedMemory()) ?> bytes)</td>
                        </tr>
                        <tr>
                            <th>Used Memory RSS</th>
                            <td><?php echo $allInfo['memory']->getUsedMemoryRssHuman() ?> (<?php echo number_format($allInfo['memory']->getUsedMemoryRss()) ?> bytes)</td>
                        </tr>
                        <tr>
                            <th>Peak Memory</th>
                            <td><?php echo $allInfo['memory']->getUsedMemoryPeakHuman() ?> (<?php echo $allInfo['memory']->getUsedMemoryPeakPerc() ?>% of current)</td>
                        </tr>
                        <tr>
                            <th>Memory Fragmentation Ratio</th>
                            <td>
                                <span class="badge <?php echo $allInfo['memory']->isFragmented() ? 'badge-warning' : 'badge-success' ?>">
                                    <?php echo number_format($allInfo['memory']->getMemFragmentationRatio(), 2) ?>
                                </span>
                                <?php if ($allInfo['memory']->isFragmented()): ?>
                                    <small class="text-warning">⚠ High fragmentation detected</small>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Memory Allocator</th>
                            <td><?php echo $allInfo['memory']->getMemAllocator() ?></td>
                        </tr>
                        <tr>
                            <th>Used Memory Overhead</th>
                            <td><?php echo number_format($allInfo['memory']->getUsedMemoryOverhead()) ?> bytes</td>
                        </tr>
                        <tr>
                            <th>Used Memory Dataset</th>
                            <td><?php echo number_format($allInfo['memory']->getUsedMemoryDataset()) ?> bytes (<?php echo $allInfo['memory']->getUsedMemoryDatasetPerc() ?>)</td>
                        </tr>
                        <tr>
                            <th>Memory for Clients</th>
                            <td><?php echo number_format($allInfo['memory']->getMemClientsNormal()) ?> bytes (normal) / <?php echo number_format($allInfo['memory']->getMemClientsSlaves()) ?> bytes (replicas)</td>
                        </tr>
                        <tr>
                            <th>Active Defragmentation</th>
                            <td><?php echo $allInfo['memory']->getActiveDefragRunning() ? '<span class="badge badge-success">Running</span>' : '<span class="badge bg-secondary">Not Running</span>' ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Stats Information -->
        <div class="card info-card">
            <div class="card-header bg-info text-white">
                <h3 class="mb-0"><i class="bi bi-graph-up section-icon"></i>Statistics</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <th>Total Connections Received</th>
                            <td><?php echo number_format($allInfo['stats']->getTotalConnectionsReceived()) ?></td>
                        </tr>
                        <tr>
                            <th>Total Commands Processed</th>
                            <td><?php echo number_format($allInfo['stats']->getTotalCommandsProcessed()) ?></td>
                        </tr>
                        <tr>
                            <th>Instantaneous Ops/Sec</th>
                            <td><strong><?php echo number_format($allInfo['stats']->getInstantaneousOpsPerSec(), 2) ?></strong> operations/second</td>
                        </tr>
                        <tr>
                            <th>Network Traffic (Input)</th>
                            <td><?php echo number_format($allInfo['stats']->getTotalNetInputBytes() / 1024 / 1024, 2) ?> MB (<?php echo number_format($allInfo['stats']->getInstantaneousInputKbps(), 2) ?> KB/s)</td>
                        </tr>
                        <tr>
                            <th>Network Traffic (Output)</th>
                            <td><?php echo number_format($allInfo['stats']->getTotalNetOutputBytes() / 1024 / 1024, 2) ?> MB (<?php echo number_format($allInfo['stats']->getInstantaneousOutputKbps(), 2) ?> KB/s)</td>
                        </tr>
                        <tr>
                            <th>Keyspace Hits</th>
                            <td><?php echo number_format($allInfo['stats']->getKeyspaceHits()) ?></td>
                        </tr>
                        <tr>
                            <th>Keyspace Misses</th>
                            <td><?php echo number_format($allInfo['stats']->getKeyspaceMisses()) ?></td>
                        </tr>
                        <tr>
                            <th>Hit Rate</th>
                            <td>
                                <span class="badge <?php echo $allInfo['stats']->getHitRate() > 80 ? 'badge-success' : ($allInfo['stats']->getHitRate() > 50 ? 'badge-warning' : 'badge-danger') ?>">
                                    <?php echo number_format($allInfo['stats']->getHitRate(), 2) ?>%
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Expired Keys</th>
                            <td><?php echo number_format($allInfo['stats']->getExpiredKeys()) ?></td>
                        </tr>
                        <tr>
                            <th>Evicted Keys</th>
                            <td><?php echo number_format($allInfo['stats']->getEvictedKeys()) ?></td>
                        </tr>
                        <tr>
                            <th>Rejected Connections</th>
                            <td><?php echo number_format($allInfo['stats']->getRejectedConnections()) ?></td>
                        </tr>
                        <tr>
                            <th>Pub/Sub Channels</th>
                            <td><?php echo $allInfo['stats']->getPubsubChannels() ?></td>
                        </tr>
                        <tr>
                            <th>Pub/Sub Patterns</th>
                            <td><?php echo $allInfo['stats']->getPubsubPatterns() ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- CPU Information -->
        <div class="card info-card">
            <div class="card-header bg-warning">
                <h3 class="mb-0"><i class="bi bi-cpu section-icon"></i>CPU Information</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <th>Used CPU (System)</th>
                            <td><?php echo number_format($allInfo['cpu']->getUsedCpuSys(), 2) ?> seconds</td>
                        </tr>
                        <tr>
                            <th>Used CPU (User)</th>
                            <td><?php echo number_format($allInfo['cpu']->getUsedCpuUser(), 2) ?> seconds</td>
                        </tr>
                        <tr>
                            <th>Total CPU Used</th>
                            <td><strong><?php echo number_format($allInfo['cpu']->getTotalCpuUsed(), 2) ?> seconds</strong></td>
                        </tr>
                        <tr>
                            <th>Used CPU Children (System)</th>
                            <td><?php echo number_format($allInfo['cpu']->getUsedCpuSysChildren(), 2) ?> seconds</td>
                        </tr>
                        <tr>
                            <th>Used CPU Children (User)</th>
                            <td><?php echo number_format($allInfo['cpu']->getUsedCpuUserChildren(), 2) ?> seconds</td>
                        </tr>
                        <tr>
                            <th>Total CPU Used (Children)</th>
                            <td><?php echo number_format($allInfo['cpu']->getTotalCpuUsedChildren(), 2) ?> seconds</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Clients Information -->
        <div class="card info-card">
            <div class="card-header bg-secondary text-white">
                <h3 class="mb-0"><i class="bi bi-people section-icon"></i>Connected Clients</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <th>Connected Clients</th>
                            <td><strong><?php echo $allInfo['clients']->getConnectedClients() ?></strong></td>
                        </tr>
                        <tr>
                            <th>Max Clients</th>
                            <td><?php echo number_format($allInfo['clients']->getMaxclients()) ?></td>
                        </tr>
                        <tr>
                            <th>Client Usage</th>
                            <td>
                                <div class="progress" style="height: 25px;">
                                    <div class="progress-bar <?php echo $allInfo['clients']->getClientUsagePercentage() > 80 ? 'bg-danger' : 'bg-success' ?>"
                                         role="progressbar"
                                         style="width: <?php echo $allInfo['clients']->getClientUsagePercentage() ?>%">
                                        <?php echo number_format($allInfo['clients']->getClientUsagePercentage(), 2) ?>%
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Blocked Clients</th>
                            <td><?php echo $allInfo['clients']->getBlockedClients() ?></td>
                        </tr>
                        <tr>
                            <th>Tracking Clients</th>
                            <td><?php echo $allInfo['clients']->getTrackingClients() ?></td>
                        </tr>
                        <tr>
                            <th>Cluster Connections</th>
                            <td><?php echo $allInfo['clients']->getClusterConnections() ?></td>
                        </tr>
                        <tr>
                            <th>Max Input Buffer</th>
                            <td><?php echo number_format($allInfo['clients']->getClientRecentMaxInputBuffer()) ?> bytes</td>
                        </tr>
                        <tr>
                            <th>Max Output Buffer</th>
                            <td><?php echo number_format($allInfo['clients']->getClientRecentMaxOutputBuffer()) ?> bytes</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Client List -->
        <div class="card info-card">
            <div class="card-header bg-dark text-white">
                <h3 class="mb-0"><i class="bi bi-list-ul section-icon"></i>Client List</h3>
            </div>
            <div class="card-body">
                <?php if (!empty($clientList)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Address</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Idle</th>
                                    <th>Flags</th>
                                    <th>DB</th>
                                    <th>Sub</th>
                                    <th>Last Command</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($clientList as $client): ?>
                                    <tr>
                                        <td><?php echo $client->getId() ?></td>
                                        <td><code><?php echo $client->getAddr() ?></code></td>
                                        <td><?php echo $client->getName() ? htmlspecialchars($client->getName()) : '<span class="text-muted">-</span>' ?></td>
                                        <td><?php echo $client->getAge() ?>s</td>
                                        <td><?php echo $client->getIdle() ?>s</td>
                                        <td><span class="badge bg-secondary"><?php echo htmlspecialchars($client->getFlags()) ?></span></td>
                                        <td><?php echo $client->getDb() ?></td>
                                        <td><?php echo $client->getSub() ?></td>
                                        <td><code><?php echo $client->getCmd() ? htmlspecialchars($client->getCmd()) : 'N/A' ?></code></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info">No clients currently connected.</div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Keyspace Information -->
        <div class="card info-card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0"><i class="bi bi-key section-icon"></i>Keyspace Information</h3>
            </div>
            <div class="card-body">
                <?php if ($allInfo['keyspace']->getDatabaseCount() > 0): ?>
                    <div class="alert alert-info">
                        <strong>Total Databases:</strong> <?php echo $allInfo['keyspace']->getDatabaseCount() ?> |
                        <strong>Total Keys:</strong> <?php echo number_format($allInfo['keyspace']->getTotalKeys()) ?> |
                        <strong>Total Expires:</strong> <?php echo number_format($allInfo['keyspace']->getTotalExpires()) ?>
                    </div>

                    <?php foreach ($allInfo['keyspace']->getDatabases() as $dbNumber => $dbInfo): ?>
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Database <?php echo $dbNumber ?></strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <th style="width: 40%;">Keys</th>
                                            <td><?php echo number_format($dbInfo['keys']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Keys with Expiration</th>
                                            <td><?php echo number_format($dbInfo['expires']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Average TTL</th>
                                            <td><?php echo number_format($dbInfo['avg_ttl']) ?> ms</td>
                                        </tr>
                                        <tr>
                                            <th>Subexpiry</th>
                                            <td><?php echo $dbInfo['subexpiry'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-warning">No databases with keys found.</div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Replication Information -->
        <div class="card info-card">
            <div class="card-header bg-danger text-white">
                <h3 class="mb-0"><i class="bi bi-arrow-repeat section-icon"></i>Replication</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <th>Role</th>
                            <td><span class="badge <?php echo $allInfo['replication']->isMaster() ? 'bg-primary' : 'bg-secondary' ?>"><?php echo strtoupper($allInfo['replication']->getRole()) ?></span></td>
                        </tr>
                        <?php if ($allInfo['replication']->isMaster()): ?>
                            <tr>
                                <th>Connected Slaves</th>
                                <td><?php echo $allInfo['replication']->getConnectedSlaves() ?></td>
                            </tr>
                            <tr>
                                <th>Master Replication Offset</th>
                                <td><?php echo number_format($allInfo['replication']->getMasterReplOffset()) ?></td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <th>Master Host</th>
                                <td><?php echo $allInfo['replication']->getMasterHost() ?: 'N/A' ?></td>
                            </tr>
                            <tr>
                                <th>Master Port</th>
                                <td><?php echo $allInfo['replication']->getMasterPort() ?: 'N/A' ?></td>
                            </tr>
                            <tr>
                                <th>Master Link Status</th>
                                <td>
                                    <span class="badge <?php echo $allInfo['replication']->isReplicaConnected() ? 'badge-success' : 'badge-danger' ?>">
                                        <?php echo strtoupper($allInfo['replication']->getMasterLinkStatus() ?: 'N/A') ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Slave Read Only</th>
                                <td><?php echo $allInfo['replication']->getSlaveReadOnly() ? 'Yes' : 'No' ?></td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <th>Replication Backlog Active</th>
                            <td><?php echo $allInfo['replication']->getReplBacklogActive() ? 'Yes' : 'No' ?></td>
                        </tr>
                        <tr>
                            <th>Replication Backlog Size</th>
                            <td><?php echo number_format($allInfo['replication']->getReplBacklogSize()) ?> bytes</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Persistence Information -->
        <div class="card info-card">
            <div class="card-header bg-success text-white">
                <h3 class="mb-0"><i class="bi bi-save section-icon"></i>Persistence</h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5>RDB (Snapshot)</h5>
                        <table class="table table-sm table-striped">
                            <tbody>
                                <tr>
                                    <th>Last Save Time</th>
                                    <td><?php echo $allInfo['persistence']->getRdbLastSaveTimeFormatted() ?></td>
                                </tr>
                                <tr>
                                    <th>Changes Since Last Save</th>
                                    <td><?php echo number_format($allInfo['persistence']->getRdbChangesSinceLastSave()) ?></td>
                                </tr>
                                <tr>
                                    <th>Background Save In Progress</th>
                                    <td><?php echo $allInfo['persistence']->isRdbSaveInProgress() ? '<span class="badge badge-warning">Yes</span>' : '<span class="badge bg-secondary">No</span>' ?></td>
                                </tr>
                                <tr>
                                    <th>Last Save Status</th>
                                    <td><span class="badge <?php echo $allInfo['persistence']->getRdbLastBgsaveStatus() === 'ok' ? 'badge-success' : 'badge-danger' ?>"><?php echo strtoupper($allInfo['persistence']->getRdbLastBgsaveStatus()) ?></span></td>
                                </tr>
                                <tr>
                                    <th>Last Save Duration</th>
                                    <td><?php echo $allInfo['persistence']->getRdbLastBgsaveTimeSec() ?> seconds</td>
                                </tr>
                                <tr>
                                    <th>Successful Saves</th>
                                    <td><?php echo number_format($allInfo['persistence']->getRdbSavesSuccess()) ?></td>
                                </tr>
                                <tr>
                                    <th>Failed Saves</th>
                                    <td><?php echo number_format($allInfo['persistence']->getRdbSavesFailures()) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5>AOF (Append Only File)</h5>
                        <table class="table table-sm table-striped">
                            <tbody>
                                <tr>
                                    <th>AOF Enabled</th>
                                    <td><?php echo $allInfo['persistence']->isAofEnabled() ? '<span class="badge badge-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' ?></td>
                                </tr>
                                <?php if ($allInfo['persistence']->isAofEnabled()): ?>
                                    <tr>
                                        <th>AOF Rewrite In Progress</th>
                                        <td><?php echo $allInfo['persistence']->isAofRewriteInProgress() ? '<span class="badge badge-warning">Yes</span>' : '<span class="badge bg-secondary">No</span>' ?></td>
                                    </tr>
                                    <tr>
                                        <th>AOF Current Size</th>
                                        <td><?php echo number_format($allInfo['persistence']->getAofCurrentSize()) ?> bytes</td>
                                    </tr>
                                    <tr>
                                        <th>AOF Base Size</th>
                                        <td><?php echo number_format($allInfo['persistence']->getAofBaseSize()) ?> bytes</td>
                                    </tr>
                                    <tr>
                                        <th>Last Rewrite Status</th>
                                        <td><span class="badge <?php echo $allInfo['persistence']->getAofLastBgrewriteStatus() === 'ok' ? 'badge-success' : 'badge-danger' ?>"><?php echo strtoupper($allInfo['persistence']->getAofLastBgrewriteStatus()) ?></span></td>
                                    </tr>
                                    <tr>
                                        <th>Last Write Status</th>
                                        <td><span class="badge <?php echo $allInfo['persistence']->getAofLastWriteStatus() === 'ok' ? 'badge-success' : 'badge-danger' ?>"><?php echo strtoupper($allInfo['persistence']->getAofLastWriteStatus()) ?></span></td>
                                    </tr>
                                    <tr>
                                        <th>Pending BIO Fsync</th>
                                        <td><?php echo $allInfo['persistence']->getAofPendingBioFsync() ?></td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="2" class="text-muted">AOF is disabled</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center text-muted mt-4 mb-4">
            <p>Redis Information Analyzer &copy; <?php echo date('Y') ?> | Generated at <?php echo date('Y-m-d H:i:s') ?></p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
