<?php require __DIR__ . '/layout/header.tpl.php'; ?>


<main class="account">


    <header class="column account">
        <h1>
            <h1> <?= $user->firstname ?> &nbsp; <?= $user->lastname ?> </h1>
            <!-- <cite> <?= $user->role?> </cite> -->
        </h1>

    </header>


    <?php if ( $user->role == 'author' ): ?>
    <div class="column">

        <?php for ($i = 0; $i < count($quizzes); $i += 3) : ?>

            <section class="columns">

                <article class="column">
                    <?php if ($i < count($quizzes)) : ?>
                        <a href="<?= route('quiz', ['id' => $quizzes[$i]->id]) ?>">
                            <h2><?= $quizzes[$i]->title ?></h2>
                        </a>
                        <p><?= $quizzes[$i]->description ?></p>
                        <cite>by <?= $quizzes[$i]->user['firstname'] . ' ' . $quizzes[$i]->user['lastname'] ?></cite>
                    <?php endif ?>
                </article>

                <article class="column">
                    <?php if ($i + 1 < count($quizzes)) : ?>
                        <a href="<?= route('quiz', ['id' => $quizzes[$i + 1]->id]) ?>">
                            <h2><?= $quizzes[$i + 1]->title ?></h2>
                        </a>
                        <p><?= $quizzes[$i + 1]->description ?></p>
                        <cite>by <?= $quizzes[$i + 1]->user['firstname'] . ' ' . $quizzes[$i + 1]->user['lastname'] ?></cite>
                    <?php endif ?>
                </article>

                <article class="column">
                    <?php if ($i + 2 < count($quizzes)) : ?>
                        <a href="<?= route('quiz', ['id' => $quizzes[$i + 2]->id]) ?>">
                            <h2><?= $quizzes[$i + 2]->title ?></h2>
                        </a>
                        <p><?= $quizzes[$i + 2]->description ?></p>
                        <cite>by <?= $quizzes[$i + 2]->user['firstname'] . ' ' . $quizzes[$i + 2]->user['lastname'] ?></cite>
                    <?php endif ?>
                </article>



            </section>

        <?php endfor ?>

    </div>
    <?php endif ?>

</main>

<?php require __DIR__ . '/layout/footer.tpl.php'; ?>