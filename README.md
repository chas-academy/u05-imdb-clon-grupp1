[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Issues][issues-shield]][issues-url]


<br />
<p align="center">
  <h3 align="center">u05</h3>

  <p align="center">
    Description...
  </p>

  ![Mockup](/assets/Mockup.png?raw=true)
</p>

<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary><h2 style="display: inline-block">Table of Contents</h2></summary>
  <ol>
    <li><a href="#about-the-project">About The Project</a>
            <ul>
                <li><a href="#built-with">Built With</a></li>
                <li><a href="#code-standards">Code Standards</a></li>
            </ul>
    </li>  
    <li>
        <a href="#goals-and-context">Goals And Context</a>
            <ul>
                <li><a href="#project-solves">Project Solves?</a></li>
                <li><a href="#our-vision">Our Vision?</a></li>
            </ul>
    </li>
   <li>
        <a href="#getting-started">Getting Started</a>
            <ul>
                <li><a href="#installation">Installation</a></li>
            </ul>
   </li>
    <li><a href="#user-Personas">User Personas</a></li>
    <li><a href="#user-stories">User Stories</a></li>
    <li>
        <a href="#sitemap">Sitemap</a> 
            <ul>
                <li><a href="#er-diagram">ER-diagram</a></li>
            </ul>
    </li>
    <li><a href="#wireframes">Wireframes</a></li>
    <li><a href="#page-and-route-descriptions">Page And Route Descriptions</a></li>
    <li><a href="#license">License</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->

## About The Project

<!--[![](Image link)-->

### Built With

* [Sass](https://sass-lang.com)
* [AWS s3](https://s3.console.aws.amazon.com/s3)
* [Laravel](https://laravel.com)

### Code Standards
* [Psr-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md)
* [Psr-1](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md)

## Goals and Context
Our goal is to create a competent and smart website that gathers all relevant information about, and around movies.

### Project Solves?
At present, information about movies and managing lists of movies that one would like to see is too cumbersome for many competitors. By creating a more user-focused experience, this process can be facilitated and thus attract more visitors. With an increased interest in the service can also publish and administer film content

### Our Vision?
By creating a modern user experience, there is the opportunity to enter the market and thus get a large number of users. This in turn can in the long run create opportunities for advertising campaigns from various stakeholders such as product companies that offer sales of film-related products as well as service providers who may be interested in behavioral patterns and trends. Creating an exceptional experience, on mobile as well as in the browser can potentially create a viral reception of users.



<!-- GETTING STARTED -->
## Getting Started


### Installation
<!--Insert Installation example. ex, npm install... -->

1. Run composer
```
composer install
```

2. Install npm dependencies
```
npm install
```
3. Setup AWS s3 Bucket in .env
```
AWS_ACCESS_KEY_ID=xxxx-xxxx-xxxx
AWS_SECRET_ACCESS_KEY=xxxx-xxxx-xxxx-xxxx
AWS_DEFAULT_REGION=eu-north-1
AWS_BUCKET=xxxx-xxxx-xxxx
```
4. Fix db in .env 
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=xxxx
DB_USERNAME=root
DB_PASSWORD=
```

5. Run php artisan serve

```
php artisan serve
```
6. You're **done**! 🎉




## User Personas

| Data        | Description |
| ----------- | ----------- |
| Usertype    | David Hult |
| Name        | Active User  |
| Gender      | Male        |
| Age         | 20          |
| Education   | Stockholms University of the Arts|
| City        | Stockholm   |
| Goal        | David is an active user on IMDb and mainly uses it to search for movie information and heavily relies on the search filter function. David would also love to see an improved trailer watching experience with a genre filter.|



## User Stories

### Website Users
As a Website User, I am busy and have little time to find information about movies. I want to be able to find information about movies quickly and painlessly. Ideally with as few clicks as possible.

As a Website User, finding the correct movie is vital. I want to see different results of movies in a clear and concise manner so that I can easily know which movies I should watch, or learn more about.

###    Website Registered Users
As a Registered Website User, I am concerned with keeping track of what movies I want to watch, what movies I’m reviewing, have reviewed or am planning to review. I want to have the possibility to manage several lists of movies I want to watch, as well as movies I am currently reviewing or have planned to review.

### Website Admin
As a Admin, I want to be able to add new movies and information about movies in a ordered way. I need to have the possibility to separate movies into different categories and provide additional metadata about each movie, as well as linking them to actors, directors and so on.

As a Admin, I want to be able to track what users of the website are doing in terms of reviewing movies and putting in their watchlists. I’d also want to be able to grant and remove roles to different users, granting them access to specific functionality as either an admin or restricting them to a regular user.



## Sitemap (old)

<!--Insert Sitemap-->
![Sitemap](/assets/Sitemap.png?raw=true)

### ER-diagram (old)
![Er-diagram](/assets/erdiagram.png?raw=true)

## Wireframes

### Wireframe
![Wireframe](/assets/Wireframe-u05.png?raw=true)
![Wireframe-assist](/assets/Wireframe-u05-explain.png?raw=true)
### Prototype
<!--Insert Adobe XD file download-->
<!--Insert prototype Image-->
![Mockup](/assets/Mockup-grid.png?raw=true)


## Page and Route Descriptions

| Page        | Items       |
| ----------- | ----------- |
| **Landing page** <br /> <br /> /  | 1. Search <br /> 2. New releases <br /> 3. Top movies |  <br /> 4. Coming soon |
| **Login, signup etc.** <br /> <br /> /login <br /> /logout <br /> /register <br /> /password/reset | Self-explanatory routes and methods for authentication  |
| **User profile** <br /> <br /> /user/{user_id} <br /> /user/{user_id}/watchlist <br /> /user/{user_id}/reviewlists <br /> /user/{user_id}/settings | Routes related to the user  |
| **Item page** <br /> <br /> /title/{title_id} <br /> /title/{title_id}/reviews | Routes related to movies |
| **Top rated** <br /> <br /> /chart/top <br /> /chart/new| Top rated movies |
| **Admin** <br /> <br /> /admin/dashboard <br /> /admin/users <br /> /admin/movies | Administrative related routes |

<!-- | **Genre Page** <br /> <br /> /genre/{genre} | Route for showing movies and TV-shows by genre | -->


## License

Distributed under the GNU GPLv3 License. 



## Team Linkedin/GitHub
<!--Insert team members-->
*Enzo Bomark* [GitHub](https://github.com/EnzoBomark) - [LinkedIn](https://www.linkedin.com/in/enzo-bomark-9046651b1/)<br>
*Jamil Bariche* [GitHub](https://github.com/jamil-source) - [LinkedIn](https://www.linkedin.com/in/jamil-bariche-25561b189/)<br>
*Pernilla Hällgren* [GitHub](https://github.com/pernilla-hallgren) - [LinkedIn](www.linkedin.com/in/pernilla-hällgren-0a64aa25)<br>
*Anna Pääjärvi* [GitHub](https://github.com/apaajarvi) - [LinkedIn](https://www.linkedin.com/in/anna-pääjärvi-71709a205/)<br>

<!-- MARKDOWN LINKS & IMAGES -->
[contributors-shield]: https://img.shields.io/github/contributors/chas-academy/u05-imdb-clon-grupp1.svg?style=for-the-badge
[contributors-url]: https://github.com/chas-academy/u05-imdb-clon-grupp1/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/chas-academy/u05-imdb-clon-grupp1.svg?style=for-the-badge
[forks-url]: https://github.com/chas-academy/u05-imdb-clon-grupp1/network/members
[issues-shield]: https://img.shields.io/github/issues/chas-academy/u05-imdb-clon-grupp1.svg?style=for-the-badge
[issues-url]: https://github.com/chas-academy/u05-imdb-clon-grupp1/issues

