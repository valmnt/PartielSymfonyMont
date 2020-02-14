# PartielSymfonyMont

## Qu'est-ce qu'un container de services ? Quel est son rôle ?

Un container de service est un objet qui regroupe des services et qui en gère l'instantiation.

## Quelle est la différence entre les commandes make:entity et make:user lorsqu'on utilise la console Symfony ?

La commande make:entity permet de créer une entity qui sera lié à une table de la base de donnée alors que la commande 
make:user va créer un objet user (avec les attributs : email, password et rôle) qui permettra de pouvoir créer des comptes qui s'authentitfieront sur notre application.

## Quelle commande utiliser pour charger les fixtures dans la base de données ?

php bin/console doctrine:fixtures:load

## Résumez de manière simple le fonctionnement du système de versions "Semver"

Semver est un système de versionning 
Ex: 2.1.6

* Le permier numéro correspond à une version majeur
* Le deuxième numéro correspond à une version mineur
* Le troisième numéro correspond à une version de correctif

## Qu'est-ce qu'un Repository ? A quoi sert-il ?

Un repository est une classe permettant de faire le lien entre la base de donnée et notre application.
L'objectif d'un repository est de manipuler les données qui sont en base dans notre application.

## Quelle commande utiliser pour voir la liste des routes ?

php bin/console debug:router

## Dans un template Twig, quelle variable globale permet d'accéder à la requête courante, l'utilisateur courant, etc...?

c'est : app

## Pour mettre à jour la structure de la base de données, quelles sont les 2 possibilités que nous avons abordées en cours ?

L'utilisation des migrations : php bin/console make migration 
                               php bin/console doctrine:migrations:migrate

Ou alors ave un schema update : php bin/console doctrine:schema:update --force

## Quelle commande permet de créer une classe de contrôleur ?

php bin/console make:controller name_controller

## Décrivez succintement l'outil Flex de Symfony

L'outil Flex de Symfony est une application web permettant de trouver des packages facilement pour nos applications Symfony.


