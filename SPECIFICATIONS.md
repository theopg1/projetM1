# Cahier des charges Projet M1 : Création Goodreads pour les Manga / Anime
Rédigé le 27/06/2022
Frot Andy, Gabsi Théo, Ricard Fabien, Amiot Kris 

## Description du projet :

Goodreads est l'un des plus grands sites internet de recommandations de livres. Depuis 2007, il aide ses utilisateurs à trouver et partager leurs livres préférés, voir quels livres leurs amis lisent ou ont lu. Notre mission est de reproduire le service fourni par Goodreads, dans le domaine des mangas et des animes.


## Besoins liés au projet : 
La page d'accueil du site permettra aux visiteurs de voir les anime/manga les mieux notés, et elle leur permettra également de pouvoir rechercher un manga/anime grâce à son titre.

Chaque manga/anime aura une page qui lui est propre, où il sera possible de consulter ses titres Anglais et Japonais, son synopsis, le nombre d'épisodes, sa note globale, ainsi que les commentaires laissées par les utilisateurs.

Il devra être possible pour les utilisateurs de créer un compte, et d'avoir une page de profil liée à ce compte qui pourra être personnalisée par son propriétaire et qui sera visible par les autres utilisateurs.

Les comptes utilisateurs seront des comptes « membres », qui pourront rechercher des anime ou des manga, afin d'y laisser un commentaire et une note qui seront également visibles par les autres utilisateurs. Tous les commentaires et toutes les notes laissés par un utilisateur seront répertoriés sur sa page de profil.

Il y aura des comptes « modérateurs » qui seront les gérants de la plate-forme. Les comptes « membres » pourront supprimer, modifier, lire et sauvegarder leurs propres commentaires et notes sur un anime/manga. Les comptes « modérateurs » auront accès à un tableau de bord permettant de lister les membres inscrits, les manga, les animes, commentaires et notes. Ils pourront créer et supprimer des animes, des mangas, ainsi que supprimer des membres et leurs publications.


## Contraintes :
Aucune contrainte de langage nous a été donnée, nous partons donc sur une application en PHP 7 avec Symfony 4.4. Le site devra être accessible sur la majorité des navigateurs et appareils, quelque soient leur puissance et leur taille.


## Solutions :
Le projet suit le schèma Model-Vue-Controller, utilisant comme modèles les Mangas/Animes, les Membres, les Avis, les Roles et les Genres. Chaque Manga/Anime comporte un ou plusieurs Avis et un ou plusieurs Genres ; et chaque Membre comporte un ou plusieurs Avis et un ou plusieurs Rôles.
