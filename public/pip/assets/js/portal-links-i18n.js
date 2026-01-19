/* assets/js/portal-links-i18n.js
   Switches navbar/footer/register hrefs based on localStorage "pip_lang"
   Compatible with portal-i18n.v1.0.js which uses STORAGE_KEY = "pip_lang"
*/
(function () {
  "use strict";

  const STORAGE_KEY = "pip_lang";

  // Canonical link map
  const LINKS = {
    register: {
      ms: "https://myip.mod.gov.my/daftar-organisasi",
      en: "https://myip.mod.gov.my/register-organization",
    },
    home: {
      ms: "https://myip.mod.gov.my/",
      en: "https://myip.mod.gov.my/home",
    },
    about: {
      ms: "https://myip.mod.gov.my/mengenai-portal",
      en: "https://myip.mod.gov.my/about",
    },
    contact: {
      ms: "https://myip.mod.gov.my/hubungi-kami",
      en: "https://myip.mod.gov.my/contact-us",
    },
    privacy: {
      ms: "https://myip.mod.gov.my/polisi-privasi",
      en: "https://myip.mod.gov.my/polisi-privasi", // if you later have EN slug, replace here
    },
    terms: {
      ms: "https://myip.mod.gov.my/terma-pengunaan",
      en: "https://myip.mod.gov.my/terma-pengunaan", // if you later have EN slug, replace here
    },
  };

  function normalizeLang(lang) {
    const v = String(lang || "").toLowerCase().trim();
    if (v === "ms" || v === "bm" || v === "my") return "ms";
    return "en";
  }

  function getLang() {
    try {
      return normalizeLang(localStorage.getItem(STORAGE_KEY) || document.documentElement.lang || "ms");
    } catch (_) {
      return "ms";
    }
  }

  // Optional: best practice - add data-pip-link="home|about|contact|privacy|terms|register"
  function applyByDataAttr(lang) {
    const nodes = document.querySelectorAll("a[data-pip-link]");
    if (!nodes.length) return false;

    nodes.forEach((a) => {
      const key = a.getAttribute("data-pip-link");
      if (!key || !LINKS[key]) return;
      a.setAttribute("href", LINKS[key][lang] || LINKS[key].ms);
    });
    return true;
  }

  // Fallback: works with your current structure even without data attributes
  function applyByStructure(lang) {
    // NAV: 3 links in order = Home / About / Contact
    const navLinks = document.querySelectorAll(".pip-menu ul li a");
    if (navLinks.length >= 1) navLinks[0].href = LINKS.home[lang];
    if (navLinks.length >= 2) navLinks[1].href = LINKS.about[lang];
    if (navLinks.length >= 3) navLinks[2].href = LINKS.contact[lang];

    // FOOTER: 3 links in order = Privacy / Terms / Contact
    const footerAnchors = document.querySelectorAll(".pip-footer-inner a");
    if (footerAnchors.length >= 1) footerAnchors[0].href = LINKS.privacy[lang];
    if (footerAnchors.length >= 2) footerAnchors[1].href = LINKS.terms[lang];
    if (footerAnchors.length >= 3) footerAnchors[2].href = LINKS.contact[lang];

    // REGISTER / DAFTAR link(s) (common patterns)
    // - login page: ".pip-login-links a" (usually 2nd or 3rd anchor)
    document.querySelectorAll(".pip-login-links a").forEach((a) => {
      const t = (a.textContent || "").toLowerCase();
      if (t.includes("daftar") || t.includes("register")) a.href = LINKS.register[lang];
    });

    // - any button/anchor you tag or style as register
    document.querySelectorAll("a.pip-register, a[data-register], a[href*='daftar-organisasi'], a[href*='register-organization']").forEach((a) => {
      a.href = LINKS.register[lang];
    });
  }

  function updateLinks() {
    const lang = getLang();
    const done = applyByDataAttr(lang);
    if (!done) applyByStructure(lang);
  }

  function bindLangToggle() {
    const toggles = document.querySelectorAll(".pip-lang a[data-lang]");
    if (!toggles.length) return;

    toggles.forEach((a) => {
      a.addEventListener("click", function () {
        // portal-i18n.v1.0.js will also update STORAGE_KEY; we re-run after it.
        window.setTimeout(updateLinks, 0);
      });
    });
  }

  document.addEventListener("DOMContentLoaded", function () {
    updateLinks();
    bindLangToggle();
  });
})();
