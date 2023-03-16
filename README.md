On vous propose de créer un site pour effectuer des commandes de pizza (à emporter). Ce site comporte 3 acteurs :
a. Les utilisateurs : ils peuvent parcourir la liste des pizzas, les rajouter au panier, passer la commande et en être
informé de son statut.
b. Le gérant (administrateur) du site : il peut rajouter/modifier les pizzas, voir l’état des commandes, ainsi que la
recette du jour.
c. Le pizzaiolo : il peut voir les commandes dans l’ordre et de changer leur statut.
Le site doit permettre d'effectuer les opérations suivantes:

1. Pour les administrateurs :
1.1. Gestion des pizzas
1.1.1.Ajouter une nouvelle pizza.
1.1.2.Voir la liste des pizzas.
1.1.3.Changer le descriptif ou le nom d’une pizza.
1.1.4.« Supprimer » une pizza (une pizza déjà commandée ne peut pas être supprimée définitivement –
uniquement en utilisant SoftDelete).
1.1.5.Mettre à jour l’image associée à la pizza (lors de l’ajout ou de la modification)
1.2. Gestion des commandes :
1.2.1.Afficher la liste des commandes pour une date.
1.2.2.Afficher la liste des commandes du jour triées par le statut et la date.
1.2.3.Afficher la liste de toutes les commandes (avec pagination).
1.2.4.Afficher la recette du jour.
1.2.5.Voir le détail d’une commande (pizzas et prix total).
1.3. Gestion des utilisateurs :
1.3.1.Changer son mot de passe.
1.3.2.Créer un utilisateur administrateur.
1.3.3.Créer un pizzaiolo.
1.3.4.Changer le mot de passe du pizzaiolo.
1.3.5.Supprimer un utilisateur (admin ou pizzaiolo).
2. Pour le pizzaiolo :
2.1. Voir la liste des commandes non-traitées (triée par le moment d’arrivée).
2.2. Voir le détail des commandes non-traitées.
2.3. MAJ du statut de la commande (en traitement, prête, récupérée).
2.4. Changer son mot de passe.
3. Pour l’utilisateur :
3.1. Gestion du compte :
3.1.1.Création du compte.
3.1.2.Changement de son mot de passe.
3.2. Commande pizza :
3.2.1.Liste des pizzas (avec pagination).
3.2.2.Ajout de pizza dans le panier.
3.2.3.Modification de la quantité des pizzas dans le panier.
3.2.4.Suppression des pizzas du panier.
3.2.5.Affichage du prix total et passage de la commande.
3.3. Gestion des commandes :
3.3.1.Voir la liste des commandes passées triées par date (avec pagination).
3.3.2.Voir le détail de la commande (pizzas et prix total).
3.3.3.Voir les commandes non-récupérées (statuts envoyé, en traitement, prête).

La base de données :
• users (id,nom,prenom,login,mdp,type)
• pizzas(id,nom,description,prix,created_at,updated_at,deleted_at)
• commandes(id,user_id,statut,created_at,updated_at)
• commande_pizza(commande_id,pizza_id,qte)
