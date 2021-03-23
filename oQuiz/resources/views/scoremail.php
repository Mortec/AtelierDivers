<html>
<style><?= file_get_contents( url('/assets/css/reset.css') ) ?></style>
<style><?= file_get_contents( url('/assets/css/bulma.min.css') ) ?></style>
<style><?= file_get_contents( url('/assets/css/style.min.css') ) ?></style>


<body class="score">

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

</body>
</html>