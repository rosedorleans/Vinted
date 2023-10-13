<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->
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
    <li><a href="#usage">Usage</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

[![Product Name Screen Shot][product-screenshot]](https://example.com)



<p align="right">Projet : Site de petites annonces</p>
<p align="right">Description : </p>
<p align="right">Développement d'une Plateforme d'Annonces de Biens d'Occasion avec Interface d'Administration sur Laravel.</p>
<p align="right">Introduction :</p>
<p align="right">
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
2. Install NPM packages
  ```sh
    npm run dev
  ```
  (et dans un autre terminal)
  ```sh
    php artisan serve
  ```

3. créer une BDD dans phpmyadmin
  changer .env : DB_DATABASE= (nomDelaBDD)
  ```sh
    php artisan migrate
  ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage



<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com