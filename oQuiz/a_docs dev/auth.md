# L'authentification

L'authentification (c'est-à-dire le procédé permettant de vérifier l'identité d'un utilisateur pour lui permettre d'accéder à des ressources spécifiques) est prévue dans Lumen. C'est quand même une préoccupation assez récurrente parmi les applications qu'on envisage de développer avec un framework. Du coup, Lumen a tout prévu... ahem... pardon... **Laravel** a tout prévu pour te faciliter le travail. Sauf que ce qui est prévu pour rendre l'authentification dans ton application aussi simple qu'un retournement de crêpe pour une grand-mère bretonne, eh bien, ça n'a pas été conservé dans Lumen :man_shrugging:

## Mais si, il y a une page Authentication dans la doc Lumen :male_detective:

Héhé oui, mais si tu la lis, tu verras que c'est en fait un module très light et dédié aux APIs, qui ne fonctionnera donc pas avec une application qui sert du HTML :man_facepalming:

## Du coup, on réinvente la roue

Qu'à cela ne tienne ! On va faire une exception et on va réinventer *cette* roue (uniquement parce qu'elle est simple). Voyons un peu comment on va faire ça :-)

### Où est-ce que ça se passe ?

En session, naturellement ! Besoin d'un rappel ? https://github.com/O-clock-Alumni/fiches-recap/blob/master/php/sessions.md

### Comment ça se passe ?

Bien :-) Plus sérieusement, on va utiliser une notion déjà vue en saison 5 : les classes utilitaires. Rangées classiquement dans un dossier Utils, ces classes sont transversales, le but est de les rendre accessible depuis n'importe quel endroit. Et qu'est-ce qu'on a vu en saison 6, qui n'implique pas d'instance (=de variable) et qui est disponible partout ? *Le contexte statique, bien sûr* Voilà donc, cadeau rien que pour toi :gift_heart:, un squelette de classe utilitaire à remplir et utiliser pour tacler le sprint 4 en 10 minutes :watch:

```php
<?php

namespace App\Utils;

abstract class UserSession {

    // Constante contenant l'index du tableau de session
    const SESSION_INDEX_NAME = 'connectedUser';

    /**
     * Méthode permettant de connecter un utilisateur
     * 
     * @param \App\Models\User $user
     */
    public static function connect(\App\Models\User $user) {
        
    }

    /**
     * Méthode permettant de déconnecter un utilisateur
     */
    public static function disconnect() {
        
    }

    /**
     * Méthode permettant de savoir si le visiteur est connecté à un compte
     * 
     * @return bool
     */
    public static function isConnected() : bool {
        
    }

    /**
     * Méthode permettant de récupérer le Model de l'utilisateur connecté
     * 
     * @return \App\Models\User
     */
    public static function getUser() : \App\Models\User {
        
    }

    /**
     * Méthode permettant de savoir si l'utilisateur connecté est admin
     * 
     * @return bool
     */
    public static function isAdmin() : bool {
        
    }
}
```

#### Pourquoi abstract ???

Pour éviter d'être tenté de l'instancier, tout simplement. Toutes les méthodes sont statiques, elles ne nécessitent donc pas d'instance de cette classe. Donc autant interdire la construction d'instances, non ?

### Dernière chose

Tu l'auras peut-être remarqué mais, dans la BDD, les mots de passe des deux utilisateurs déjà présents sont écrits... bizarrement. Ils sont en fait hachés. Oui oui, comme du steak. Et c'est irréversible :astonished: Mais ce n'est pas plus mal : comme ça, impossible de récupérer le mot de passe en clair, même si une personne mal intentionnée arrive à accéder à ta base de données. C'est sécurisé :construction:

Et tu vas sûrement te demander comment comparer le mot de passe saisi par un utilisateur à ce ~~hachis~~ hash ?  
Eh bien, PHP a une manière bien particulière de hasher les mots de passe, il suit un très grand nombre d'étapes et les reproduit toujours dans le même ordre. Ce qui est cool, c'est qu'il nous fournit 2 fonctions : 1 pour _hasher_, 1 pour vérifier le mot de passe :sunglasses:  
Lors de la connexion ou de l'inscription de ton utilisateur, il te suffit donc de hasher le mot de passe qu'il a saisi et de le stocker (pour l'inscription) ou de le comparer/vérifier (pour la connexion). Et le tour est joué :tada: Plus d'info sur le sujet ici : https://www.php.net/manual/fr/faq.passwords.php