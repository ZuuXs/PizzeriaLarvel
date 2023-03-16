
# Site de Pizza


## Présentation du Site
<p> <strong>Le site permet d'effectuer des commandes de pizza(à emporter), il comporte 3 acteurs : </strong></p>
<ul>
<li>Les utilisateurs: ils peuvent parcourir la liste des pizzas, les rajouter au panier, passer la commande et en être informé de son statut</li>
<li>Le gérant (administrateur) du site: il peut rajouter/modifier les pizzas, voir l’état des commandes, ainsi que la recette du jour</li>
<li>Le pizzaiolo: il peut voir les commandes dans l’ordre et de changer leur statut</li>
 </ul>
 
## Fonctionnalités
<ol>
    <li>
       <strong>Administrateur : </strong></li>
    
<ul>
 <li> Gestion des pizzas :
    <ul> 
      <li>Ajouter une nouvelle pizza</li>
      <li>Voir la liste des pizzas</li>
      <li>Changer le descriptif ou le nom d’une pizza</li>
      <li>«Supprimer» une pizza(une pizza déjà commandée ne peut pas être supprimée définitivement –uniquement en utilisant SoftDelete)</li>  
      <li>Mettre à jour l’image associée à la pizza (lors de l’ajout ou de la modification)</li>
   </ul>    
 </li>
   
 <li> Gestion des commandes:
    <ul> 
      <li>Afficher la liste des commandes pour une date</li>
      <li>Afficher la liste des commandes du jour triées par le statut et la date</li>
      <li>Afficher la liste de toutes les commandes (avec pagination)</li>
      <li>Afficher la recette du jour</li> 
      <li>Voir le détail d’une commande(pizzaset prix total)</li>   

   </ul> 
   
   
 </li>

 <li> Gestion des utilisateurs :
    <ul> 
      <li>Changer son mot de passe</li>
      <li>Créer un utilisateur administrateur</li>
      <li>Créer un pizzaiolo</li>
      <li>Changer le mot de passe du pizzaiolo</li> 
      <li>Supprimer un utilisateur (admin ou pizzaiolo)</li>   

   </ul>  
 </li>      
 </ul>
 
 </br>
 <li><strong> Pizzaiolo : </strong></li>
 <ul>
    <li>Voir la liste des commandes non-traitées (triée parle moment d’arrivée) </li>
    <li>Voir le détail des commandes non-traitées</li>
    <li> MAJ du statut de la commande (en traitement, prête, récupérée)</li>
    <li>Changer son mot de passe</li>
    </ul>
    </br>
 <li><strong> Utilisateurs : </strong></li>
 <ul>
 
 <li> Gestion du compte :
    <ul> 
      <li>Création du compte</li>
      <li>Changement de son mot de passe</li>
      
   </ul>    
 </li>
 
 <li> Commande pizza :
    <ul> 
      <li>Liste des pizzas (avec pagination)</li>
      <li>Ajout de pizza dans le panier</li>
      <li>Modification de la quantité des pizzas dans le panier</li>
      <li>Suppression des pizzas du panier</li>
      <li>Affichage du prix total et passage de la commande</li>    
   </ul>   
    
 </li>
 
  <li> Gestion des commandes :
    <ul> 
      <li>Voir la liste des commandes passées triées par date (avec pagination))</li>
      <li>Voir le détail de la commande (pizzas et prix total)r</li>
      <li>Voir les commandes non-récupérées(statuts envoyé,  en traitement, prête)</li> 
   </ul>   
    
 </li>

</ul>
 
 
 </ol>
 </br>
 
## Base de données :
<ul>
    <li>users (id,nom,prenom,login,mdp,type)</li> 
    <li>pizzas(id,nom,description,prix,created_at,updated_at,deleted_at)</li>
    <li>commandes(id,user_id,statut,created_at,updated_at)</li>
    <li>commande_pizza(commande_id,pizza_id,qte)</li>
 </ul>

<br/>



## Outils Utilisés :

Framework Laravel, PHP, Base de Données Sqlite, HTML, CSS. 


