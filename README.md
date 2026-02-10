# Personal Website

[<img alt="Deployed with FTP Deploy Action" src="https://img.shields.io/badge/Deployed With-FTP DEPLOY ACTION-%3CCOLOR%3E?style=for-the-badge&color=0077b6">](https://github.com/SamKirkland/FTP-Deploy-Action)

## Table of Contents

- [Learning in Public](#learning-in-public)
    - [For Fellow Learners](#for-fellow-learners)
- [Current Status](#current-status)
- [Tech Stack](#tech-stack)
- [Roadmap / Features To Come](#roadmap--features-to-come)
- [Goals](#goals)
- [Database](#database)
- [Setup](#setup)
- [Contributing](#contributing)
- [Deployment](#deployment)
- [Tooling & Acknowledgments](#tooling--acknowledgments)
- [About This Project](#about-this-project)
- [License](#license)
- [Notes](#notes)


## Overview

A work-in-progress personal website designed to showcase my projects, skills, and ideas. Right now, it’s mostly a skeleton, but exciting features are on the way!


## Learning in Public 

💬 I'm building this site as I learn, and your feedback is gold! If you have suggestions, ideas, or improvements — whether about code, design, accessibility or usability — don’t hesitate to share them. Every bit of feedback helps me improve and grow. 
You can also leave feedback directly via [GitHub Issues](https://github.com/a-mamal/personal-website/issues).

### For Fellow Learners 
🤝 I'll make sure to be adding **good first issues** for others beginning their journey.
We all need a safe place to start with something, and I would love for this personal project to make room for that.
Exploration, suggestions, and discussion are always welcome.
Feel free to take your time with these issues. 
I hope they help build confidence to tackle something bigger next!


## Current Status
- 🏠 Homepage: ✅ Basic layout
- 🖼️ Project showcase: 🔜 Coming soon
- 📖 About / Contact pages: 🔜 Coming soon


## Tech Stack
  
- 🛠️ Laravel (Blade, Eloquent)
- 🌐 HTML, CSS, JavaScript
- 🗄️ MariaDB


## Roadmap / Features To Come

- 📱 Responsive design for mobile and desktop
- 🖼️ Dynamic project listings and portfolio section
- ✉️ Contact form with backend functionality
- 📝 Blog section for sharing tutorials, notes, and thoughts
- 🌙 Dark/light mode toggle
- 🎨 Fun animations and interactive elements


## Goals

- 📚 Learn while building
- 🌱 Gradually evolve this site alongside my skills
- 🎯 Showcase a personal brand that’s both professional and playful, reflecting my belief that learning and growing is more effective when it’s fun!
- 🤝 Make room for fellow learners by offering beginner-friendly, learning-oriented issues



## Database
**Type:** MariaDB

This section provides an overview of the database structure, tables, and relationships.
It is still in-progress and will be updated.

Tables in this project:

- [`users`](#table-users)
- [`profiles`](#table-profiles)
- [`profile_links`](#table-profile_links)
- [`projects`](#table-projects)
- [`issuers`](#table-issuers)
- [`degrees`](#table-degrees)
- [`certificates`](#table-certificates)
- [`spoken_languages`](#table-spoken_languages)

Detailed descriptions follow below.

### Table: `users`

| Column              | Type         | Nullable | Notes                                   |
|--------------------|---------------|----------|-----------------------------------------|
| `id`               | bigint        | No       | Primary Key, auto-increment             |
| `name`             | varchar(255)  | No       | User’s full name                        |
| `email`            | varchar(255)  | No       | Unique, used for authentication         |
| `email_verified_at`| timestamp     | Yes      | When email was verified                 |
| `password`         | varchar(255)  | No       | Hashed password                         |
| `remember_token`   | varchar(100)  | Yes      | Used for “remember me” functionality    |
| `created_at`       | timestamp     | Yes      | Laravel timestamp                       |
| `updated_at`       | timestamp     | Yes      | Laravel timestamp                       |

**Relationships:**  
- Users can have many profiles

**Seeder / Factory:**  
- `UserFactory` exists for generating test users.
- `UserSeeder` doesn't exist yet.


### Table: `profiles`

| Column         | Type         | Nullable | Notes                                     |
|---------------|--------------|----------|--------------------------------------------|
| `id`          | bigint       | No       | Primary key                                |
| `user_id`     | bigint       | No       | Foreign key → users.id                     |
| `display_name`| varchar(255) | No       | Public-facing name                         |
| `bio`         | text         | Yes      | Short profile description                  |
| `created_at`  | timestamp    | Yes      | Laravel timestamp                          |
| `updated_at`  | timestamp    | Yes      | Laravel timestamp                          |

**Relationships:**  
- A profile belongs to one user  
- A profile can have many:
  - certificates  
  - degrees  
  - spoken languages  
  - profile links
  - projects
    
> Note: The projects relationship exists in the Project model.

**Seeder / Factory:**  
- `ProfileFactory` exists  
- `ProfileSeeder` exists



### Table: `profile_links`

| Column       | Type         | Nullable | Notes                                                      |
|-------------|--------------|----------|------------------------------------------------------------|
| `id`        | bigint       | No       | Primary key                                                |
| `profile_id`| bigint       | No       | Foreign key → `profiles.id`, cascade on delete            |
| `platform`  | enum         | No       | Platform type (`codepen`, `freecodecamp`, `github`, `hackthebox`, `leetcode`, `linkedin`, `website`, `other`). Defaults to `other`. |
| `url`       | text         | No       | URL of the profile link                                    |
| `created_at`| timestamp    | Yes      | Laravel timestamp                                          |
| `updated_at`| timestamp    | Yes      | Laravel timestamp                                          |

**Constraints:**  
- Unique constraint: one link per platform per profile (`profile_id` + `platform`)  

**Relationships:**  
- A profile link belongs to one profile  

**Seeder / Factory:**  
- `ProfileLinkFactory` exists and generates realistic URLs based on the platform  
- `ProfileLinkSeeder` exists and seeds 1–3 links per profile in local environments  

> Note: The seeder only runs in local environments to avoid polluting production data.  



### Table: `projects`

| Column         | Type          | Nullable | Notes                                                    |
|----------------|---------------|----------|----------------------------------------------------------|
| `id`           | bigint        | No       | Primary key                                              |
| `title`        | varchar(255)  | No       | Name or title of the project                             |
| `type`         | varchar(255)  | Yes      | Optional type/category of the project                    |
| `slug`         | varchar(255)  | No       | Unique slug for the project, used in URLs                |
| `description`  | text          | No       | Detailed description of the project                      |
| `highlights`   | longtext      | Yes      | Key features, technologies, or notes stored as JSON      |
| `project_url`  | varchar(255)  | Yes      | Optional live URL for the project                        |
| `github_url`   | varchar(255)  | Yes      | Optional GitHub repository URL                           |
| `status`       | enum          | No       | `draft` or `published`, defaults to `draft`              |
| `created_at`   | timestamp     | Yes      | Laravel timestamp                                        |
| `updated_at`   | timestamp     | Yes      | Laravel timestamp                                        |

**Relationships:**  
- A project belongs to one profile  

**Seeder / Factory:**  
- `ProjectFactory` exists but is currently empty.  
- `ProjectSeeder` exists and seeds multiple example projects with realistic data. Will be updated. 

> Note: Each project may have highlights and URLs for demo or GitHub, which are useful for showcasing a portfolio. The `status` field allows for draft projects or published projects for display. Highlights are stored as JSON (longtext) for flexibility.


### Table: `issuers`

> ⚠️ Note: The `issuers` table will be renamed to [`organizations`](https://github.com/a-mamal/personal-website/issues/48) as part of the [Experiences epic](https://github.com/a-mamal/personal-website/issues/47).  
> This table is currently used for certificates and degrees, but future work will consolidate all organizations (schools, companies, certifiers, etc.) into a single table.

| Column         | Type         | Nullable | Notes                                  |
|----------------|--------------|----------|----------------------------------------|
| `id`           | bigint       | No       | Primary key                            |
| `name`         | varchar(255) | No       | Name of the issuing organization       |
| `type`         | varchar(255) | No       | Type of issuer, e.g., company, platform|
| `website`      | varchar(255) | Yes      | Optional website URL                   |
| `contact_email`| varchar(255) | Yes      | Optional contact email                 |
| `created_at`   | timestamp    | Yes      | Laravel timestamp                      |
| `updated_at`   | timestamp    | Yes      | Laravel timestamp                      |

**Relationships:**  
- An issuer can have many certificates.  
- An issuer can have many degrees.  

**Seeder / Factory:**  
- `IssuerFactory` exists but is currently empty.  
- `IssuerSeeder` exists and seeds data from `database/seeders/data/issuers.json`.


### Table: `degrees`

| Column       | Type         | Nullable | Notes                                    |
|-------------|--------------|----------|-------------------------------------------|
| `id`        | bigint       | No       | Primary key                               |
| `profile_id`| bigint       | No       | Foreign key → profiles.id                 |
| `issuer_id` | bigint       | No       | Foreign key → issuers.id                  |
| `title`     | varchar(255) | No       | Name of the degree                        |
| `level`     | varchar(255) | No       | Degree level, e.g., Bachelor, Master      |
| `field`     | varchar(255) | Yes      | Specialization or field of study          |
| `start_date`| date         | Yes      | When the degree started                   |
| `end_date`  | date         | Yes      | When the degree ended                     |
| `grade`     | varchar(255) | Yes      | Optional grade or GPA                     |
| `image`     | varchar(255) | Yes      | Optional image of the degree certificate  |
| `created_at`| timestamp    | Yes      | Laravel timestamp                         |
| `updated_at`| timestamp    | Yes      | Laravel timestamp                         |

**Relationships:**  
- A degree belongs to one profile  
- A degree belongs to one issuer  

**Seeder / Factory:**  
- `DegreeFactory` exists  
- `DegreeSeeder` exists



### Table: `certificates`

| Column           | Type         | Nullable | Notes                                         |
|-----------------|--------------|----------|------------------------------------------------|
| `id`            | bigint       | No       | Primary key                                    |
| `profile_id`    | bigint       | No       | Foreign key → profiles.id                      |
| `issuer_id`     | bigint       | No       | Foreign key → issuers.id                       |
| `name`          | varchar(255) | No       | Name of the certificate                        |
| `description`   | text         | Yes      | Optional description of the certificate        |
| `date_awarded`  | date         | No       | When the certificate was issued                |
| `expiration_date` | date       | Yes      | Expiry date if applicable                      |
| `credential_link`| varchar(255)| Yes      | Optional URL to verify the certificate         |
| `image`         | varchar(255) | Yes      | Optional certificate image                     |
| `created_at`    | timestamp    | Yes      | Laravel timestamp                              |
| `updated_at`    | timestamp    | Yes      | Laravel timestamp                              |
| `spoken_language_id` | bigint   | Yes      | Optional foreign key → spoken_languages.id    |

**Relationships:**  
- A certificate belongs to one profile  
- A certificate belongs to one issuer
- A certificate optionally belongs to one spoken language (links the certificate to a profile's spoken language)

**Seeder / Factory:**  
- `CertificateFactory` exists but needs to be updated (see [Issue #55](https://github.com/a-mamal/personal-website/issues/55))
- `CertificateSeeder` exists but needs to be updated (see [Issue #56](https://github.com/a-mamal/personal-website/issues/56))



### Table: `spoken_languages`

| Column        | Type         | Nullable | Notes                                         |
|---------------|--------------|----------|-----------------------------------------------|
| `id`          | bigint       | No       | Primary key                                   |
| `profile_id`  | bigint       | No       | Foreign key → profiles.id                    |
| `name`        | varchar(255) | No       | Language name (e.g. English, Greek)           |
| `proficiency` | varchar(255) | No       | e.g. Native, Fluent, C2, B2                   |
| `is_native`   | boolean      | No       | Whether this is the user’s native language    |
| `created_at`  | timestamp    | Yes      | Laravel timestamp                             |
| `updated_at`  | timestamp    | Yes      | Laravel timestamp                             |

**Relationships:**  
- A spoken language belongs to one profile  
- A spoken language can have many certificates  

**Seeder / Factory:**  
- `SpokenLanguageFactory` exists  
- `SpokenLanguageSeeder` exists but is currently empty




> **Note:**  
> The database schema supports multiple profiles per user.  
> The application is not in that state. Remember...it's a skeleton!  
> Support for multiple profiles will be added in the future.

## Future Improvements

| Area                    | Planned Enhancements                                                               |
|-------------------------|------------------------------------------------------------------------------------|
| User Profiles           | Support multiple profiles per user; currently only one profile per user            |
| Projects & Portfolio    | Dynamic project listings, filtering, and categorization                            |
| Certificates            | Enhanced management, filtering by issuer, and linking to profiles                  |
| Blog Section            | Optional blog for tutorials, learning notes, and reflections (under consideration) |
| Accessibility           | Improvements for keyboard navigation, screen readers, and ARIA attributes          |
| Responsive Design       | Refined layouts for mobile, tablet, and desktop screens                            |
| Dark/Light Mode         | Smooth toggle between themes with persistence                                      |
| Interactive Elements    | Animations and UI enhancements to make the site engaging                           |
                          

## Setup

This project uses Laravel with a simple local development setup, using **Laravel Herd** for local PHP and environment management, and **Laravel Breeze** for basic authentication scaffolding.
The database used is **MariaDB**.

### Local Development

1. Fork the repository
   
   Go to the repo page and click Fork.
   This creates a copy under your account.
      
2. Clone your fork:
   
   ```bash
   git clone https://github.com/<your-username>/personal-website.git
   cd personal-website
   ```
   
3. Install dependencies:
   
   ```bash
   composer install
   ```

4. Copy the example environment file and generate an app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   > Notes:
   > - The `.env` file is intentionally not committed.
   > - The generated key is updated automatically in `.env`.
   >     If it doesn’t:
   >     - Copy the key manually from the console output:
   >       ```bash
   >       Application key [base64:xxxxxxxxxxxxxxxxxxxxxxxxxx] set successfully.
   >       ```
   >     - Then paste it into `.env` like:
   >       ```env
   >       APP_KEY = base64:xxxxxxxxxxxxxxxxxxxxxxxxxx
   >       ```

5. Configure your database credentials in `.env`, eg.:
   ```env
   DB_CONNECTION = mysql
   DB_HOST       = 127.0.0.1
   DB_PORT       = 3306
   DB_DATABASE   = personal_website
   DB_USERNAME   = your_username
   DB_PASSWORD   = your_password
   ```
6. Run migrations and seed initial data:
   
   ```bash
   php artisan migrate --seed
   ```

7. Start the development server:

- If using Laravel Herd:
    - Open the project in Herd.
    - Visit the Herd-provided local URL.
- Otherwise:
    - Run
      ```bash
      php artisan serve
      ```
    - Visit http://localhost:8000 to view the site.

## Contributing

I welcome contributions from anyone looking to learn and experiment!

- Pick tasks from the [Project Board](https://github.com/users/a-mamal/projects/4)
- Leave suggestions, report bugs, or share ideas via [GitHub Issues](https://github.com/a-mamal/personal-website/issues).
- Beginner-friendly issues are labeled **good first issue**.
- Don’t worry about messing things up. We’re all learning together!

### 1. Fork & Branching

1. Fork the repository.
2. Clone your fork.
3. Create a new branch for your changes. 
Example:
```bash
git checkout -b feature/your-feature-name
```
Avoid committing directly to `main`.

### 2. Commit Messages
Use descriptive commit messages. 
Example format:
```
type(scope): short description
```

### 3. Pull Requests
When your feature or fix is ready: 
- Push your branch to your fork
- Open a pull request to `main` on the original repo.
- It's always helpful to include a description of what you’ve changed and why.

### 4. Code Style / Guidelines
- Try to follow the existing coding style.
- Keep things consistent with the rest of the project.
- Don’t worry if it’s not perfect. Feedback is part of the process!


## Deployment

- Live at: https://a-mamal.dev/
- Hosting: Hostinger.
- Automation: Deployment handled via FTP Deploy Action
- Database: Credentials managed via .env and .env.production


## Tooling & Acknowledgments
- Deployment automated via GitHub Actions using
  [SamKirkland/FTP-Deploy-Action](https://github.com/SamKirkland/FTP-Deploy-Action)


## About This Project

> ⚠️ Note: This is a personal project managed by a single developer.  
> I’m learning, building features, and updating documentation all at the same time.  
> Progress may be gradual, but I appreciate any feedback, suggestions, or contributions!  
> Thank you for your patience and support 🙏.


## License
📜 Feel free to look around and get inspired. 
Tweak it, play with it, and make it your own!  
All code is my own work unless otherwise stated.  
This project is licensed under the [MIT license](https://opensource.org/licenses/MIT).

> Note: Since this is a personal project, some information is… well, personal 😄.  
> Nothing to hide, but you might not want it for your own website as-is.

## Notes

> ⚠️ This site is a work-in-progress. Features and content may change as I continue building it.

