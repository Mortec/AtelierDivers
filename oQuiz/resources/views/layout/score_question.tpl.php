<article class="columns score__question">

    <div class="column score__question__text">

        <h2 class="score__question__description">
            <?= $question->question ?>
        </h2>

        <div class="score__question__choices">

            <?php foreach( $question->answers->shuffle() as $answer ) : ?>

                <div>
                    <input type="radio" name="<?= $question->id ?>" id="<?= $answer->id ?>" 
                    <?php if ( $answer->id == $user_answerId ) echo 'checked="true"'?>>
                    <label for="<?= $question->id?>"
                    class="<?php 
                    $class='null';
                    if ( $answer->id == $user_answerId ) $class = 'bad';
                    if ( $answer->id == $good_answer->id ) $class = 'good';
                    echo $class;                  
                    ?>">
                        <?= $answer->description ?>
                    </label>
                </div>

            <?php endforeach ?>

        </div>

        <span class="level level-<?= $question->level_id ?>"><?= $question->level['name'] ?></span>
    </div>



    <div class="column is-one-third score__question__answer">
        <h3>Bonne réponse : <?= $good_answer->description ?></h3>
        <blockquote class="score__question__anecdote">

        <?= $question->anecdote ?>&nbsp;
        <a class="wiki" href="https://fr.wikipedia.org/wiki/<?= $question->wiki ?>"> ->wiki </a>

        </blockquote>
    </div>

    
</article>