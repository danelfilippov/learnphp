<?php include __DIR__ . '/partials/header.php'; ?>

<main class="container">
    <section class="p-4 p-md-5 mb-4 rounded text-white" style="background: linear-gradient(135deg, #1e1b4b, #0e7490);">
        <span class="badge text-bg-info mb-3"><?= count($posts) ?> postitust</span>
        <h1 class="display-4 fst-italic"><?= $title ?></h1>
        <p class="lead my-3 mb-0">
            Märkmed PHP, veebiarenduse ja tööriistade kohta, mida tunnis õpime.
        </p>
    </section>

    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-3 mb-4 fst-italic border-bottom">Uusimad tehnikapostitused</h3>

            <div class="row row-cols-1 row-cols-lg-2 g-4 mb-5">
                <?php foreach ($posts as $post): ?>
                    <div class="col">
                        <article class="card h-100 shadow-sm border-0 border-top border-4 border-info">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge rounded-pill text-bg-info"><?= $post->tag ?></span>
                                    <small class="text-body-secondary"><?= $post->read_time ?> min lugemist</small>
                                </div>
                                <h2 class="h4 card-title link-body-emphasis"><?= $post->title ?></h2>
                                <p class="card-text flex-grow-1"><?= $post->body ?></p>
                                <p class="card-text mb-0">
                                    <small class="text-body-secondary">
                                        <?= $post->created_at ?> · <?= $post->author ?>
                                    </small>
                                </p>
                            </div>
                        </article>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

        <div class="col-md-4">
            <?php include __DIR__ . '/partials/sidebar.php'; ?>
        </div>
    </div>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>
