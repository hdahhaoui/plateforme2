# Codify

Bienvenue dans la documentation du projet de fin d'études réalisé pour l'obtention du DUT en 2022. Ce projet consiste en une plateforme de services freelance, offrant une interface pour les clients et les freelancers afin de faciliter la collaboration et la réalisation de divers projets.

## Description du Projet
Ce projet vise à créer une plateforme web permettant aux utilisateurs de trouver des freelancers pour divers besoins, tels que le développement web, le design graphique, la rédaction, etc. Les freelancers peuvent créer des profils détaillés présentant leurs compétences, leur expérience et leurs tarifs, tandis que les clients peuvent publier des projets et engager des freelancers pour les réaliser.

## Fonctionnalités Principales

- **Inscription et Profilage**: Les utilisateurs peuvent s'inscrire en tant que client ou freelancer et compléter leurs profils avec des informations pertinentes.
- **Publication de Projets**: Les clients peuvent publier des descriptions détaillées de leurs projets, y compris les exigences, les délais et les budgets.
- **Recherche et Filtrage**: Les utilisateurs peuvent rechercher des freelancers en fonction de critères spécifiques tels que les compétences, les avis clients et les tarifs.
- **Messagerie Intégrée**: Une messagerie interne permet aux clients et aux freelancers de communiquer facilement pour discuter des détails du projet.
- **Gestion des Projets**: Les clients peuvent suivre l'avancement de leurs projets, échanger des fichiers et valider les livrables.
- **Système de Paiement**: Intégration d'un système de paiement sécurisé pour faciliter les transactions entre les clients et les freelancers.

## Screenshots de l'application
-**Page d'atterrissage côté Client**
<img width="960" alt="client" src="https://github.com/hemza1/freelancing_platform/assets/47822519/30dfcbf4-8e9c-4d3c-9e38-a51f719c552c">
-**Page d'atterrissage côté Freelancer**
<img width="949" alt="freelancer" src="https://github.com/hemza1/freelancing_platform/assets/47822519/90782012-d5d1-450b-a916-70c6463ec739">
-**Liste des projets à postuler pour le freelancer**
<img width="663" alt="login2" src="https://github.com/hemza1/freelancing_platform/assets/47822519/94db52f3-5b8c-4e2b-a385-89911368d487">
<img width="660" alt="login" src="https://github.com/hemza1/freelancing_platform/assets/47822519/f4bc7007-3ce4-47bc-b142-6e4b427ea4ec">

-**création de projet pour le client**
<img width="474" alt="projet" src="https://github.com/hemza1/freelancing_platform/assets/47822519/eaeac081-b8e0-4c3a-8ee7-88482d908dd5">








## Installation et Configuration

1. **Cloner le Répertoire**: Clonez ce dépôt sur votre machine locale en utilisant la commande suivante :
    ```bash
    git clone https://github.com/hemza1/freelancing_platform
    ```

2. **Configuration de la Base de Données**: Configurez les paramètres de la base de données dans le fichier `config/database.php`.

3. **Installation des Dépendances**: Exécutez la commande suivante pour installer les dépendances nécessaires :
    ```bash
    composer install
    ```

4. **Migration de la Base de Données**: Exécutez les migrations pour créer les tables requises dans la base de données :
    ```bash
    php artisan migrate
    ```

5. **Lancement du Serveur**: Lancez le serveur en utilisant la commande suivante :
    ```bash
    php artisan serve
    ```
