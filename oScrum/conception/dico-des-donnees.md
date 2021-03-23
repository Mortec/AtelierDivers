# Dictionnaire de données

## Cartes (`card`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de notre carte|
| title | VARCHAR(255) | NOT NULL |Le titre de la carte|
| list_order | TINYINT | UNSIGNED, NOT NULL |L'ordre de la carte dans la liste|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création de la carte|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour de la carte|
|list|entity|NULL|La liste dans laquelle la carte se trouve|
|label|entity|NULL|Le(s) label(s) attaché(s) à la carte|

## Listes (`list`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de la liste|
| name | VARCHAR(30) | NOT NULL |Le nom de la liste|
| page_order | TINYINT | NOT NULL, UNSIGNED |L'ordre d'affichage de la liste dans la page|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création de la liste|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour de la liste|

## Labels (`label`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant du label|
| name | VARCHAR(30) | NOT NULL |Le nom du label|
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création du label|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour du label|