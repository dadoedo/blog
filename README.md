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
- Create user for login:
```
php bin/console security:hash-password
```
will let you hash a password, take the value and insert it to `user` table
```
insert into "user" (id, email, roles, password, user_type, updated_at, created_at) values (1, 'admin@admin.com', '["ROLE_ADMIN"]', '{yourHashedPassword}', 'user', now(), now() )
```
---