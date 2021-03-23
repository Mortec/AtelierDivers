var app = {


    init: function () {


        //app.addListButtonToDom();

        $('#addListModal .close').click(app.closeAddListModal);
        $('#addCardModal .close').click(app.closeAddCardModal);
        $('#addListButton').click(app.displayAddListModal);

        $('.addListForm').submit(app.addList);
        $('.addCardForm').submit(app.addCard);

        app.callElements();



        
    },

    initUI: function(){

        $( function() {


            $( '#lists' ).sortable({
                
                stop: app.updateListPageOrders,
            }).disableSelection();

            $( '.cards-container' ).each( function(index, cardContainer){

                $(cardContainer).sortable({
                    connectWith: '.cards-container',

                    stop: function( e, ui ) { 
      
                      let $listElement = $(e.target).closest('.list-element');
                      let list_id = $listElement.attr('data-list_id');
                      app.updateCardListOrders(list_id);
                      },
      
                    receive: function( e, ui ) {
      
                      let $listElement = $(e.target).closest('.list-element');
                      let list_id = $listElement.attr('data-list_id');
                      let $cardElement = $(ui.item).closest('.card-element');
                      $cardElement.attr('data-card_list_id', list_id );
                      app.updateCardListOrders(list_id);
                      }

                }).disableSelection();
            });
          });


        
            // $.contextMenu({
            //     selector: '.add-label', 
            //     trigger: 'hover',
            //     delay: 500,
            //     autoHide: true,
            //     callback: function(key, options) {
            //         var m = "clicked: " + key;
            //         window.console && console.log(options) || alert(m); 
            //     },
            //     items: {
            //         "edit": {name: "Edit", icon: "edit"},
            //         "cut": {name: "Cut", icon: "cut"},
            //         "copy": {name: "Copy", icon: "copy"},
            //         "paste": {name: "Paste", icon: "paste"},
            //         "delete": {name: "Delete", icon: "delete"},
            //         "sep1": "---------",
            //         "quit": {name: "Quit", icon: function($element, key, item){ return 'context-menu-icon context-menu-icon-quit'; }}
            //     }
            // });
        
    },

    callElements: function() {

        $.get( 'api/lists', null, function( lists ) {

            $.each(lists, function (index, list) { app.generateListElement( list ); });

        }, 'json').done( function(){

            $.get( 'api/cards', null, function( cards ) {

                $.each(cards, function (index, card) { app.generateCardElement( card ); });
    
            }, 'json').done( function(){

                app.initUI();

            });
        });
    },


    callDataCards: function () {


        $.get( 'api/cards', null, function( cards ) {

            $.each(cards, function (index, card) { app.generateCardElement( card ); });

        }, 'json');
    },


    generateCardElement: function ( card ) {


        let $newCard = $('#cardTemplate').contents().clone();
        $newCard = app.setelDataCard( $newCard, card );
        $newCard.find('.card-title').text(card.title);

        $newCard.find('.update-card').click( app.displayCardFormEdit );
        $newCard.find('form').submit(app.updateCardName);
        $newCard.find('.thrash-card').click( app.deleteCard );

        $('[data-list_id=' + card.list_id + ']').find('.cards-container').append($newCard);
    },


    deleteCard: function(e) {

        e.preventDefault();

        let card = app.getelJsonCard( $(e.currentTarget).closest('.card-element') );

        $.post('api/cards/delete', card, function( deletedCard ){

            app.removeCardElement(deletedCard.id);
            
        }, 'json' ).done( function( deletedCard ){ app.updateCardListOrders( deletedCard.list_id ); } );

        
    },

    removeCardElement: function( id ) {

        $('[data-card_id='+id+']').remove();
    },


    addCard: function( e ) {

        e.preventDefault();

        $form = $(e.currentTarget);

        let cardTitle = $form.find('[name=card_title]').val();
        let listId = $form.find('[name=list_id]').val();
        let listOrder = $('[data-list_id='+listId+']').find('.card-element').length + 1;
        let card = { title: cardTitle, list_id: listId, list_order : listOrder};

        $.post("api/cards/add", card, function(newcard){

            app.generateCardElement( newcard ); 
        }, 'json');

        app.closeAddCardModal();
    },


    updateCardName: function( e ) {


        e.preventDefault();
        let $form = $(e.currentTarget);
        let $cardElement = $form.closest('.card-element');
        let $h3 = $cardElement.find('.card-title');

        card = app.getelJsonCard( $cardElement ); //recupere tous les dataset de cardElement en tableau json
        card.title = $form.find('[name=card_title]').val();

        $.post('api/cards/update', card, function( updatedCard ){

            $h3.text( updatedCard.title );
            $cardElement.attr('data-card_title', updatedCard.title );
        }, 'json' );
        
        $form.addClass('is-hidden');  
        $h3.removeClass('is-hidden');    
    },


    updateCardListOrders: function( list_id ){

        
        $listElement = $('[data-list_id='+list_id+']');

        $listElement.find('.card-element').each( function(index, cardElement ) {

            $( cardElement ).attr('data-card_list_order', index + 1 );

            let card = app.getelJsonCard( $(cardElement) );

            $.post('api/cards/update', card, function( updatedCard ){
                console.log(  updatedCard );
            }, 'json' );
        });
    },


    displayCardFormEdit: function ( e ) {


        e.preventDefault();
        let $h3 = $(e.currentTarget).closest('.card-element').find('.card-title');
        let $form = $h3.next();
        $form.removeClass('is-hidden');
        $h3.addClass('is-hidden');
        $title = $h3.text();
        $form.find('[name="card_title"]').val($title);
    },


    displayAddCardModal: function ( e ) {
        

        let list = app.getelJsonList( $(e.currentTarget).closest('.list-element') );
        $('.addCardForm').find('[name=list_id').val( list.id );
        $('#addCardModal').addClass('is-active');
    },


    closeAddCardModal: function () {


        $('#addCardModal').removeClass('is-active');
    },




    callDataLists: function () {


        $.get( 'api/lists', null, function( lists ) {

            $.each(lists, function (index, list) { app.generateListElement( list ); });
        }, 'json');
    },


    addList: function ( e ) {


        e.preventDefault();
        $form = $(e.currentTarget);

        let listName = $form.find('[name=list_name]').val();
        let pageOrder = $('.list-element').length + 1;
        let list = { name: listName, page_order: pageOrder };

        $.post("api/lists/add", list, function(newlist){

            app.generateListElement( newlist );
        }, 'json');

        app.closeAddListModal();
    },


    deleteList: function(e) {


        e.preventDefault();

        let $listElement = $(e.currentTarget).closest('.list-element');
        let list = app.getelJsonList( $listElement );
        let $cardElements = $listElement.find('.card-element');
        let cardIds = [];
        $listElement.find('.card-element').each( function( n, cardElement){
            cardIds.push($(cardElement ).attr('data-card_id'))
        });

        console.log( cardIds );

        $.post('api/cards/delete/'+cardIds.length, '{cardIds : '+cardIds+'}', function( response ){
    
            app.removeCardElement(deletedCard.id);
            
        }, 'json' ).done( function( deletedCard ){  } );
        /*
        $.each( $cardElements, function( index, cardElement ){

            let card = app.getelJsonCard( $( cardElement) );

            arrayPush( cardIds, card.id );

            $.post('api/cards/delete', card, function( deletedCard ){
    
                app.removeCardElement(deletedCard.id);
                
            }, 'json' ).done( function( deletedCard ){  } );
        });


        $.post('api/lists/delete', list, function( removedList ){

            $('[data-list_id='+removedList.id+']').remove();
            
        }, 'json' ).done( function( removedList ){ app.updateListPageOrders() });
        */

    },


    updateListName: function (e) {


        e.preventDefault();
        let $form = $(e.currentTarget);
        let $listElement =$form.closest('.list-element');
        let $h2 = $listElement.find('.list-name');

        list = app.getelJsonList( $listElement ); //recupère tous les data-set de listElement dans un json array
        list.name = $form.find('input[name=list_name]').val();

        $.post('api/lists/update', list, function( updatedList ){

            $h2.text( updatedList.name );
            $listElement.attr('data-list_name', updatedList.name );
        }, 'json' );
        
        $form.addClass('is-hidden');
        $h2.removeClass('is-hidden');
    },


    generateListElement: function ( list ) {


        let $newList = $('#listTemplate').contents().clone();

        $newList = app.setlDataList( $newList, list );
        $newList.find('.add-card').click(app.displayAddCardModal);
        $newList.find('form').submit(app.updateListName);
        $newList.find('.thrash-list').click( app.deleteList );

        $h2 = $newList.find('.list-name');
        $h2.text(list.name);
        $h2.dblclick(app.displayListFormEdit);

        $('#lists').append($newList);
    },


    displayAddListModal: function () {


        $('#addListModal').addClass('is-active');
    },


    closeAddListModal: function () {


        $('#addListModal').removeClass('is-active');
    },


    displayListFormEdit: function (e) {


        e.preventDefault();

        let $h2 = $(e.currentTarget);
        let $form = $h2.next();

        $form.removeClass('is-hidden');
        $h2.addClass('is-hidden');
        $name = $h2.text();

        $form.find('[name="list_name"]').val($name);
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
        let $listElement = $('<div>').addClass('column is-one-fifth');
        let $buttonElement = $('<button>').addClass('button').addClass('is-success').attr('id', 'addListButton').html('&nbsp;');
        let $spanElement = $('<span>').addClass('icon').addClass('is-small');
        let $iElement = $('<i>').addClass('fas').addClass('fa-plus');
        // Ajouter les éléments dans les autres
        $iElement.appendTo($spanElement);
        $spanElement.prependTo($buttonElement); // prepend => pour ajouter avant le texte
        $buttonElement.appendTo($listElement);

        // On ajoute dans le DOM dans la div dont l'id est lists
        $('#lists').append($listElement);

    },




    getelJsonList: function( $e ){


        return { id: $e.attr('data-list_id'), name: $e.attr('data-list_name'), page_order: $e.attr('data-list_page_order') };
    },


    getelJsonCard: function( $e ){


        return { id: $e.attr('data-card_id'), title: $e.attr('data-card_title'), list_id: $e.attr('data-card_list_id'), list_order: $e.attr('data-card_list_order') };
    },


    getelJsonLabel: function( $e ){


        return { id: $e.attr('data-label_id'), name: $e.attr('data-label_name') };
    },


    setlDataList: function( $e, list ){


        $e.attr('data-list_id', list.id);
        $e.attr('data-list_name', list.name);
        $e.attr('data-list_page_order', list.page_order);

        return $e;
    },


    setelDataCard: function( $e, card ){


        $e.attr('data-card_id', card.id);
        $e.attr('data-card_title', card.title);
        $e.attr('data-card_list_id', card.list_id);
        $e.attr('data-card_list_order', card.list_order);

        return $e;
    },


    setelDataLabel: function( $e, label ){


        $e.attr('data-label_id', label.id);
        $e.attr('data-label_name', label.name);

        return $e;
    },


    updateListPageOrders: function(){


        $('.list-element').each( function(index, listElement) {


            $(listElement).attr('data-list_page_order', index + 1 );

            let list = app.getelJsonList( $(listElement));

            $.post('api/lists/update', list, function( updatedList ){

            }, 'json' );
        });
    },


    generateLabelElement: function ( cardHasLabel ) {


        let $newLabel = $('#labelTemplate_'+ cardHasLabel.label_id).contents().clone();
        $newLabel = app.setelDataLabel( $newLabel, cardHasLabel );

        $('[data-card_id=' + cardHasLabel.card_id + ']').find('.labels-container').append($newLabel);
    },
};




$(app.init);