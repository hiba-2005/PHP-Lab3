# LAB 3 – Héritage, Interfaces et Polymorphisme en PHP

## Objectif
Ce laboratoire permet de :
- Utiliser l’héritage (extends)
- Créer une classe abstraite
- Implémenter des interfaces
- Appliquer le polymorphisme
- Organiser le code avec namespaces et autoload (PSR-4 simple)
- Tester le projet en CLI

## Structure du projet

project/
│
├── public/
│   └── newindex.php
│
└── src/
    ├── Contract/
    │   ├── IdentifiableInterface.php
    │   └── ExportableInterface.php
    │
    ├── Entity/
    │   ├── Personne.php
    │   ├── Etudiant.php
    │   ├── Enseignant.php
    │   └── Filiere.php
    │
    └── Service/
        └── PrinterService.php

## Concepts utilisés
- Classe abstraite : Personne
- Interfaces : IdentifiableInterface, ExportableInterface
- Héritage : Etudiant et Enseignant héritent de Personne
- Polymorphisme : Traitement uniforme via Personne
  
## Résultat attendu

<img width="1366" height="712" alt="image" src="https://github.com/user-attachments/assets/f1a42f97-08fb-4e75-b265-bb1746ea5032" />


## Exécution

Dans le terminal :

php public/newindex.php


