Voici le schéma Mermaid de ma Database SQL pour ce projet Twitter :

![Database](storage/app/public/images/mermaid.png)

Ici, nous pouvons en déduire :

-   4 Models :

*   Users **hasMany** Answers, Tweets, Likes
*   Tweets **hasMany** Answers, Likes || belongsTo Users
*   Likes **belongsTo** Users, Tweets
*   Answers **belongsTo** Users, Tweets

-   3 Factories & Seeders associats (exclusion du Like)

*   **UserSeeder** se charge d'implémenter un utilisateur permanent du pseudo de _Separa_, compte qui possède toutes les valeurs d'User possibles.

Pour agencer nos pages Twitter, nous aurons accès à ces vues :

-   Feed principal
-   Membres du Twitter
-   Profil d'un User
-   Profil de l'User authentifié
-   Vue d'un Tweet
-   Ajout d'un Tweet

Les contrôleurs sont les suivants :

-   **AccueilController** s'occupe d'afficher les Tweets dans un feed principal en sélectionnant tous les Tweets de la DB en méthode **index**
-   **UserController** s'occupe

*   d'afficher les Utilisateurs du projet en sélectionnant tous les Users de la DB en méthode **index**
*   d'afficher les profils de l'Utilisateur sélectionné en méthode **show ($id)**

-   **ProfilController** permet la gestion du profil de l'utilisateur connecté
-   **TweetController** permet la création de Tweets (**create** & **edit**), l'affichage individuel de ces Tweets (**show ($id)**), et la gestion de commentaires en rapport avec un Tweet
-   **LikeController** permet la gestion des Likes avec un **store**

Une fois la schématisation, l'implémentation et les liaisons du projet réalisés, il était important de gérer l'affichage grâce à **Tailwind**. Le projet opte ici pour un affichage en sidenav fixe afin de conserver l'accès aux fonctionnalités (Tweet, Log Out, ...) en toutes circonstances durant la navigation des Tweets.
