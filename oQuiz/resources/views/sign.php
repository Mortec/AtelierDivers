<?php require __DIR__ . '/layout/header.tpl.php'; ?>

<main class='columns sign'>

    <div class='column form-signin'>
        <h2> Vous êtes déjà membre? </h2>

        <form action="<?= route('signin') ?>" method="post">

            <div class="field">
            <label class="label">Email</label>
                <p class="control has-icons-left has-icons-right">
                    <input class="input" type="email" name="email" placeholder="email">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                    </span>
                </p>
            </div>

            <div class="field">
            <label class="label">Mot de passe</label>
                <p class="control has-icons-left">
                    <input class="input" type="password" name="password" placeholder="mot de passe">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </p>
            </div>

            <?php if ( $error == true ) : ?>
            <p class="help is-danger">Email et/ou mot de passe incorrect(s).</p>
            <?php endif ?>

            <div class="field">
                <p class="control">
                    <button class="button is-info">
                        Se connecter
                    </button>
                </p>
            </div>

        </form>

    </div>


    

    <div class='column form-signup'>

    <?php if ( !$userexists ) : ?>

        <h2> Inscrivez vous !! </h2>

        <form action="<?= route('signup') ?>" method="post">


            <div class="field">
                <label class="label">Prénom</label>
                <p class="control has-icons-left">
                    <input class="input" type="text" name="firstname" placeholder="prénom">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </p>
            </div>
            <?php if ( !$firstname ) : ?>
            <p class="help is-danger">Veuillez saisir votre prénom</p>
            <?php endif ?>

            <div class="field">
                <label class="label">Nom</label>
                <p class="control has-icons-left">
                    <input class="input" type="text" name="lastname" placeholder="nom">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </p>
            </div>
            <?php if ( !$lastname ) : ?>
            <p class="help is-danger">Veuillez saisir votre nom</p>
            <?php endif ?>

            <div class="field">
                <label class="label">Email</label>
                <p class="control has-icons-left">
                    <input class="input" type="email" name="email" placeholder="Email">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                </p>
            </div>
            <?php if ( !$email ) : ?>
            <p class="help is-danger">Email invalide</p>
            <?php endif ?>

            <div class="field">
                <label class="label">Mot de passe</label>
                <p class="control has-icons-left">
                    <input class="input" type="password" name="password" placeholder="mot de passe">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </p>

                <?php if ( !$passwords || !$pwd1 || !$pwd2 ) : ?>
                <p class="help is-danger">Veuillez saisir et confirmer votre mot de passe.</p>
                <?php endif ?>

                <p class="control has-icons-left">
                    <input class="input" type="password" name="confirm_password" placeholder="confirmation">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </p>
            </div>
   
            
            

            <div class="field">
                <p class="control">
                    <button class="button is-info">
                        S'inscrire
                    </button>
                </p>
            </div>


        </form>

        
    <?php else: ?>
    <h2>Vous êtes déjà inscrit(e), connectez-vous !</h2>
    <?php endif ?>
    </div>



</main>


<?php require __DIR__ . '/layout/footer.tpl.php'; ?>