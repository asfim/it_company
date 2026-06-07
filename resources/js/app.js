import './bootstrap';

// Intersection Observer for Reveal Animations
const observerOptions = {
    threshold: 0.1
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('active');
        }
    });
}, observerOptions);

document.addEventListener('DOMContentLoaded', () => {
    // Reveal Animations
    const revealElements = document.querySelectorAll('.reveal');
    revealElements.forEach(el => observer.observe(el));

    // Smooth scroll for nav links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            const target = document.querySelector(targetId);
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Entry animations trigger
    document.querySelectorAll('.hero-left, .hero-right').forEach(el => {
        el.style.opacity = '1';
        el.style.transform = 'translateY(0)';
    });

    // Navbar scroll shadow
    window.addEventListener('scroll', () => {
        const nav = document.querySelector('.kastana-header');
        if (window.scrollY > 20) {
            nav.style.boxShadow = '0 4px 24px rgba(0,0,0,0.07)';
            nav.style.padding = '1rem 5%';
            nav.style.background = 'rgba(255,255,255,0.95)';
        } else {
            nav.style.boxShadow = 'none';
            nav.style.padding = '1.1rem 5%';
            nav.style.background = 'rgba(255,255,255,0.95)';
        }
    });

    // Dropdown toggle for mobile/tablet touch screens
    const dropdown = document.querySelector('.dropdown');
    if (dropdown) {
        const trigger = dropdown.querySelector('.dropdown-trigger');
        if (trigger) {
            trigger.addEventListener('click', (e) => {
                if (window.innerWidth <= 1024) {
                    e.preventDefault();
                    dropdown.classList.toggle('active');
                }
            });
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove('active');
            }
        });
    }

    // Mobile menu toggle
    const header = document.querySelector('.kastana-header');
    const menuToggle = document.querySelector('.mobile-menu-toggle');
    if (menuToggle && header) {
        menuToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            header.classList.toggle('mobile-active');
        });

        // Close mobile menu when clicking on any top-level nav link
        const navLinks = header.querySelectorAll('.nav-links > a');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                header.classList.remove('mobile-active');
            });
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!header.contains(e.target)) {
                header.classList.remove('mobile-active');
            }
        });
    }

    // Active nav link highlighting
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.kastana-header .nav-links > a');
    navLinks.forEach(link => {
        const href = new URL(link.href, window.location.origin).pathname;
        if (href === '/' && currentPath === '/') {
            link.classList.add('nav-active');
        } else if (href !== '/' && currentPath.startsWith(href)) {
            link.classList.add('nav-active');
        }
    });

    // Mark services dropdown trigger as active when on a services sub-page
    const dropdownTrigger = document.querySelector('.kastana-header .dropdown-trigger');
    if (dropdownTrigger && currentPath.startsWith('/services')) {
        dropdownTrigger.classList.add('nav-active');
    }

    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
