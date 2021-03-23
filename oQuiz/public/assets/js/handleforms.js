var app = {


    init: function () {

        console.log('init');

        if ( $('.sign').length > 0 ) {

            $('.signin').submit( function (e) {

                e.preventDefault();

                $form = $(e.currentTarget);
                console.log($form);
            });
        }
    }
}


app.init();





















