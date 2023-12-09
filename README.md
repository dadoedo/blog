# App

Starting project for presentation and tinkering purposes.

Main Idea - A Portal for Companies to search for candidates. API + WebApp. Probably EasyAdmin later.


- SIT Single Table inheritance User -> (Company, Candidate)
- PHP8 properties
- M to N Bidirectional Relationship between Candidates and Skills

---
Setup
- 
- in root folder
````
docker compose up -d
````
- in PHP container (`docker compose exec php bash`)
````
composer install
php bin/console assets:install public
php bin/console cache:clear
````

