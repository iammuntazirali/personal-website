# Personal Website

[<img alt="Deployed with FTP Deploy Action" src="https://img.shields.io/badge/Deployed With-FTP DEPLOY ACTION-%3CCOLOR%3E?style=for-the-badge&color=0077b6">](https://github.com/SamKirkland/FTP-Deploy-Action)

## Table of Contents

- [Learning in Public](#learning-in-public)
    - [For Fellow Learners](#for-fellow-learners)
- [Current Status](#current-status)
- [Tech Stack](#tech-stack)
- [Roadmap / Features To Come](#roadmap--features-to-come)
- [Goals](#goals)
- [Documentation](#documentation)
- [Setup](#setup)
- [Contributing](#contributing)
- [Deployment](#deployment)
- [Tooling & Acknowledgments](#tooling--acknowledgments)
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



## Documentation
This section provides an overview of the project structure, database setup, and development notes.
It is still in-progress and will be updated.

### Database

**Type:** MariaDB

| Table                         | Description                                   | Notes                    |
|-------------------------------|-----------------------------------------------|--------------------------|
| `users`                       | Registered users                              | Authentication           |
| `profiles`                    | User profiles linked to users                 | See below                |
| `projects`                    | Personal and thesis projects                  |                          |
| `issuers`                     | Organizations issuing certificates            | Will be adding more      |
| `certificates`                | Certificates earned                           | Linked to issuers        | 
| `degrees`                     | Academic degrees and formal education records | Linked to issuers        | 
| `spoken_languages`            | Languages spoken, including proficiency level |                          |
| `certificate_spoken_language` | Links certificates to spoken languages        | Pivot table for many-to-many relation |


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


## License
📜 Feel free to look around and get inspired. 
All code is my own work unless otherwise stated.
This project is licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Notes

> ⚠️ This site is a work-in-progress. Features and content may change as I continue building it.

