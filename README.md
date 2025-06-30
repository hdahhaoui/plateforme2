# Codify

Bienvenue dans la documentation du projet de fin d'études réalisé pour l'obtention du DUT en 2022. Le projet a d'abord été pensé comme une plateforme de services freelance et a évolué pour devenir un outil de collaboration entre le département de génie civil et ses partenaires socioéconomiques. Il permet désormais de rapprocher les enseignants‑chercheurs et les entreprises autour de projets communs.

## Description du Projet
La plateforme facilite la mise en relation entre les enseignants‑chercheurs du département de génie civil et les entreprises ou organismes souhaitant collaborer. Les enseignants renseignent leurs spécialités (structures, géotechnique, transport, etc.), tandis que les partenaires publient leurs besoins ou projets en génie civil afin de trouver les compétences adaptées.

## Fonctionnalités Principales

- **Inscription et Profilage**: Les utilisateurs s'enregistrent en tant que partenaire ou enseignant‑chercheur et complètent leurs profils avec les informations nécessaires.
- **Publication de Projets**: Les partenaires décrivent leurs besoins en génie civil en précisant les compétences recherchées, les délais et le budget.
- **Recherche et Filtrage**: Les partenaires peuvent filtrer les enseignants‑chercheurs selon leurs spécialités et leurs réalisations.
- **Messagerie Intégrée**: Une messagerie interne facilite les échanges entre partenaires et enseignants‑chercheurs.
- **Gestion des Projets**: Les partenaires suivent l'avancement de leurs projets et partagent les documents utiles.

## Installation et Configuration

1. **Cloner le Répertoire**: Clonez ce dépôt sur votre machine locale en utilisant la commande suivante :
    ```bash
    git clone https://github.com/hemza1/freelancing_platform
    ```

2. **Configuration de la Base de Données**: Configurez les paramètres de connexion dans le fichier `include/config.php`.

3. **Création des Tables**: Importez le fichier `db/schema.sql` dans votre base de données. Par exemple :
    ```bash
    mysql -u <user> -p freelancing_platform < db/schema.sql
    ```


   Le fichier `schema.sql` crée notamment la table `projects` contenant les champs `id`, `user_id`, `title`, `description`, `budget`, `deadline`, `status` et `created_at`.


4. **Installation des Dépendances**: Exécutez la commande suivante pour installer les dépendances nécessaires :
    ```bash
    composer install
    ```

5. **Migration de la Base de Données**: Exécutez les migrations pour créer les tables requises dans la base de données :
    ```bash

    php artisan migrate
    ```
6. **Lancement du Serveur**: Lancez le serveur en utilisant la commande suivante :
    ```bash
    php artisan serve
    ```

    ## Screenshots de l'application

    ### Page d'atterrissage côté Partenaire
    <img width="960" alt="client" src="https://github.com/hemza1/freelancing_platform/assets/47822519/30dfcbf4-8e9c-4d3c-9e38-a51f719c552c">
    
    ### Page d'atterrissage côté Enseignant‑Chercheur
    <img width="949" alt="freelancer" src="https://github.com/hemza1/freelancing_platform/assets/47822519/90782012-d5d1-450b-a916-70c6463ec739">
    
    ### Liste des projets destinés à l'enseignant‑chercheur
    <img width="663" alt="login2" src="https://github.com/hemza1/freelancing_platform/assets/47822519/94db52f3-5b8c-4e2b-a385-89911368d487">
    <img width="660" alt="login" src="https://github.com/hemza1/freelancing_platform/assets/47822519/f4bc7007-3ce4-47bc-b142-6e4b427ea4ec">
    
    ### Création de projet pour le partenaire
    <img width="474" alt="projet" src="https://github.com/hemza1/freelancing_platform/assets/47822519/eaeac081-b8e0-4c3a-8ee7-88482d908dd5">


