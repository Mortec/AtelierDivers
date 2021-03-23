<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="assets/js/app.js"></script>


</body>




<!-- TEMPLATE HTML -->


<template id="listTemplate">

    <div class="column is-one-quarter panel list-element">
        <div class="panel-heading has-background-grey">
            <div class="columns">
                <div class="column">
                    <h2 class="has-text-white list-name">Name</h2>

                    <form action="" method="POST" class="is-hidden">

                        <div class="field has-addons">

                            <div class="control">
                                <input type="text" class="input is-small" name="list_name" value="none" placeholder="Nom de la liste">
                            </div>

                            <div class="control">
                                <button class="button is-small is-success">Valider</button>
                            </div>

                        </div>
                    </form>

                </div>

                <div class="column is-narrow">
                    <a href="#" class="is-pulled-right add-card">
                        <span class="icon is-small has-text-white">
                            <i class="fas fa-plus"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="panel-block is-block has-background-light cards-container">
            <!-- card -->


        </div>

        <a href="#" class="thrash-list">
            <span class="icon is-small">
                <i class="fas fa-trash-alt"></i>
            </span>
        </a>


    </div>
    <!--/ list -->



</template>


<template id="cardTemplate">

    <!-- card -->
    <div class="box card-element">

        <div class="columns">
            <div class="column">

                <h3 class="has-text-grey-dark card-title">Title</h3>
                <form action="" method="POST" class="is-hidden">

                    <div class="field has-addons">

                        <div class="control">
                            <input type="text" class="input is-small" name="card_title" value="none" placeholder="Nom de la card">
                        </div>

                        <div class="control">
                            <button class="button is-small is-success">Valider</button>
                        </div>

                    </div>
                </form>
                <div class="label-element">
                    <!--/ labels -->
                </div>

            </div>

            <div class="column is-narrow">
                <!-- <a href="#" class="add-label">
                    <span class="icon has-text-grey-light">
                        <i class="far fa-bookmark"></i>
                    </span>
                </a> -->

                <a href="#" class="update-card">
                    <span class="icon is-small has-text-grey-light">
                        <i class="fas fa-pencil-alt"></i>
                    </span>
                </a>

                <a href="#" class="thrash-card">
                    <span class="icon is-small has-text-warning">
                        <i class="fas fa-trash-alt"></i>
                    </span>
                </a>

            </div>
        </div>
    </div>
    <!--/ card -->

</template>



<template id="labelTemplate_1">
    <span class="icon has-text-info">
    <i class="fas fa-bookmark"></i>
    </span>
</template>

<template id="labelTemplate_2">
    <span class="icon has-text-success">
    <i class="fas fa-bookmark"></i>
    </span>
</template>

<template id="labelTemplate_3">
    <span class="icon has-text-warning">
    <i class="fas fa-bookmark"></i>
    </span>
</template>

<template id="labelTemplate_4">
    <span class="icon has-text-danger">
    <i class="fas fa-bookmark"></i>
    </span>
</template>


</html>