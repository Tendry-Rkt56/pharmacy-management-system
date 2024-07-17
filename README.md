# Projet de Gestion de Pharmacie

## Description
Ce projet est une application de gestion de pharmacie développée en PHP et JavaScript. L'application permet la gestion des médicaments, des catégories de médicaments, des ventes, et des utilisateurs.

## Fonctionnalités

### Admin
- Gérer les médicaments : Ajouter, modifier, supprimer des médicaments.
- Gérer les catégories de médicaments : Ajouter, modifier, supprimer des catégories.
- Supprimer des ventes dans la base de données.
  
### Utilisateurs
- Insérer les médicaments achetés par les clients.
- Modifier leur profil.

## Structure du Projet

- `app/` : Contient la logique principale de l'application.
  - `controller/` : Contient les contrôleurs.
  - `model/` : Contient les modèles.
  - `middleware/` : Contient les middlewares.
  - `views/` : Contient les vues.

- `config/` : Contient les configurations de l'application.
  - `DataBase.php` : Classe de connexion à la base de données.
  - `Router.php` : Fichier de routage utilisant Altorouter.
  - `Constante.php` : Fichier contenant les constantes pour la connexion à la base de données.

- `public/` : Contient les fichiers accessibles publiquement.
  - `index.php` : Point d'entrée de l'application.
  - `assets/` : Contient les scripts et les styles.
  - `components/` : Contient les fichiers réutilisables.

- **composer.json** : Fichier de configuration pour Composer, gérant les dépendances du projet.
- **vendor/** : Contient les bibliothèques et les dépendances installées via Composer.
- **pharmacie.sql** : Fichier SQL pour initialiser la base de données.

## Installation
- Excécution du Fichier SQL :
    Pour initialiser votre base de données avec le schéma et les données nécessaires, exécutez le fichier 'crud.sql' situé à la racine du projet dans votre SGBD 	 

- Modifier le fichier Constante.php dans le dossier config/ :
     ![illustration](public/image/code.png)
     Modifier les constantes de connexion avec vos informations

- Démarrez le serveur de développement :
    - Ouvrir le terminal et naviguez vers le répértoire où vous avez placé le projet et taper la commande :
    php -S localhost:8000 -t public
    - Ou démarrer votre serveur de développement (xampp, wampp, ...)

## Illustrations
![Illustration 1](public/image/illustrations/1.png)

![Illustration 1](public/image/illustrations/2.png)

![Illustration 1](public/image/illustrations/3.png)

![Illustration 1](public/image/illustrations/4.png)


## Contributions
Les contributions sont les bienvenues ! Veuillez ouvrir une issue ou soumettre une pull request pour toute amélioration ou correction de bugs.

## Contact
- **Nom** : Tendry Zéphyrin
- **Email** : tendryzephyrin@gmail.com
- **GitHub** : [Tendry-Rkt56](https://github.com/Tendry-Rkt56)