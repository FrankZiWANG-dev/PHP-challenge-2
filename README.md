# Project COGIP CRM
## Introduction
This project is a mock invoicing system for a fake company, created during our web development training at Becode.

## Accessing the project (IMPORTANT!)
### Links
Here is the link to the project itself:
https://cogip-crm.000webhostapp.com/

Here is the link to the mockup:
https://www.canva.com/design/DAEoBXeGdrw/nox0rUSXby_oUc9020YtUw/watch?utm_content=DAEoBXeGdrw&utm_campaign=designshare&utm_medium=link&utm_source=sharebutton.

### Log in
To access the website, you must first log in.

To access as admin, the username is Jean-Christian and the password is ranu.
To access as moderator (only reading and adding functionalities), the username is Muriel and the password is perrache.
To access as user (only reading functionalities), the username is User and the password is user.

## Instructions of the project
The initial instructions of the project are available at this url:
https://github.com/becodeorg/CRL-Keller-3.31/blob/master/LearningPath/03.The-Mountain/09.PHP/PHP-Challenge/cogip/README.md.

## Functionalities
The website allows the user (depending on permission) to add, update and delete companies (clients / providers), invoices and contacts.

## Roadmap and technologies
The project was completed within two weeks, with daily meetings, deliverable product as often as possible and several different versions.

After receiving the objectives, work was divided between the team members, an MVC architecture was realised, as well as a wireframe and a mockup (using Canva).
During the first week, backend functionalities were implemented (in PHP), starting with the MySQL database and the CRUD on the dashboard.
During development, the application was locally hosted using MAMP / LAMP.
During the second week, the other backend functionalities and the basic visual layout were added.
After regrouping the code, further styling was added (using CSS), the application was tested (including Lighthouse and ValidatorW3) and deployed using 000Webhost.

## Contributors
    - Marianne AUQUIER (https://github.com/marianne-79)
      - Frontend development
      - Graphic chart choice
      - Logo creation
      - Mockup creation
      - Header and footer creation

    - Abdelilah BENGHADDA (https://github.com/abb-becode)
      - Website architecture
      - Backend development
      - Database creation
      - Router and controller creation
      - User dashboard creation (including add, update and delete buttons for companies and contacts)

    - Giuseppe MOI (https://github.com/Giuseppemoi)
      - Backend development
      - Login functionality creation
      - Users privileges creation
      - Invoice creation, update and delete functionalities
    
    - Frank Zi WANG (https://github.com/FrankZiWANG-dev)
      - Project management (standups animation, requirements management)
      - Team management (workload distribution, deadline management)
      - Source control
      - Companies, clients, providers display functionalities creation

## Bugs
Website can be slow to boot, due to webhosting server.
Google Chrome indicates dangerous page when clicking on Invoices.
Form remains uncentered when updating / deleting an entry.
Currently, can only delete and update through dashboard (= last 5 entries of each category).
