const menuToggle = document.querySelector('.menu-toggle');
const mainNav = document.querySelector('.main-nav');

if (menuToggle && mainNav) {
  menuToggle.addEventListener('click', () => {
    const isOpen = mainNav.classList.toggle('open');
    menuToggle.setAttribute('aria-expanded', String(isOpen));
  });

  mainNav.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
      mainNav.classList.remove('open');
      menuToggle.setAttribute('aria-expanded', 'false');
    });
  });
}

const siteSearchMap = [
  { label: 'seo', url: 'seo.html' },
  { label: 'search engine optimization', url: 'seo.html' },
  { label: 'smm', url: 'smm.html' },
  { label: 'social media management', url: 'smm.html' },
  { label: 'google ads', url: 'google-ads.html' },
  { label: 'linkedin ads', url: 'linkedin-ads.html' },
  { label: 'meta ads', url: 'meta-ads.html' },
  { label: 'tiktok ads', url: 'tiktok-ads.html' },
  { label: 'pinterest ads', url: 'pinterest-ads.html' },
  { label: 'landing pages', url: 'landing-pages.html' },
  { label: 'tracking', url: 'contact.html' },
  { label: 'gtm', url: 'contact.html' },
  { label: 'search shopping ads', url: 'search-shopping-ads.html' },
  { label: 'search & shopping ads', url: 'search-shopping-ads.html' },
  { label: 'search and shopping ads', url: 'search-shopping-ads.html' },
  { label: 'shopping ads', url: 'search-shopping-ads.html' },
  { label: 'pricing', url: 'pricing.html' },
  { label: 'work', url: 'work.html' },
  { label: 'about', url: 'about.html' },
  { label: 'resources', url: 'resources.html' },
  { label: 'blog', url: 'blog.html' },
  { label: 'contact', url: 'contact.html' },
  { label: 'services', url: 'services.html' }
];

const siteSearchForms = document.querySelectorAll('.site-search');
siteSearchForms.forEach((form) => {
  form.addEventListener('submit', (event) => {
    event.preventDefault();
    const input = form.querySelector('input');
    const query = (input?.value || '').trim().toLowerCase();
    const match = siteSearchMap.find((item) => item.label.includes(query));
    if (query && match) {
      window.location.href = match.url;
      return;
    }
    window.location.href = 'services.html';
  });
});

const year = document.getElementById('year');
if (year) {
  year.textContent = new Date().getFullYear();
}

const revealItems = document.querySelectorAll('.reveal');

if ('IntersectionObserver' in window) {
  const revealObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          revealObserver.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.15 }
  );

  revealItems.forEach((item) => revealObserver.observe(item));
} else {
  revealItems.forEach((item) => item.classList.add('visible'));
}

const forms = document.querySelectorAll('form[data-form]');

forms.forEach((form) => {
  form.addEventListener('submit', (event) => {
    event.preventDefault();

    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    const formData = {};
    const payload = new FormData(form);

    for (const [key, value] of payload.entries()) {
      formData[key] = String(value).trim();
    }

    const previousEntries = JSON.parse(localStorage.getItem('brandBuildersSubmissions') || '[]');
    previousEntries.push({
      ...formData,
      submittedAt: new Date().toISOString(),
      form: form.dataset.form || 'contact'
    });

    localStorage.setItem('brandBuildersSubmissions', JSON.stringify(previousEntries));

    const firstName = formData.name || formData['first-name'] || formData.company || 'there';
    const params = new URLSearchParams({
      name: String(firstName),
      source: form.dataset.form || 'contact'
    });

    window.location.href = `thank-you.html?${params.toString()}`;
  });
});

const successLeadName = document.getElementById('success-lead-name');
if (successLeadName) {
  const params = new URLSearchParams(window.location.search);
  const name = params.get('name');
  if (name) {
    successLeadName.textContent = name;
  }
}
