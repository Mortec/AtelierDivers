# Documentation de l'API

| Endpoint | Méthode HTTP | Donnée(s) | Description |
|--|--|--|--|
| `/lists` | GET | - | Récupération des données de toutes les listes |
| `/lists/add` | POST | listName | Ajouter une nouvelle liste dont le nom est fourni dans listName |
| `/lists/[id]` | GET | - | Récupération des données de la liste dont l'id est fourni |
| `/lists/[id]/update` | POST | listName, pageOrder | Changer l'ordre de la liste et changer son nom |
| `/lists/[id]/delete` | POST | - | Supprimer une liste |
| `/lists/[id]/cards/add` | POST | cardName | Ajout d'un post-it |
| `/lists/[id]/cards` | GET | - | Récupération de tous les post-it de la liste dont l'id est fourni |
| `/cards` | GET | - | Récupération des données de tous les post-it |
| `/cards/[id]/update` | POST | cardName, listId, listOrder | Modification des données du post-it dont l'id est fourni |
| `/cards/[id]/delete` | POST | - | Suppression du post-it dont l'id est fourni |
| `/labels` | GET | - | Récupération des données de toutes les étiquettes |
| `/labels/add` | POST | labelName | Ajout d'une nouvelle étiquette |
| `/labels/[id]` | GET | - | Récupération des informations sur l'étiquette |
| `/labels/[id]/update` | POST | labelName | Mise à jour d'une étiquette |
| `/labels/[id]/delete` | POST | - | Suppression d'une étiquette |
| `/cards/[id]/labels` | GET | - | Récupération des étiquettes affectées au post-it dont l'id est fourni |
| `/cards/[id]/labels/add` | POST | - | Affectation d'une étiquette au post-it dont l'id est fourni |
| `/cards/[id]/labels/[id]/delete` | POST | - | Désaffectation de l'étiquette dont l'id est fourni au post-it dont l'id est fourni |