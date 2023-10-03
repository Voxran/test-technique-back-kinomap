# Kinomap – Test Technique Back

## Énoncé

Nous avons fait la demande pour réaliser un PoC sur un sujet qui nous tient à cœur : la réalisation d'une app Laravel.

L'application devait contenir plusieurs fonctionnalités censées nous mettre sur la bonne piste pour réaliser la refonte de notre API.

L'agence en charge du projet n'a pas pu mener celui-ci à bien et elle a mi la clé sous la porte.

Vous serez donc en charge de prendre la relève de l'agence et de réaliser les derniers éléments du backlog.

## Backlog

- [x] Installer une base SQLite
- [x] Créer une migration
  - [x] Créer une table `activities` contenant : 
    - [x] un ID
    - [x] le nom de l'activité
    - [x] sa description
    - [x] la durée de l'activité (format 12:54:32)
    - [x] date de création et d'édition.
  - [x] Créer une table `users` contenant :
    - [x] un ID
    - [x] un nom
    - [x] un email
  - [x] Créer une table `activity_data` contenant :
    - [x] l'ID de l'activité
    - [x] l'ID de l'utilisateur
    - [x] la seconde à laquelle la capture a été faite (instant T) 
    - [x] la vitesse de l'utilisateur a l'instant T
  - [x] Créer une seed permettant de remplir les 3 tables avec de la fausse data
  - [x] Créer les routes suivantes : 
    - [x] `GET /users` // liste tous les utilisateurs (paginé) 
    - [x] `GET /users/:id` // récupère un utilisateur
    - [x] `GET /activities` // liste toutes les activités (paginé) 
    - [x] `GET /activities/:id` // récupère une activité
    - [x] `GET /users/:id/activities/:id` // récupère la performance de l'utilisateur
      - [x] Pour cette route, tous les points de vitesse doivent être disponibles, en plus de la vitesse moyenne
  - [x] Besoin ponctuel :
    - [x] On aimerait une commande pour compter le nombre de mots dans un fichier texte
    - [x] La commande doit être rapide

## Modalité du rendu

Merci de fork le projet sur un repo privé, puis de donner l'accès à [dev-back@kinomap.net](mailto:dev-back@kinomap.net).

Pas de chronomètre, mais fixez-vous une durée d'une heure pour réaliser le projet.
Ne pas finir certaines tâches du backlog n'est pas éliminatoire.