<a name="readme-top"></a>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#avancee">Avancée</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

<h1>Projet : Site de petites annonces</h1>
<h2>Description : </h2>
<p>Développement d'une Plateforme d'Annonces de Biens d'Occasion avec Interface d'Administration sur Laravel.</p>
<h2>Introduction :</h2>
<p>
  Le projet se concentre sur la création d'une plateforme en ligne permettant aux utilisateurs de publier des annonces pour des biens d'occasion. Cette plateforme sera développée en utilisant le framework Laravel en PHP et comportera également une interface d'administration pour la gestion du contenu de super admin.
  L'interface d'administration permettra aux administrateurs de gérer le contenu du site, de valider ou de refuser les annonces soumises, de gérer les comptes d'utilisateurs, et de surveiller l'activité du site.
  Des fonctionnalités de sécurité telles que la validation des données, la protection contre les attaques CSRF, et la gestion des sessions devront être implémentées pour assurer la sécurité des utilisateurs.
</p>


<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built With

* [![Laravel][Laravel.com]][Laravel-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

* PHP 8.1.13
* 
  ```sh
    nvm install lts
  ```

### Installation

1. Cloner le repo
    ```sh
        git clone https://github.com/rosedorleans/Vinted.git
    ```
2. Installer NPM packages
    ```sh
        npm install
    ```
    ou alors
    ```sh
        npm install --global yarn
    ```
    et
    ```sh
        yarn install
    ```
    
2. Lancer le serveur
    ```sh
        npm run dev
    ```
    puis dans un autre terminal
    ```sh
        php artisan serve
    ```

3. créer une BDD dans phpmyadmin <br>
    changer .env : DB_DATABASE= (nomDelaBDD)
    ```sh
        php artisan migrate
    ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- Avancée -->
## avancee

- [x] Une page public avec toutes les annonces listées.
- [x] Une page de détails pour chaque annonce.
- [x] L’utilisateur pourra modifier son annonce.
- [x] L’utilisateur pourra supprimer son annonce.
- [ ] Possibilité d'uploader une photo.
- [x] Un utilisateur ne pourra pas altérer les annonces des autres utilisateurs.
- [x] Un utilisateur connecté peut voir le contact d’un autre utilisateur pour le contacter sur une annonce.
- [x] Un utilisateur non connecté peut voir une annonce mais pas les informations de contact.
- [x] Un utilisateur doit être connecté pour créer une annonce.
- [x] Lorsqu’un admin se connecte, il a accès à un crud gérer les annonces.

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com