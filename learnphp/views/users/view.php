<?php include __DIR__ . '/../partials/header.php'; ?>

<?php
$details = [
    'ID' => $user->id,
    'Email' => $user->email,
    'Password hash' => $user->password,
    'Created' => $user->created_at,
    'Updated' => $user->updated_at,
];
?>

<main class="container">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0"><?= htmlspecialchars($user->name) ?></h1>
            <a href="/admin/users/edit?id=<?= $user->id ?>" class="btn btn-sm btn-outline-warning">Edit</a>
        </div>
        <div class="card-body">
            <dl class="row mb-0">
                <?php foreach ($details as $label => $value): ?>
                    <dt class="col-sm-3"><?= $label ?></dt>
                    <dd class="col-sm-9 text-break"><?= htmlspecialchars($value) ?></dd>
                <?php endforeach ?>
            </dl>
        </div>
    </div>

    <a href="/admin/users">&larr; Back to users</a>
</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
