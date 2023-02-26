<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About Project

Web application in Laravel to manage a library of watched films, search for film information and recommend films to watch.

## Features

-   [x] Login and registration system
-   [x] User data editing system (username, email, password)
-   [x] Trending movies, series and actors from the past week
-   [x] Ability to display additional information about films, series and actors
-   [ ] Display user profile with Gravatar and "To View" and "Viewed" lists (under development)
-   [ ] Content-based recommendation system for series and movies (under development)
-   [ ] Search engine for movies, TV series and actors (under development)
-   [ ] Adding to the "Watched" and "To Watch" lists and the ability to "Watch" actors (under development)
-   [ ] Added langs to the application which makes translation easier (under development)

## Requirements

-   PHP >=8.1
-   Laravel >=9.0
-   Docker (for development environment)

## How to install

1. Download from the repository

```
git@github.com:wiluszdamian/MovieRecommender.git
cd MovieRecommender
```

2. Install dependencies

```
npm install
composer install
```

3. Launch the project with Laravel Sail (require Docker)

```
vendor/bin/sail up -d
npm run dev
```

4. Run the required commands

```
cp .env.example .env
vendor/bin/sail artisan key:generator
vendor/bin/sail artisan migrate
```

5. Set up TMDB API Key in .env

```
Line 60: TMDB_API_KEY=
```

6. The application was launched

```
http://localhost
```

## Author

-   **[Damian Wilusz](https://github.com/wiluszdamian)**

## Suggestions

If you want to propose new features, submit it in the section [Issues](https://github.com/wiluszdamian/MovieRecommender/issues), using the appropriate label.

## Bugs

If you discover a bug in this application, add a thread on the repository under the section [Issues](https://github.com/wiluszdamian/MovieRecommender/issues). Describe your bug report in detail, include all the data needed for reproduction.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://github.com/wiluszdamian/MovieRecommender/blob/main/LICENSE).
