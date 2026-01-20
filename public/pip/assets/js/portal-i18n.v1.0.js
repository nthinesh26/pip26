/* assets/js/portal-i18n.js (v1.0)
   Text-node + attribute translator (MS <-> EN) for PIP pages.

   Requires:
   - content-dictionary-i18n.js loaded BEFORE this file
     (defines window.PIP_I18N_DICTIONARY)
   - only works with navbar with EN | MY setting 

   Usage:
   - import content-dictionary-i18n.js and portal-i18n.v1.0.js into the html file
        <script src="assets/js/content-dictionary-i18n.js" defer></script>
        <script src="assets/js/portal-i18n.v1.0.js" defer></script>

*/
(function () {
  "use strict";

  const STORAGE_KEY = "pip_lang";
  const DEFAULT_LANG = "ms";

  // Skip translating inside these elements
  const SKIP_SELECTORS = [
    "script",
    "style",
    "noscript",
    "code",
    "pre",
    "[contenteditable='true']",
  ].join(",");

  // Translate these attributes when present
  const ATTRS_TO_TRANSLATE = ["placeholder", "title", "aria-label"];

  // Keep original MS values for text nodes
  const ORIGINAL_TEXT = new WeakMap();

  // Built translation maps for this page
  let maps = null;

  function normalizeLang(lang) {
    const v = (lang || "").toLowerCase().trim();
    if (v === "ms" || v === "bm" || v === "my") return "ms";
    return "en";
  }

  function getSavedLang() {
    try {
      const v = localStorage.getItem(STORAGE_KEY);
      return v ? normalizeLang(v) : null;
    } catch (_) {
      return null;
    }
  }

  function detectInitialLang() {
    const saved = getSavedLang();
    if (saved) return saved;

    const htmlLang = document.documentElement.getAttribute("lang");
    if (htmlLang) return normalizeLang(htmlLang);

    return DEFAULT_LANG;
  }

  function toPlainCleanText(s) {
    if (s == null) return "";
    return String(s)
      .replace(/\s+/g, " ")
      .replace(/\u00A0/g, " ")
      .trim();
  }

  function buildTranslationMaps(dict, pageKey) {
    // supports:
    // dict.common
    // dict.pages[pageKey]
    // dict[pageKey]
    const common = (dict && dict.common) ? dict.common : {};
    let page = {};

    if (dict && dict.pages && pageKey && dict.pages[pageKey]) {
      page = dict.pages[pageKey];
    } else if (dict && pageKey && dict[pageKey]) {
      page = dict[pageKey];
    }

    // Flatten into 2 maps for faster lookup:
    // ms -> en and en -> ms
    const msToEn = new Map();
    const enToMs = new Map();

    function ingest(obj) {
      if (!obj || typeof obj !== "object") return;

      Object.keys(obj).forEach((k) => {
        const node = obj[k];
        if (!node || typeof node !== "object") return;

        const ms = toPlainCleanText(node.ms);
        const en = toPlainCleanText(node.en);
        if (ms && en) {
          msToEn.set(ms, en);
          enToMs.set(en, ms);
        }
      });
    }

    ingest(common);
    ingest(page);

    return { msToEn, enToMs };
  }

  function lookupTranslation(raw, lang) {
    if (!maps) return null;

    const text = toPlainCleanText(raw);
    if (!text) return null;

    if (lang === "en") {
      return maps.msToEn.get(text) || null;
    }
    // lang === "ms"
    return maps.enToMs.get(text) || null;
  }

  function isInsideSkippedElement(node) {
    if (!node || !node.parentElement) return false;
    return !!node.parentElement.closest(SKIP_SELECTORS);
  }

  function walkTextNodes(root, cb) {
    const walker = document.createTreeWalker(
      root,
      NodeFilter.SHOW_TEXT,
      {
        acceptNode: function (n) {
          if (!n || !n.nodeValue) return NodeFilter.FILTER_REJECT;

          if (isInsideSkippedElement(n)) return NodeFilter.FILTER_REJECT;

          const v = toPlainCleanText(n.nodeValue);
          if (!v) return NodeFilter.FILTER_REJECT;

          // Skip pure numbers / punctuation
          if (/^[\d\s.,:/\-+()]+$/.test(v)) return NodeFilter.FILTER_REJECT;

          return NodeFilter.FILTER_ACCEPT;
        },
      },
      false
    );

    let node;
    while ((node = walker.nextNode())) cb(node);
  }

  function collectTargets() {
    const textTargets = [];
    const attrTargets = [];

    // Text nodes
    walkTextNodes(document.body, (textNode) => {
      const v = toPlainCleanText(textNode.nodeValue);
      if (!v) return;

      if (!ORIGINAL_TEXT.has(textNode)) {
        ORIGINAL_TEXT.set(textNode, v); // treat current content as "original"
      }

      textTargets.push(textNode);
    });

    // Attributes
    const all = document.body.querySelectorAll("*");
    all.forEach((el) => {
      if (el.closest(SKIP_SELECTORS)) return;

      ATTRS_TO_TRANSLATE.forEach((attr) => {
        if (!el.hasAttribute(attr)) return;

        const v = toPlainCleanText(el.getAttribute(attr));
        if (!v) return;
        if (/^[\d\s.,:/\-+()]+$/.test(v)) return;

        const storeKey = "data-i18n-orig-" + attr;
        console.log(attr);
        if (!el.hasAttribute(storeKey)) el.setAttribute(storeKey, v);

        const origMS = el.getAttribute(storeKey) || v;
        attrTargets.push({ el, attr, origMS });
      });
    });

    return { textTargets, attrTargets };
  }

  let TARGETS = null;

  function applyTranslations(lang) {
    const target = normalizeLang(lang);

    if (!TARGETS) TARGETS = collectTargets();

    const { textTargets, attrTargets } = TARGETS;

    // TEXT
    textTargets.forEach((textNode) => {
      const original = ORIGINAL_TEXT.get(textNode) || toPlainCleanText(textNode.nodeValue);
      if (!original) return;

      if (target === "ms") {
        // try to translate EN->MS; if not found, keep original
        const ms = lookupTranslation(original, "ms");
        textNode.nodeValue = ms || original;
      } else {
        // translate MS->EN
        const en = lookupTranslation(original, "en");
        textNode.nodeValue = en || original;
      }
    });

    // ATTRS
    attrTargets.forEach(({ el, attr, origMS }) => {
      if (!el) return;

      if (target === "ms") {
        const ms = lookupTranslation(origMS, "ms");
        el.setAttribute(attr, ms || origMS);
      } else {
        const en = lookupTranslation(origMS, "en");
        el.setAttribute(attr, en || origMS);
      }
    });
  }

  // ✅ FIXED: toggles BOTH `.active` and `.is-active`
  function setActiveLangUI(lang) {
    const normalized = normalizeLang(lang); // "ms" or "en"

    document.querySelectorAll("[data-lang-switch],[data-lang]").forEach((el) => {
      const raw = (el.getAttribute("data-lang") || el.getAttribute("data-lang-switch") || "").toLowerCase();
      if (raw !== "ms" && raw !== "en" && raw !== "my" && raw !== "bm") return;

      const v = normalizeLang(raw); // bm/my -> ms
      const isActive = v === normalized;

      // Support both class names (CSS currently uses .active)
      el.classList.toggle("active", isActive);
      el.classList.toggle("is-active", isActive);

      el.setAttribute("aria-pressed", String(isActive));
      if (isActive) el.setAttribute("aria-current", "true");
      else el.removeAttribute("aria-current");
    });

    document.documentElement.setAttribute("lang", normalized);
  }

  function setLanguage(lang, opts) {
    const normalized = normalizeLang(lang);

    if (!opts?.noPersist) {
      try {
        localStorage.setItem(STORAGE_KEY, normalized);
      } catch (_) {}
    }

    setActiveLangUI(normalized);
    applyTranslations(normalized);
  }

  function bindClicks() {
    document.addEventListener("click", function (e) {
      const btn = e.target && e.target.closest ? e.target.closest("[data-lang],[data-lang-switch]") : null;
      if (!btn) return;

      const v = (btn.getAttribute("data-lang") || btn.getAttribute("data-lang-switch") || "").toLowerCase();
      if (v !== "ms" && v !== "en" && v !== "my" && v !== "bm") return;

      e.preventDefault();
      setLanguage(v);
    });
  }

  function init() {
    // Build translation maps (common + page-specific)
    const dict = window.PIP_I18N_DICTIONARY || {};
    const pageKey = document.body?.getAttribute("data-i18n-page") || null;
    maps = buildTranslationMaps(dict, pageKey);

    bindClicks();
    setLanguage(detectInitialLang(), { noPersist: true });

    // Optional: ensure localStorage is set at least once
    if (!getSavedLang()) {
      try {
        localStorage.setItem(STORAGE_KEY, detectInitialLang());
      } catch (_) {}
    }
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }

  // Optional API
  window.PIP_I18N = window.PIP_I18N || {};
  window.PIP_I18N.setLanguage = setLanguage;
})();
