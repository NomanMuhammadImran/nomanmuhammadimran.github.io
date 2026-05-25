// ── Project Filter
const filterBtns = document.querySelectorAll('.filter-btn');
const projectItems = document.querySelectorAll('.project-item');

filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {

        // active button
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const filter = btn.getAttribute('data-filter');

        projectItems.forEach(item => {

            if (filter === 'all') {
                item.style.display = 'block';
            } else {
                if (item.classList.contains(filter)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            }

        });

    });
});

// ── Navbar scroll effect
const nav = document.getElementById('mainNav');
window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 30);
});

// ── Active nav link highlight
const sections = document.querySelectorAll('section[id]');
const navLinks = document.querySelectorAll('.nav-link');
window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(s => {
        if (window.scrollY >= s.offsetTop - 120) current = s.id;
    });
    navLinks.forEach(l => {
        l.classList.toggle('active', l.getAttribute('href') === '#' + current);
    });
});

// ── Skill bar animation on scroll
const bars = document.querySelectorAll('.progress-bar');
const barObserver = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.style.width = e.target.dataset.width + '%';
            barObserver.unobserve(e.target);
        }
    });
}, { threshold: 0.3 });
bars.forEach(b => barObserver.observe(b));

// ── Reveal on scroll
const reveals = document.querySelectorAll('.reveal');
const revObserver = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.classList.add('visible');
            revObserver.unobserve(e.target);
        }
    });
}, { threshold: 0.1 });
reveals.forEach(r => revObserver.observe(r));

// ── Contact form feedback
document.querySelector('.btn-submit').addEventListener('click', function () {
    const n = document.querySelectorAll('.form-control-custom')[0].value;
    if (n.trim()) {
        this.innerHTML = '<i class="ti ti-check"></i> Message Sent!';
        this.style.background = '#00c89a';
        setTimeout(() => {
            this.innerHTML = 'Send Message <i class="ti ti-send"></i>';
            this.style.background = '';
        }, 3000);
    }
});

// year dynamic js
document.addEventListener("DOMContentLoaded", function () {
  const yearElement = document.getElementById("year");
  if (yearElement) {
    yearElement.textContent = new Date().getFullYear();
  } else {
    console.log("Element #year not found");
  }
});

const heroStats = document.querySelector('.hero-stats');
const numbers = document.querySelectorAll('.num');

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {

            heroStats.classList.add('active');

            numbers.forEach(num => {
                const target = +num.getAttribute('data-count');
                const originalText = num.textContent;

                let suffix = '';

                if (originalText.includes('+')) suffix = '+';
                if (originalText.includes('%')) suffix = '%';

                let count = 0;
                const speed = target / 60;

                const updateCount = () => {
                    count += speed;

                    if (count < target) {
                        num.textContent = Math.ceil(count) + suffix;
                        requestAnimationFrame(updateCount);
                    } else {
                        num.textContent = target + suffix;
                    }
                };

                updateCount();
            });

            observer.unobserve(heroStats);
        }
    });
}, {
    threshold: 0.4
});

observer.observe(heroStats);