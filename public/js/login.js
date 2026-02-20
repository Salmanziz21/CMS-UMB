// Force light mode and prevent dark mode on login page
(function() {
    const html = document.documentElement;
    
    // Remove dark class and ensure light class
    html.classList.remove('dark');
    html.classList.add('light', 'login-page');
    
    // Remove dark mode from data attributes
    html.removeAttribute('data-theme');
    html.setAttribute('data-theme', 'light');
    
    // Override localStorage theme setting for this session
    if (window.localStorage) {
        const originalSetItem = localStorage.setItem;
        localStorage.setItem = function(key, value) {
            if (key !== 'theme' && !key.includes('theme')) {
                originalSetItem.apply(this, arguments);
            }
        };
    }
    
    // Watch for any theme changes and force light mode
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                if (html.classList.contains('dark')) {
                    html.classList.remove('dark');
                    html.classList.add('light', 'login-page');
                }
            }
            if (mutation.type === 'attributes' && mutation.attributeName === 'data-theme') {
                if (html.getAttribute('data-theme') === 'dark') {
                    html.setAttribute('data-theme', 'light');
                }
            }
        });
    });
    
    observer.observe(html, {
        attributes: true,
        attributeFilter: ['class', 'data-theme']
    });
    
    // Also check periodically to ensure theme doesn't change
    setInterval(() => {
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            html.classList.add('light', 'login-page');
        }
        if (html.getAttribute('data-theme') === 'dark') {
            html.setAttribute('data-theme', 'light');
        }
    }, 100);
})();
