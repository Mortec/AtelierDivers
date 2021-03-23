var app = {
    init: function () {

        $('#lists').empty();
        // en jQuery
        // Pour chaque élément dont la classe est "close"
        // on ajoute un écouteur d'événement
        $('#addListModal .close').click(app.closeAddListModal);
        
        // Intercepter l'évènement dblclick sur le nom des listes
        $('.list-title').dblclick(app.displayListFormEdit);
        
        // Affichage du bouton d'ajout de liste
        app.addListButtonToDom();
        
        // ajout de la gestion de l'event click sur le bouton d'ajout de liste
        $('#addListButton').click(app.displayAddListModal);

        $('.addListForm').submit(app.saveListChanges );

        app.callLists();

        app.callDataCards();

    },




    callDataCards: function() {

        $.ajax(
            {
                url: 'data/cards.json', // URL sur laquelle faire l'appel Ajax
                method: 'GET', // La méthode HTTP souhaité pour l'appel Ajax (GET ou POST)
                dataType: 'json', // Le type de données attendu en réponse (text, html, xml, json)
                data: { // (optionnel) Tableau contenant les données à envoyer avec la requête
                    index: 'valeur envoyée en GET ou POST, comme un formulaire',
                    second: 'seconde donnée envoyée'
                }
            }
        ).done(function (cards) { // J'attache une fonction anonyme à l'évènement "Appel ajax fini avec succès" et je récupère le code de réponse en paramètre


            $.each( cards, function( index, card ) {

                //console.log(index + ' : ' + card.name + ' : '  + card.list);

                app.generateCardElement( card.name,  card.list );

            });

            // TODO faire les actions souhaitées après la récupération de la réponse
        }).fail(function () { // J'attache une fonction anonyme à l'évènement "Appel ajax fini avec erreur"
            console.log('Réponse ajax incorrecte');

        });

        
    },






    generateCardElement: function ( cardName, cardList ){

        let newCard = $('.cardTemplate').contents().clone();
 
        newCard.find('.card-name').text( cardName );

        //console.log( $('[data-id='+cardList+']') ) ;

        $('[data-id='+cardList+']').append( newCard );

    },




    callLists: function() {

        $.ajax(
            {
                url: 'data/lists.json', // URL sur laquelle faire l'appel Ajax
                method: 'GET', // La méthode HTTP souhaité pour l'appel Ajax (GET ou POST)
                dataType: 'json', // Le type de données attendu en réponse (text, html, xml, json)
                data: { // (optionnel) Tableau contenant les données à envoyer avec la requête
                    index: 'valeur envoyée en GET ou POST, comme un formulaire',
                    second: 'seconde donnée envoyée'
                }
            }
        ).done(function (listes) { // J'attache une fonction anonyme à l'évènement "Appel ajax fini avec succès" et je récupère le code de réponse en paramètre


            /*listes.forEach( function( list ){

                app.generateListElement( list.name );

            });*/

            $.each( listes, function( index, list ) {

                app.generateListElement( list.name, list.id );
                //console.log( index + ' : ' + list.id + ' : ' + list.name);


            });

            // TODO faire les actions souhaitées après la récupération de la réponse
        }).fail(function () { // J'attache une fonction anonyme à l'évènement "Appel ajax fini avec erreur"
            console.log('Réponse ajax incorrecte');

        });

        
    },




    saveListChanges: function( event )  {

       

        event.preventDefault();

        let listName = $('.addList').val();

        app.generateListElement( listName );

        app.closeAddListModal();

    },


    generateListElement: function( listName, listId ) {

        let newList = $('.listTemplate').contents().clone();

       // console.log( newList );

        newList.find('.list-title').text( listName ); //has-text-white list-title

        newList.find('.panel-block').attr('data-id', listId );

        $('#lists').prepend( newList);

    },




    displayAddListModal: function () {
        // Ajout de la classe active sur l'élément #addListModal
        $('#addListModal').addClass('is-active');
    },




    closeAddListModal: function () {
        $('#addListModal').removeClass('is-active');
    },



    displayListFormEdit: function(event) {
        // Event est un objet qui contient plein d'informations
        // sur l'origine de l'événement (élément du DOM cliqué, coordonnées de la souris etc.)
        // Notamment currentTarget = élément du DOM cliqué
        console.log(event.currentTarget);
        // On converti la cible en objet jQuery pour la manipuler en jQuery
        var $listTitle = $(event.currentTarget);
        // Récupérer l'élément <form> "suivant" avec jQuery
        var $form = $listTitle.next();
        // Affiche le form
        $form.removeClass('is-hidden');

        // Sur une seule ligne
        // $(event.currentTarget).next().removeClass('is-hidden');

        // Bonus
        // Masquer le titre
        $listTitle.addClass('is-hidden');
        // Afficher le titre dans le champ du form
        // @todo
        // 1. Récupérer le contenu du h2
        // 2. Le mettre dans la value de l'input du form
    },





    addListButtonToDom: function () {
        // <div class="column">
        //     <button class="button is-success" id="addListButton">
        //         <span class="icon is-small">
        //             <i class="fas fa-plus"></i>
        //         </span>
        //         &nbsp; Ajouter une liste
        //     </button>
        // </div>

        // créer chaque élément (avec leurs classes) composant le bouton individuellement, et les stocker dans des variables
        var $listElement = $('<div>').addClass('column'); 


        var $buttonElement = $('<button>').addClass('button').addClass('is-success').attr('id', 'addListButton').html('&nbsp; Ajouter une liste');

        var $spanElement = $('<span>').addClass('icon').addClass('is-small');

        var $iElement = $('<i>').addClass('fas').addClass('fa-plus');

        // Ajouter les éléments dans les autres
        $iElement.appendTo($spanElement);

        $spanElement.prependTo($buttonElement); // prepend => pour ajouter avant le texte
        $buttonElement.appendTo($listElement);

        // On ajoute dans le DOM dans la div dont l'id est lists
        $('#lists').append($listElement);
    }



};
// Appel de app.init au chargement du DOM
$(app.init);