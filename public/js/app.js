document.addEventListener('DOMContentLoaded', () => {
    // --- General Animation Observer --- //
    const animationObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Find all elements with `animate-class` inside the target
                const elementsToAnimate = entry.target.querySelectorAll('[data-animate]');
                if (elementsToAnimate.length > 0) {
                    elementsToAnimate.forEach(el => {
                        const animationClass = el.dataset.animate;
                        if (animationClass) {
                            el.classList.add(animationClass, 'animate-active');
                        }
                    });
                } else {
                    // Fallback for elements that are direct targets
                    const animationClass = entry.target.dataset.animate;
                    if (animationClass) {
                        entry.target.classList.add(animationClass, 'animate-active');
                    }
                }
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('[data-animate-group]').forEach(group => {
        animationObserver.observe(group);
    });

    // --- Number Counting Animation --- //
    const setupCountingAnimation = () => {
        const countElements = document.querySelectorAll('[data-target]');
        
        const countingObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                    const element = entry.target;
                    const targetValue = parseInt(element.dataset.target.replace(/,/g, ''), 10);
                    const duration = 2000; // 2 seconds
                    const startTime = Date.now();
                    
                    const animate = () => {
                        const elapsed = Date.now() - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        
                        // Easing function for smooth animation
                        const easeOutQuad = 1 - Math.pow(1 - progress, 2);
                        const currentValue = Math.floor(targetValue * easeOutQuad);
                        
                        element.textContent = currentValue.toLocaleString('id-ID');
                        
                        if (progress < 1) {
                            requestAnimationFrame(animate);
                        } else {
                            element.textContent = targetValue.toLocaleString('id-ID');
                            element.classList.add('counted');
                            countingObserver.unobserve(element);
                        }
                    };
                    
                    animate();
                }
            });
        }, { threshold: 0.5 });
        
        countElements.forEach(el => countingObserver.observe(el));
    };

    setupCountingAnimation();

    // --- Section Toggling (Lecturers, Events, Achievements) --- //
    const setupToggle = (buttonId, featuredId, allId, sectionId) => {
        const toggleBtn = document.getElementById(buttonId);
        const featuredContainer = document.getElementById(featuredId);
        const allContainer = document.getElementById(allId);
        const section = document.getElementById(sectionId);

        if (!toggleBtn || !featuredContainer || !allContainer || !section) return;

        let isShowingAll = false;
        toggleBtn.addEventListener('click', () => {
            isShowingAll = !isShowingAll;
            featuredContainer.classList.toggle('hidden', isShowingAll);
            allContainer.classList.toggle('hidden', !isShowingAll);
            toggleBtn.textContent = isShowingAll ? 'Tampilkan Sedikit' : 'Lihat Semua';
            
            // Trigger animations for newly visible elements
            if (isShowingAll) {
                setTimeout(() => {
                    const elementsToAnimate = allContainer.querySelectorAll('[data-animate]');
                    elementsToAnimate.forEach(el => {
                        el.classList.add('animate-active');
                    });
                }, 50);
            }
            
            section.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    };

    setupToggle('toggle-lecturer', 'lecturers-container', 'all-lecturers-container', 'dosen');
    setupToggle('toggle-events', 'events-container', 'all-events-container', 'event');
    setupToggle('toggle-achievements', 'achievements-container', 'all-achievements-container', 'prestasi');

    // --- Curriculum Semester Tabs --- //
    const setupCurriculumTabs = () => {
        const semesterTabs = document.querySelectorAll('.semester-tab');
        const semesterContents = document.querySelectorAll('.semester-content');

        if (semesterTabs.length === 0 || semesterContents.length === 0) return;

        semesterTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const selectedSemester = tab.dataset.semester;

                // Update tab styles
                semesterTabs.forEach(t => {
                    const isActive = t.dataset.semester === selectedSemester;
                    t.classList.toggle('bg-emerald-600', isActive);
                    t.classList.toggle('text-white', isActive);
                    t.classList.toggle('shadow-lg', isActive);
                    t.classList.toggle('shadow-emerald-600/50', isActive);
                    t.classList.toggle('bg-white', !isActive);
                    t.classList.toggle('text-slate-700', !isActive);
                    t.classList.toggle('border', !isActive);
                    t.classList.toggle('border-slate-200', !isActive);
                });

                // Update content visibility with smooth transition
                semesterContents.forEach(content => {
                    const isVisible = content.dataset.semester === selectedSemester;
                    
                    if (isVisible) {
                        content.classList.remove('hidden');
                        setTimeout(() => {
                            content.classList.add('animate-fade-in-up');
                        }, 10);
                    } else {
                        content.classList.add('hidden');
                        content.classList.remove('animate-fade-in-up');
                    }
                });
            });
        });
    };

    setupCurriculumTabs();

    // --- Achievement Filtering --- //
    const achievementFilterButtons = document.querySelectorAll('[data-achievement-filter]');
    const allAchievementCards = document.querySelectorAll('[data-achievement-category]');

    if (achievementFilterButtons.length > 0 && allAchievementCards.length > 0) {
        achievementFilterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const filter = button.dataset.achievementFilter;

                // Update button styles
                achievementFilterButtons.forEach(btn => {
                    btn.classList.toggle('bg-emerald-600', btn === button);
                    btn.classList.toggle('text-white', btn === button);
                    btn.classList.toggle('bg-white', btn !== button);
                    btn.classList.toggle('text-emerald-700', btn !== button);
                });

                // Filter cards with transitions
                allAchievementCards.forEach(card => {
                    const category = card.dataset.achievementCategory;
                    const isVisible = filter === 'all' || category === filter;
                    
                    if (isVisible) {
                        card.classList.remove('hidden', 'fade-out');
                        card.classList.add('fade-in');
                    } else {
                        card.classList.add('fade-out');
                        card.addEventListener('transitionend', () => {
                            card.classList.add('hidden');
                        }, { once: true });
                    }
                });
            });
        });
    }

    // --- Dropdown Menus --- //
    const setupDropdown = (buttonId, menuId) => {
        const btn = document.getElementById(buttonId);
        const menu = document.getElementById(menuId);
        if (!btn || !menu) return;

        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const isExpanded = btn.getAttribute('aria-expanded') === 'true';
            btn.setAttribute('aria-expanded', !isExpanded);
            menu.classList.toggle('hidden');
        });

        document.addEventListener('click', (e) => {
            if (!menu.contains(e.target) && !btn.contains(e.target)) {
                menu.classList.add('hidden');
                btn.setAttribute('aria-expanded', 'false');
            }
        });
    };

    setupDropdown('dropdown-profil-btn', 'dropdown-profil-menu');
    setupDropdown('dropdown-mahasiswa-btn', 'dropdown-mahasiswa-menu');

    // --- Mobile Menu --- //
    const setupMobileMenu = () => {
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (!mobileMenuBtn || !mobileMenu) return;

        mobileMenuBtn.addEventListener('click', () => {
            const isExpanded = mobileMenuBtn.getAttribute('aria-expanded') === 'true';
            mobileMenuBtn.setAttribute('aria-expanded', !isExpanded);
            mobileMenu.classList.toggle('hidden');
        });

        setupDropdown('mobile-profil-btn', 'mobile-profil-menu');
        setupDropdown('mobile-mahasiswa-btn', 'mobile-mahasiswa-menu');
    };

    setupMobileMenu();

    // --- Smooth Scroll for Anchor Links --- //
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // --- Carousel Navigation (Achievements & Events) --- //
    const setupCarousel = (containerId, carouselId, prevBtnSelector, nextBtnSelector) => {
        const container = document.getElementById(containerId);
        const carousel = document.getElementById(carouselId);
        const prevBtn = carousel?.querySelector(prevBtnSelector);
        const nextBtn = carousel?.querySelector(nextBtnSelector);

        if (!container || !carousel || !prevBtn || !nextBtn) return;

        let currentIndex = 0;
        const items = container.querySelectorAll('[data-achievement-index], [data-event-index]');
        const totalItems = items.length;

        if (totalItems <= 1) return;

        const showItem = (index) => {
            items.forEach((item, i) => {
                item.classList.toggle('hidden', i !== index);
            });
            currentIndex = index;
        };

        prevBtn.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + totalItems) % totalItems;
            showItem(currentIndex);
        });

        nextBtn.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % totalItems;
            showItem(currentIndex);
        });

        // Show first item by default
        showItem(0);
    };

    setupCarousel('achievements-container', 'achievements-carousel', '[data-achievement-prev]', '[data-achievement-next]');
    setupCarousel('events-container', 'events-carousel', '[data-event-prev]', '[data-event-next]');

    // --- Lecturer Pagination (Client-side) --- //
    const setupLecturerPagination = () => {
        const grid = document.querySelector('[data-lecturer-grid]');
        const pagination = document.querySelector('[data-lecturer-pagination]');

        if (!grid || !pagination) return;

        const cards = Array.from(grid.querySelectorAll('[data-lecturer-card]'));
        const itemsPerPage = parseInt(grid.dataset.itemsPerPage || '4', 10);
        const totalPages = Math.ceil(cards.length / itemsPerPage);

        let currentPage = 1;

        const numbersContainer = pagination.querySelector('[data-pagination-numbers]');
        const prevBtn = pagination.querySelector('[data-pagination-prev]');
        const nextBtn = pagination.querySelector('[data-pagination-next]');

        const buildPages = (page, lastPage) => {
            if (lastPage <= 7) return Array.from({ length: lastPage }, (_, i) => i + 1);

            const pages = [1];

            if (page <= 3) {
                pages.push(2, 3, 4, 5);
                pages.push('...');
                pages.push(lastPage);
            } else if (page >= lastPage - 2) {
                pages.push('...');
                pages.push(lastPage - 4, lastPage - 3, lastPage - 2, lastPage - 1, lastPage);
            } else {
                pages.push('...');
                pages.push(page - 1, page, page + 1);
                pages.push('...');
                pages.push(lastPage);
            }

            return pages;
        };

        const renderPageNumbers = () => {
            numbersContainer.innerHTML = '';
            const pages = buildPages(currentPage, totalPages);

            pages.forEach((page) => {
                if (page === '...') {
                    const span = document.createElement('span');
                    span.className = 'lecturer-page-ellipsis';
                    span.innerHTML = '&hellip;';
                    numbersContainer.appendChild(span);
                } else {
                    const button = document.createElement('button');
                    button.type = 'button';
                    button.className = `lecturer-page-number ${page === currentPage ? 'is-active' : ''}`;
                    button.textContent = page;
                    button.addEventListener('click', () => {
                        currentPage = page;
                        updateGrid();
                    });
                    numbersContainer.appendChild(button);
                }
            });
        };

        const updateGrid = () => {
            cards.forEach((card, index) => {
                const start = (currentPage - 1) * itemsPerPage;
                const end = start + itemsPerPage;
                const isVisible = index >= start && index < end;
                card.classList.toggle('hidden', !isVisible);
            });

            prevBtn.disabled = currentPage === 1;
            nextBtn.disabled = currentPage === totalPages;

            prevBtn.classList.toggle('is-disabled', prevBtn.disabled);
            nextBtn.classList.toggle('is-disabled', nextBtn.disabled);

            renderPageNumbers();
        };

        prevBtn.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage -= 1;
                updateGrid();
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentPage < totalPages) {
                currentPage += 1;
                updateGrid();
            }
        });

        updateGrid();
    };

    setupLecturerPagination();

    // --- Gallery Carousel Navigation --- //
    const setupGallery = (galleryId) => {
        const gallery = document.getElementById(galleryId);
        if (!gallery) return;

        const track = gallery.querySelector('[data-gallery-track]');
        const prevBtn = gallery.querySelector('[data-gallery-prev]');
        const nextBtn = gallery.querySelector('[data-gallery-next]');
        const dots = gallery.querySelectorAll('[data-gallery-dot]');
        const figures = track.querySelectorAll('figure');

        if (!track || !prevBtn || !nextBtn || figures.length === 0) return;

        let currentIndex = 0;
        const totalItems = figures.length;
        let autoSlideInterval = null;

        const updateGallery = (index) => {
            const offset = -index * 100;
            track.style.transform = `translateX(${offset}%)`;
            
            // Update dots
            dots.forEach((dot, i) => {
                dot.classList.toggle('bg-emerald-500', i === index);
                dot.classList.toggle('bg-emerald-300', i !== index);
            });

            currentIndex = index;
        };

        const goToPrev = () => {
            const newIndex = (currentIndex - 1 + totalItems) % totalItems;
            updateGallery(newIndex);
        };

        const goToNext = () => {
            const newIndex = (currentIndex + 1) % totalItems;
            updateGallery(newIndex);
        };

        const stopAutoSlide = () => {
            if (autoSlideInterval) {
                clearInterval(autoSlideInterval);
                autoSlideInterval = null;
            }
        };

        const startAutoSlide = () => {
            stopAutoSlide();
            if (totalItems <= 1) return;
            autoSlideInterval = setInterval(goToNext, 2000);
        };

        const attachAndReset = (handler) => {
            return () => {
                handler();
                startAutoSlide();
            };
        };

        prevBtn.addEventListener('click', attachAndReset(goToPrev));
        nextBtn.addEventListener('click', attachAndReset(goToNext));

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                updateGallery(index);
                startAutoSlide();
            });
        });

        gallery.addEventListener('mouseenter', stopAutoSlide);
        gallery.addEventListener('mouseleave', startAutoSlide);

        // Initialize
        updateGallery(0);
        startAutoSlide();
    };

    setupGallery('gallery-event');
    setupGallery('gallery-achievement');

    // --- Contact Form Submission --- //
    const contactForm = document.querySelector('#contact form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<span>Mengirim...</span>';
            submitBtn.disabled = true;

            // Simulate network request
            setTimeout(() => {
                submitBtn.innerHTML = '<span>Pesan Terkirim!</span>';
                submitBtn.classList.add('bg-green-500');
                this.reset();

                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('bg-green-500');
                }, 2500);
            }, 1500);
        });
    }
});