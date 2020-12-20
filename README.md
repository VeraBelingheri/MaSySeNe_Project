# MaSySeNe_Project

Management of System Security and Networks project 2020 - 2021

## NOTE: this is the insecure application. If you want the secure application, please switch to the MAIN branch

# HOW TO

1. Download the repository (branch MAIN)
2. Use WAMP/XAMPP or similiar
3. Move the directory "project-team-insecure" inside the localhost root (so that you have http://localhost/project-team-insecure/)
4. Create a folder in localhost named "MaSySeNe_Project"
5. Move the directory "api" inside the folder created in the 4th point
6. Create a db called "networksecurity" and import the .sql file present in the folder "api/db"
7. Access http://localhost/project-team-insecure/

# HOW TO - "ATTACKS"

## SQL INJECTION

### IN LOGIN:

In username/password and password
a' OR 'abc'='abc

## XSS STORED

### In a new comment

<img src="notValidUrl" onerror=alert("OH&nbsp;NO&nbsp;SONO&nbsp;STATO&nbsp;BUCATO!&nbsp;ACCIPICCHIA")>

## CSRF

### WITH A SESSION ACTIVE ON http://localhost/project-team-insecure/ OPEN

Go to http://trasformadigitale.it/attacco-csrf.html and reload http://localhost/project-team-insecure/ to see the attack succeeded

## NOTICE: THE ATTACCK WILL BE BLOCKED BY CHROME, USE FIREFOX!
