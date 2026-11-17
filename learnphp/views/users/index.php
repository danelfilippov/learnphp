<?php include __DIR__ . '/../partials/header.php'; ?>

<?php
// columns shown in the list (password hash is left out on purpose)
$columns = [
    'id' => 'ID',
    'name' => 'Name',
    'email' => 'Email',
    'created_at' => 'Created',
    'updated_at' => 'Updated',
];
?>

<main class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Users</h1>
        <span class="badge text-bg-secondary"><?= count($users) ?> total</span>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <?php foreach ($columns as $label): ?>
                        <th><?= $label ?></th>
                    <?php endforeach ?>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!$users): ?>
                    <tr>
                        <td colspan="<?= count($columns) + 1 ?>" class="text-center text-body-secondary py-4">
                            No users yet.
                        </td>
                    </tr>
                <?php endif ?>

                <?php foreach ($users as $user): ?>
                    <tr>
                        <?php foreach (array_keys($columns) as $field): ?>
                            <td><?= htmlspecialchars($user->$field) ?></td>
                        <?php endforeach ?>
                        <td class="text-end text-nowrap">
                            <a href="/admin/users/view?id=<?= $user->id ?>" class="btn btn-sm btn-outline-info">View</a>
                            <a href="/admin/users/edit?id=<?= $user->id ?>" class="btn btn-sm btn-outline-warning">Edit</a>
                            <a href="/admin/users/delete?id=<?= $user->id ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
