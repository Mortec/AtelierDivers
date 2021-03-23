# jQuery un ami qui vous veut du bien :heart_eyes:

Dans cet atelier, nous allons écrire du Javascript, donc le code sera à faire dans notre dépôt _Frontend_ du projet oKanban.

Maintenant que nous avons vu comment manipuler le DOM avec jQuery et comment créer des éléments avec jQuery, on va pouvoir gérer les formulaires et générer le code HTML des listes et post-it :boom:

Et comme jQuery est sympa, il nous permet de faire des **requêtes Ajax** facilement. On va donc pas se priver pour récupérer des données en _Ajax_ :wink:

:bulb: **Tip**  
Il faut bien penser à décomposer son code dans plusieurs méthodes pour plus de clarté

## #1 Ajouter une "liste" dans le DOM

### Etape 1 - Formulaire d'ajout

- le formulaire d'ajout d'une liste se trouve dans la fenêtre "modal"
- intercepter la soumission de ce formulaire
- désactiver le fonctionnement par défaut
- récupérer la valeur dans l'input du formulaire
- appeler la méthode `app.generateListElement` (à créer à l'étape suivante) en donnant la valeur récupérée (de l'input) en paramètre
- récupérer le retour de la méthode dans une variable

<details><summary>Indices</summary>

- même dans une fenêtre "modal", le formulaire reste du code HTML, donc on peut y accéder en Javascript
- _intercepter la soumission de ce formulaire_ signifie écouter l'événement **submit** sur le formulaire
- _désactiver le fonctionnement par défaut_ signifie faire un _preventDefault()_ dans le handler de l'événement _submit_

</details>

### Etape 2 - Créer l'élément "liste"

- créer une méthode `generateListElement` dans `app` prenant en paramètre `listName`
- cette méthode s'occupe de créer l'élément
- analyser le code HTML nécessaire pour une "liste" vide => :sos: c'est une usine à gaz... des `div` dans des `div` dans des `div`...
- heureusement, le standard HTML évolue et il existe maintenant [la balise `<template>`](https://developer.mozilla.org/fr/docs/Web/HTML/Element/template) qui va nous sauver la vie :muscle: 
- copier le code HTML d'une liste vide, le coller dans une balise `<template>` tout en bas de votre HTML (ou tout en haut, la "meilleure" place pour un template HTML fait encore débat) et lui donner un id
- en jQuery, utiliser les méthodes [`.contents()`](http://api.jquery.com/contents/) et [`.clone()`](http://api.jquery.com/clone/) pour récupérer le contenu du template et le cloner dans une variable :tada:
- ne pas oublier d'appliquer les modifications nécessaires (_cette liste, elle a un nom, non ?_)
- à la fin, cette méthode retourne l'élément "liste" (=le clone)
- :warning: attention, cette méthode n'ajoute pas l'élément dans le DOM

<details><summary>Indices</summary>

- modifier `index.html` pour y ajouter le `<template>` contenant tout le HTML d'une liste vide
- donner un id au template, pour pouvoir le cibler facilement en jQuery
- que votre template contienne quelques balises ou plusieurs milliers, `$monTemplate.contents().clone()` retournera un clone intégral en quelques millisecondes :tada:
- ce clone est parcourable/traversable comme n'importe quel élément DOM ciblé en jQuery !
- attention à ne pas oublier l'étape de clonage, sinon vous allez juste déplacer le contenu du template pour le mettre dans votre collection et la prochaine fois que vous appellerez `$monTemplate.contents()`, ça ne retournera plus rien.

</details>  

<details><summary>Exemple</summary>

```html
<ul id="records"></ul>

<template id="empty-record">
    <li class="record">
        <h2 class="record-name"><!-- ici le nom du cd --></h2>
        <h3 class="record-singer"><!-- ici le chanteur --></h3>
        <p class="details record-release-date"><!-- ici la date de sortie --></p>
    </li>
</template>
```

```javascript
var magnolias = $("#empty-record").contents().clone();
// magnolias est un clone "vide", ajoutons les infos dans ses enfants
magnolias.find(".record-name").text("Magnolias for ever");
magnolias.find(".record-singer").text("Claude François");
magnolias.find(".record-release-date").text("décembre 1977");
// ne reste plus qu'à ajouter ce "record" à notre liste
$("#records").append(magnolias);
```
:warning: attention, cet exemple ajoute le clone à la "collection" d'éléments : notre fonction doit retourner le nouvel élément :wink:

</details>

### Etape 3 - Ajouter l'élément "liste" dans le DOM

- la méthode `generateListElement` nous a retourné un élément (disons `$listElement`)
- cibler l'élément dans lequel on souhaite ajouter la "liste"
- ajouter `$listElement` dans le DOM, dans l'élément cible

<details><summary>Indices</summary>

- la cible est le parent de toutes les "listes"
- car on doit pouvoir y ajouter les éléments "liste"

</details>

<details><summary>Réponse possible</summary>

```javascript
// ...
// Première version
$listElement.appendTo('#lists');
// Deuxième version
$('#lists').append($listElement);
// ...
```

</details>

### Etape 4 - Fermer la fenêtre Modal

- tout est dans le titre

<details><summary>Indices</summary>

- on effectue déjà cette action lorsqu'on souhaite fermer la fenêtre Modal
- on peut donc reprendre le même code

</details>

## #2 Ajouter toutes les listes au chargement du DOM

### Etape 1 - Supprimer les listes existantes au chargement du DOM

- cibler l'élément contenant toutes les listes
- vider cet élément

### Etape 2 - Récupérer toutes les listes en Ajax

- copier le dossier `/data` dans le repo _frontend_ du projet
- il contient 2 fichiers : `lists.json` et `cards.json`
- on considèrera ces 2 fichiers comme notre API, notre source de données à récupérer en Ajax
- suite à l'étape 1, effectuer un appel Ajax sur l'URL du fichier `lists.json`
- en response, on obtiendra le tableau de "list"
- une fois ce tableau stockée dans une variable ou une propriété, passer à l'étape 3
- :bulb: Tip : penser à faire des console.log réguliers afin de vérifier que les variables contiennent ce qu'on souhaite

<details><summary>Indices</summary>

- JSON = **J**ava**S**cript **O**bject **N**otation => c'est un objet JS
- le tableau récupéré en Ajax est un tableau d'objets JS

**Rappel** squelette d'un requête Ajax avec jQuery

```javascript
// Je souhaite faire un appel Ajax sur la page "sous-dossier/toto.php"
$.ajax(
  {
    url: 'sous-dossier/toto.php', // URL sur laquelle faire l'appel Ajax
    method: 'GET', // La méthode HTTP souhaité pour l'appel Ajax (GET ou POST)
    dataType: 'html', // Le type de données attendu en réponse (text, html, xml, json)
    data: { // (optionnel) Tableau contenant les données à envoyer avec la requête
        index: 'valeur envoyée en GET ou POST, comme un formulaire',
        second: 'seconde donnée envoyée'
    }
  }
).done(function(response) { // J'attache une fonction anonyme à l'évènement "Appel ajax fini avec succès" et je récupère le code de réponse en paramètre
    console.log(response); // debug
    
    // TODO faire les actions souhaitées après la récupération de la réponse
}).fail(function() { // J'attache une fonction anonyme à l'évènement "Appel ajax fini avec erreur"
    alert('Réponse ajax incorrecte');
});
```

</details>

### Etape 3 - Parcourir la liste de "list"

- une fois le tableau de "list" récupéré en Ajax
- parcourir le tableau contenu
- pour chaque valeur du tableau, générer un élément "liste" grâce à la méthode `generateListElement`
- pour chaque valeur du tableau, nous avons un `id` et un `name`
    - modifier la méthode `generateListElement` pour prendre un 2ème paramètre `listId`
    - appeler cette méthode dans la boucle en lui passant les données en argument/paramètre
    - récupérer l'élément "liste" en retour
    - et ajouter cet élément dans le DOM (comme précédemment)

<details><summary>Indices</summary>

- JSON = **J**ava**S**cript **O**bject **N**otation => c'est un objet JS
- le tableau récupéré en Ajax est un tableau d'objets JS

<details><summary>Aide sur les boucles en Javascript et avec jQuery</summary>

```javascript
// ...
var jsonArray = [
    {
        index: 'valeur',
        cle: 42
    },
    {
        index: 'valeur 2',
        cle: 422
    },
    {
        index: 'autre valeur du 3e élément',
        cle: 2
    }
];
// Javascript Vanilla
var currentJson; 
for (var currentIndex in jsonArray) {
    currentJson = jsonArray[currentIndex];

    // TODO écrire le code dans cette boucle
}
// jQuery
$.each(jsonArray, function(currentIndex, currentJson) {
    // TODO écrire le code dans cette boucle
});
// ...
```

</details>

</details>

## BONUS

[Clique ici pour voir les bonus, mais c'est à tes risques et périls...](bonus.md) :smiling_imp:
