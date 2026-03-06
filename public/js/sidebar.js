const sidebarToggle = document.querySelector('button.sidebar-toggle');
const mainHeader = document.querySelector('.main-header');

// Update sidebar based on viewport width.
function updateSidebarOnResize() {
    if (window.innerWidth < 768) { 
        // collapsed sidebar and update aria-expanded
        mainHeader.classList.add('collapsed');
        sidebarToggle.setAttribute('aria-expanded', false); 
    } 
    else {
        // expanded sidebar and update aria-expanded
        mainHeader.classList.remove('collapsed'); 
        sidebarToggle.setAttribute('aria-expanded', true);
    }
}

// Initial check
updateSidebarOnResize();

// Update whenever the window is resized
window.addEventListener('resize', updateSidebarOnResize);

// Toggle sidebar manually on button click
sidebarToggle.addEventListener('click', () => {

    mainHeader.classList.toggle('collapsed');

    // Update aria-expanded
    const isCollapsed = mainHeader.classList.contains('collapsed');
    sidebarToggle.setAttribute('aria-expanded', !isCollapsed);
});