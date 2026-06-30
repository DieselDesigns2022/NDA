<?php
require_once __DIR__ . '/../../includes/nda_helpers.php';
require_admin();

$q = trim($_GET['q'] ?? '');
$phase = $_GET['phase'] ?? '';
$where = [];
$params = [];

if ($q !== '') {
    $where[] = '(legal_name LIKE ? OR business_name LIKE ? OR email LIKE ? OR phone LIKE ? OR facebook_profile LIKE ?)';
    for ($i = 0; $i < 5; $i++) {
        $params[] = '%' . $q . '%';
    }
}

if (in_array($phase, ['Alpha', 'Beta', 'Either / As Assigned'], true)) {
    $where[] = 'testing_phase = ?';
    $params[] = $phase;
}

$sql = 'SELECT * FROM nda_submissions'
    . ($where ? ' WHERE ' . implode(' AND ', $where) : '')
    . ' ORDER BY submitted_at DESC LIMIT 100';
$stmt = db()->prepare($sql);
$stmt->execute($params);
$rows = $stmt->fetchAll();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Signed NDAs</title>
    <link rel="stylesheet" href="<?= h(app_url('/style.css')) ?>">
</head>
<body>
<main class="wrap">
    <div class="topbar">
        <h1>Signed Tester NDAs</h1>
        <a href="<?= h(app_url('/admin/logout.php')) ?>">Log out</a>
    </div>

    <form class="card" method="get">
        <div class="grid">
            <label>
                Search
                <input name="q" value="<?= h($q) ?>">
            </label>
            <label>
                Testing phase
                <select name="phase">
                    <option value="">All</option>
                    <?php foreach (['Alpha', 'Beta', 'Either / As Assigned'] as $phaseOption): ?>
                        <option <?= $phase === $phaseOption ? 'selected' : '' ?>><?= h($phaseOption) ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <button>Search</button>
    </form>

    <div class="card">
        <table class="table">
            <thead>
            <tr>
                <th>Submitted</th>
                <th>Legal name</th>
                <th>Business</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Phase</th>
                <th>Facebook</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?= h($row['submitted_at']) ?></td>
                    <td><?= h($row['legal_name']) ?></td>
                    <td><?= h($row['business_name']) ?></td>
                    <td><?= h($row['email']) ?></td>
                    <td><?= h($row['phone']) ?></td>
                    <td><?= h($row['testing_phase']) ?></td>
                    <td><?= h($row['facebook_profile']) ?></td>
                    <td>
                        <a href="<?= h(app_url('/admin/nda-view.php')) ?>?id=<?= h($row['uuid']) ?>">View/Print</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (!$rows): ?>
                <tr><td colspan="8">No signed NDAs found.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>
