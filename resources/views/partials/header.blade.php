<header class="main-header">
    <div class="logo">
        <img>
    </div>

    <!-- Sidebar toggle button -->
    <button class="sidebar-toggle" 
        aria-label="Toggle sidebar"
        aria-expanded="false"
        aria-controls="site-nav">
        <svg viewBox="0 0 24 24">
            <path d="M6 7L18 7" />
            <path d="M6 12L18 12" />
            <path d="M6 17L18 17" />
        </svg>
        <span class="site-nav-label">Menu</span>
    </button>

    <button id="theme-toggle">Switch Theme</button>

    <!-- Navigation menu -->
    <nav id="site-nav" class="site-nav">
        
        <a href="{{ route('home') }}">
            <svg viewBox="0 0 24 24" aria-hidden="true"> 
                <path d="M2 12L5 9.3M22 12L19 9.3M19 9.3L12 3L5 9.3M19 9.3V21H5V9.3"/> 
            </svg>
            <span class="nav-label">Home</span>
        </a>

        <a href="{{ route('projects') }}">
            <svg viewBox="0 0 24 24" aria-hidden="true"> 
                <path d="M3 5h6l1 2h11v12H3z"/> 
            </svg>
            <span class="nav-label">Projects</span>
        </a>

        <a href="{{ route('about') }}">
            <svg viewBox="0 0 24 24" aria-hidden="true"> 
                <path d="M12 6s-2-2-4-2-5 2-5 2v14s3-2 5-2 4 2 4 2c1.333-1.333 2.667-2 4-2 1.333 0 3 .667 5 2V6c-2-1.333-3.667-2-5-2-1.333 0-2.667.667-4 2z"/> 
                <path d="M12 6v14"/> 
            </svg>
            <span class="nav-label">About</span>
        </a>

        <a href="{{ route('contact') }}">
            <svg viewBox="0 0 24 24" aria-hidden="true"> 
                <rect width="20" height="14" x="2" y="5"/> 
                <path stroke-linecap="round" d="M2 5l10 9 10-9"/> 
            </svg>
            <span class="nav-label">Contact</span>
        </a>
    </nav>

</header>