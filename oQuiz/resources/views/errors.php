<?php require __DIR__ . '/layout/header.tpl.php'; ?>


<main class="account">


    <header class="column account">
        <h1>
            <h1> <?=$e->getStatusCode()?> </h1>

        </h1>
        <p> <?=$e->getMessage()?> </p>

    </header>


</main>

<?php require __DIR__ . '/layout/footer.tpl.php'; ?>