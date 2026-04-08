# SGI - Système de Gestion des Incidents

Projet PFE - Développement Full Stack

## Technologies
- Backend: Laravel 11 + MySQL
- Frontend: React 18 + Tailwind CSS
- Auth: Sanctum
- Signature: HTML Canvas + base64

## Installation rapide
1. `cd backend && composer install && cp .env.example .env`
2. `cd frontend && npm install && npm run dev`
3. Crée la base MySQL `sgi_db`
4. `php artisan migrate`
5. `php artisan db:seed` (plus tard)