<?php require __DIR__ . '/layout/header.tpl.php'; ?>

<main class="score">

<header class="column quizhead">
    <h1><?= $quiz->title ?> &nbsp;
        <var classe="score">Score : <?= $score . '/' . count($questions) ?> </var>
    </h1>

    <p class="quizhead__description">
        <?= $quiz->description ?>
    </p>

    <cite>by <?= $quiz->user['firstname'] . ' ' . $quiz->user['lastname'] ?></cite>

    <nav class="quizhead-tags">

        <?php foreach ($tags as $tag) {

            //echo '<a class="navtags__link" href="' . route('tagquiz', ['id' => $tag->id]) . '">';
            echo '<span class="tag navtags__tag">' . $tag->name . '</span>';
            //echo '</a>';
        }
        ?>
    </nav>
</header>




    <?php foreach ($questions as $n => $question) {

        $answers = $question->answers;
        $good_answer = $question->goodanswer;
        $user_answerId = $user_answersIds[$n];

        require __DIR__ . '/layout/score_question.tpl.php';
    }
    ?>

        <form class="column score" action="<?= route('mailscore', ['id' => $quiz->id]) ?>" method="get">

            <div class="control">
                <button type="submit" class="button is-info">Recevoir par email</button>
            </div>
        </form>

</main>


<?php require __DIR__ . '/layout/footer.tpl.php'; ?>