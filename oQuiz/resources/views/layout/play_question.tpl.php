<article class="columns play__question">

    <div class="column play__question__text">

        

        <h2 class="play__question__question">
            <?= $question->question ?>
        </h2>

        <div class="play__question__choices">

            <?php foreach ( $answers as $answer ) : ?>

                <div>
                    <input type="radio" name="<?= $question->id ?>" id="<?= $answer->id ?>" value="<?= $answer->id ?>">
                    <label for="<?=$question->id?>">
                        <?= $answer->description ?>
                    </label>
                </div>

            <?php endforeach ?>

        </div>

        <span class="level level-<?= $question->level_id ?>"><?= $question->level['name'] ?></span>
    </div>



    <div class="column is-one-third play__question__image">
        <p>


        </p>
    </div>

    
</article>