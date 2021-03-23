<?php require __DIR__ . '/layout/header.tpl.php'; ?>


<div class='hero home-intro'>
    <h1> Bienvenue sur O'Quiz </h1>
    <p>Un <strong>quiz</strong> (prononcé « kiz » ou « kouïz ») est un jeu qui consiste en un <em>questionnaire</em> permettant de tester des connaissances générales ou spécifiques ou des compétences. Un quiz se pratique seul ou à plusieurs, suivant des procédures plus ou moins élaborées. Il peut se présenter sous formes de questionnaire à choix multiples ou de <em>questionnaire</em> simple, mais la différence majeure avec un autre test de connaissances ou de personnalité est qu'on attend du participant une réponse non développée d'un ou deux mots.

    Le <strong>quiz</strong> est le principe de nombreux jeux de société ou de jeux radiophoniques ou télévisés. Lorsqu'il ne s'agit pas d'un jeu, on parle plutôt de « <em>questionnaire</em> » ou de « <em>test</em> » que de <strong>quiz</strong>.

    Le mot <strong>quiz</strong> (invariable selon les règles françaises de grammaire) est à l'origine un mot anglais d'usage familier aux États-Unis signifiant <em>examen oral</em> ou <em>colle</em>, du verbe transitif to quiz signifiant questionner (aux États-Unis : faire <em>passer l'oral</em> à un candidat).

    On rencontre parfois en français la graphie <strong>quizz</strong>, peut-être à cause d'une confusion avec les formes fléchies ou dérivées en anglais où le z est doublé (<strong>quizzes</strong>, <em>quizzical</em>... <a href="https://fr.wikipedia.org/wiki/Quiz">cf : wikipedia</i></a>).</p>
</div>


<nav class="navtags">

    <?php foreach ($tags as $tag) {

        echo '<a class="navtags__link" href="' . route('tagquiz', ['id' => $tag->id]) . '">';
        echo '<span class="tag navtags__tag">' . $tag->name . '</span>';
        echo '</a>';
    }
    ?>
</nav>

<main class="quizzes">

    <?php for ($i = 0; $i < count($quizzes); $i += 3) : ?>

        <section class="columns">

            <article class="column home__quiz">
                <a class="home__quiz__link" href="<?= route('quiz', ['id' => $quizzes[$i]->id]) ?>">
                    <h2><?= $quizzes[$i]->title ?></h2>
                </a>
                <p class="home__quiz__description"><?= $quizzes[$i]->description ?></p>
                <cite>by <?= $quizzes[$i]->user['firstname'] . ' ' . $quizzes[$i]->user['lastname'] ?></cite>
            </article>

            <article class="column home__quiz">
                <?php if ($i + 1 < count($quizzes)) : ?>
                    <a class="home__quiz__link" href="<?= route('quiz', ['id' => $quizzes[$i + 1]->id]) ?>">
                        <h2><?= $quizzes[$i + 1]->title ?></h2>
                    </a>
                    <p class="home__quiz__description"><?= $quizzes[$i + 1]->description ?></p>
                    <cite>by <?= $quizzes[$i + 1]->user['firstname'] . ' ' . $quizzes[$i + 1]->user['lastname'] ?></cite>
                <?php endif ?>
            </article>

            <article class="column home__quiz">
                <?php if ($i + 2 < count($quizzes)) : ?>
                    <a class="home__quiz__link" href="<?= route('quiz', ['id' => $quizzes[$i + 2]->id]) ?>">
                        <h2><?= $quizzes[$i + 2]->title ?></h2>
                    </a>
                    <p class="home__quiz__description"><?= $quizzes[$i + 2]->description ?></p>
                    <cite>by <?= $quizzes[$i + 2]->user['firstname'] . ' ' . $quizzes[$i + 2]->user['lastname'] ?></cite>
                <?php endif ?>
            </article>

        </section>

    <?php endfor ?>

</main>


<?php require __DIR__ . '/layout/footer.tpl.php'; ?>