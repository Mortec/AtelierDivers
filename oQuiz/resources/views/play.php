<?php require __DIR__ . '/layout/header.tpl.php'; ?>


<main class="play">

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


    <form class="column play" action="<?= route('score', ['id' => $quiz->id]) ?>" method="post">

        <?php foreach ($questions as $n => $question) {

            $answers = $question->answers->shuffle();
            
            require __DIR__ . '/layout/play_question.tpl.php';
        }
        ?>

        <div class="column play__submit">
            <div class="control">
                <button type="submit" class="button is-info">Submit</button>
            </div>
        </div>

    </form>


</main>

<?php require __DIR__ . '/layout/footer.tpl.php'; ?>