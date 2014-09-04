Application de suggestion de menu au hasard. 

Quand on clique sur "J'ai faim", cela renvoie un plat au hasard. 

Pour les plats, on crée une base de données : 

Plat 
- nom
- type (plat/dessert...)
- image 
- calories

Une fois la base de données créée, on créé un bouton "j'ai faim", sur lequel on applique un évènement Jquery, et avec AJAX on récupère les données de la base au hasard.


On peut imaginer ensuite de faire une page admin, permettant: 
- Formulaire d'ajout/modification des plats AJAX (affichage, soumission)
- Listing des plats
- Recherche, filtrage des plats