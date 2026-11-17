<?php include __DIR__ . '/../partials/header.php'; ?>

<?php
$fields = [
    'name' => ['label' => 'Name', 'type' => 'text'],
    'email' => ['label' => 'Email', 'type' => 'email'],
];
?>

<main class="container" style="max-width: 540px;">
    <h1 class="h3 mb-4">Edit user #<?= $user->id ?></h1>

    <form action="/admin/users/edit?id=<?= $user->id ?>" method="POST">
        <?php foreach ($fields as $name => $field): ?>
            <div class="form-floating mb-3">
                <input
                    type="<?= $field['type'] ?>"
                    name="<?= $name ?>"
                    id="<?= $name ?>"
                    class="form-control"
                    placeholder="<?= $field['label'] ?>"
                    value="<?= htmlspecialchars($user->$name) ?>">
                <label for="<?= $name ?>"><?= $field['label'] ?></label>
            </div>
        <?php endforeach ?>

        <div class="form-floating mb-1">
            <input type="password" name="password" id="password" class="form-control" placeholder="New password">
            <label for="password">New password</label>
        </div>
        <p class="form-text mb-4">Leave empty to keep the current password.</p>

        <button type="submit" class="btn btn-primary">Save changes</button>
        <a href="/admin/users" class="btn btn-link">Cancel</a>
    </form>
</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
