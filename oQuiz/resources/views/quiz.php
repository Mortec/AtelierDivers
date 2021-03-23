<?php require __DIR__ . '/layout/header.tpl.php'; ?>

<main class="quiz">

<header class="column quizhead">
    <h1><?= $quiz->title ?> &nbsp;
        <var><?= count($questions) ?> questions</var>
    </h1>

    <p class="quizhead__description">
        <?= $quiz->description ?>
    </p>

    <cite>by <?= $quiz->user['firstname'] . ' ' . $quiz->user['lastname'] ?></cite>

    <nav class="quizhead-tags">

        <?php foreach ($tags as $tag) {

            echo '<a class="navtags__link" href="' . route('tagquiz', ['id' => $tag->id]) . '">';
            echo '<span class="tag navtags__tag">' . $tag->name . '</span>';
            echo '</a>';
        }
        ?>
    </nav>
</header>



    <?php for ($i = 0; $i < count($questions); $i += 2) : ?>
        <section class='columns'>

            <article class="column quiz__question">

                <h2 class="quiz__question__description">
                    <?= $questions[$i]->question ?>
                </h2>
                <div>
                    <ul class="quiz__question__choices">
                        <?php $answers = $questions[$i]->answers->shuffle()?>
                        <li>1. <?= $answers[0]['description'] ?></li>
                        <li>2. <?= $answers[1]['description'] ?></li>
                        <li>3. <?= $answers[2]['description'] ?></li>
                        <li>D. <?= $answers[3]['description'] ?></li>
                    </ul>
                </div>
                <span class="level level-<?= $questions[$i]->level_id ?>"> <?= $questions[$i]->level['name'] ?> </span>

            </article>

            <article class="column quiz__question">
                <?php if ($i < count($questions)) : ?>

                    <h2 class="quiz__question__description">
                        <?= $questions[$i + 1]->question ?>
                    </h2>
                    <div>
                        <ul class="quiz__question__choices">
                        <?php $answers = $questions[$i + 1]->answers->shuffle()?>
                        <li>1. <?= $answers[0]['description'] ?></li>
                        <li>2. <?= $answers[1]['description'] ?></li>
                        <li>3. <?= $answers[2]['description'] ?></li>
                        <li>D. <?= $answers[3]['description'] ?></li>
                        </ul>

                    </div>
                    <span class="level level-<?= $questions[$i + 1]->level_id ?>"> <?= $questions[$i + 1]->level['name'] ?> </span>
                    
                <?php endif ?>
            </article>

        </section>

    <?php endfor ?>

</main>

<?php require __DIR__ . '/layout/footer.tpl.php'; ?>