<?php require __DIR__.'/header.tpl.php'; ?>

<section class="section ">

    <div class="container">

        <div class="tete">
            <span>
                <button class="button is-success has-background-grey" id="addListButton" alt="add list">
                    <span class="icon is-small">
                        <i class="fas fa-plus"></i>
                    </span>
                    &nbsp;
                </button>
            </span>
            <span>
                <h1 class="title">
                    oScrum
                </h1>
            </span>
        </div>





        <div class="columns" id="lists">

            <!-- all lists -->

        </div>

    </div>
</section>

<div class="modal" id="addListModal">
    <div class="modal-background"></div>
    <div class="modal-card">


        <form action="" method="POST" class="addListForm">
            <header class="modal-card-head">
                <p class="modal-card-title">Ajouter une liste</p>
                <button class="delete close" type="button" aria-label="close"></button>
            </header>


            <section class="modal-card-body">
                <div class="field">
                    <label class="label">Nom</label>
                    <div class="control">
                        <input type="text" class="input addList" name="list_name" value="" placeholder="Nom de la liste">
                    </div>
                </div>
            </section>


            <footer class="modal-card-foot">
                <button class="button is-success">Save changes</button>
                <button class="button close" type="button">Cancel</button>
            </footer>
        </form>
    </div>
</div>

<div class="modal" id="addCardModal">
    <div class="modal-background"></div>
    <div class="modal-card">


        <form action="" method="POST" class="addCardForm">
            <header class="modal-card-head">
                <p class="modal-card-title">Ajouter une carte</p>
                <button class="delete close" type="button" aria-label="close"></button>
            </header>


            <section class="modal-card-body">
                <div class="field">
                    <label class="label">Nom</label>
                    <div class="control">
                        <input type="hidden" name="list_id" value="0">
                        <input type="text" class="input addList" name="card_title" value="" placeholder="Nom de la carte">
                    </div>
                </div>
            </section>


            <footer class="modal-card-foot">
                <button class="button is-success">Save changes</button>
                <button class="button close" type="button">Cancel</button>
            </footer>
        </form>
    </div>
</div>



<?php require __DIR__.'/footer.tpl.php'; ?>