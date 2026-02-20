function animateOnScroll() {
    const elements = document.querySelectorAll('.animate-fade-in-up, .animate-header, .animate-card, .animate-image, .animate-slide-in-left, .animate-slide-in-right, .animate-zoom-in');
    
    elements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;
        
        if (elementTop < window.innerHeight - elementVisible) {
            element.classList.add('animate-active');
        }
    });
}

function typeWriter(element, text, speed = 50) {
    let i = 0;
    element.innerHTML = '';
    
    function type() {
        if (i < text.length) {
            element.innerHTML += text.charAt(i);
            i++;
            setTimeout(type, speed);
        }
    }
    
    type();
}

function initAnimations() {
    const header = document.querySelector('.animate-header');
    if (header) {
        header.classList.add('animate-active');
    }

    animateOnScroll();
    
    window.addEventListener('scroll', animateOnScroll);
    
    const typingElements = document.querySelectorAll('[data-typing]');
    typingElements.forEach(element => {
        const text = element.getAttribute('data-typing');
        const speed = element.getAttribute('data-typing-speed') || 50;
        typeWriter(element, text, parseInt(speed));
    });
    
    console.log('Animations initialized successfully');
}


function initSmoothScroll() {
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                const offsetTop = targetElement.offsetTop - 100;
                
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', function() {
    initAnimations();
    initDropdowns();
    initSmoothScroll();
    
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        document.documentElement.classList.add('reduce-motion');
    }
});

if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        animateOnScroll,
        typeWriter,
        initAnimations,
        initDropdowns,
        initSmoothScroll
    };
}