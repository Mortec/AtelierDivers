<?php require __DIR__ . '/layout/header.tpl.php'; ?>


<main class="tagquiz">

    <header class="column tagquiz has-text-centered">
        <h1><?= $tag->name ?>
        </h1>

    </header>

    <nav class="navtags tagquiz">

        <?php foreach ($tags as $tag) {

            echo '<a class="navtags__link" href="' . route('tagquiz', ['id' => $tag->id]) . '">';
            echo '<span class="tag navtags__tag">' . $tag->name . '</span>';
            echo '</a>';
        }
        ?>
    </nav>



    <?php for ($i = 0; $i < count($quizzes); $i += 3) : ?>

        <section class="columns tagquiz">

            <article class="column tagquiz__quiz">
                <?php if ($i < count($quizzes)) : ?>
                    <a class="tagquiz__quiz__link" href="<?= route('quiz', ['id' => $quizzes[$i]->id]) ?>">
                        <h2><?= $quizzes[$i]->title ?></h2>
                    </a>
                    <p><?= $quizzes[$i]->description ?></p>
                    <cite classe="tag__quiz__author">by <?= $quizzes[$i]->user['firstname'] . ' ' . $quizzes[$i]->user['lastname'] ?></cite>
                <?php endif ?>
            </article>

            <article class="column tagquiz__quiz">
                <?php if ($i + 1 < count($quizzes)) : ?>
                    <a class="tagquiz__quiz__link" href="<?= route('quiz', ['id' => $quizzes[$i + 1]->id]) ?>">
                        <h2><?= $quizzes[$i + 1]->title ?></h2>
                    </a>
                    <p><?= $quizzes[$i + 1]->description ?></p>
                    <cite classe="tag__quiz__author">by <?= $quizzes[$i + 1]->user['firstname'] . ' ' . $quizzes[$i + 1]->user['lastname'] ?></cite>
                <?php endif ?>
            </article>

            <article class="column tagquiz__quiz">
                <?php if ($i + 2 < count($quizzes)) : ?>
                    <a class="tagquiz__quiz__link" href="<?= route('quiz', ['id' => $quizzes[$i + 2]->id]) ?>">
                        <h2><?= $quizzes[$i + 2]->title ?></h2>
                    </a>
                    <p><?= $quizzes[$i + 2]->description ?></p>
                    <cite classe="tag__quiz__author">by <?= $quizzes[$i + 2]->user['firstname'] . ' ' . $quizzes[$i + 2]->user['lastname'] ?></cite>
                <?php endif ?>
            </article>


        </section>

    <?php endfor ?>

</main>


<?php require __DIR__ . '/layout/footer.tpl.php'; ?>