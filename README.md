# Youdemy - Plateforme de Cours en Ligne

## Description
Youdemy est une plateforme de cours en ligne qui révolutionne l'apprentissage en proposant un système interactif et personnalisé pour les étudiants et les enseignants. Elle permet une gestion simple des cours, des utilisateurs, et des statistiques liées à l'apprentissage.

---

## Fonctionnalités Principales

### Front Office
- **Visiteur** : Accès au catalogue des cours, recherche par mots-clés, création de compte (Étudiant ou Enseignant).
- **Étudiant** : Visualisation du catalogue, recherche, inscription aux cours, accès à "Mes cours".
- **Enseignant** : Ajout de cours avec titre, description, contenu (vidéo/document), tags et catégorie, gestion des cours, statistiques sur les cours (nombre d’étudiants, etc.).

### Back Office
- **Administrateur** : Validation des comptes enseignants, gestion des utilisateurs (activation, suspension, suppression), gestion des contenus (cours, catégories, tags), insertion en masse de tags, accès aux statistiques globales (nombre total de cours, répartition par catégorie, etc.).

### Fonctionnalités Transversales
- Authentification et autorisation des utilisateurs (Étudiant, Enseignant, Administrateur).
- Gestion des rôles et contrôle d'accès aux fonctionnalités spécifiques.
- Recherche avancée avec filtres par catégorie, tags, auteur.
- Système de notification (validation de compte, inscription confirmée, etc.).
- Commentaires et évaluations des cours par les étudiants.
- Génération de certificats PDF de complétion pour les étudiants.

---

## Exigences Techniques
- **Architecture** : Respect des principes de la Programmation Orientée Objet (OOP) avec encapsulation, héritage, et polymorphisme.
- **Base de données** : Système relationnel (MySQL) avec gestion des relations (one-to-many, many-to-many).
- **Sécurité** : Validation des données utilisateur, gestion des sessions PHP pour la gestion des utilisateurs connectés.
- **Contrôle d'accès** : Les utilisateurs peuvent accéder uniquement aux fonctionnalités correspondant à leur rôle.

---
