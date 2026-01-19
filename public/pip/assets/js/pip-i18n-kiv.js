/*! PIP Shared i18n Module (BM / EN)
 *  Include:
 *    <script defer src="assets/js/pip-i18n.js"></script>
 *
 *  Mark translatable elements:
 *    <span data-i18n="nav_home">LAMAN UTAMA</span>
 *    <span data-i18n="dash_welcome_html" data-i18n-mode="html">Selamat Kembali, ...</span>
 *    <button data-i18n="cta_complete_profile">LENGKAPKAN MAKLUMAT</button>
 *    <input data-i18n="placeholder_search" data-i18n-attr="placeholder" placeholder="Cari...">
 *
 *  Optional per-page extension:
 *    window.PIP_I18N_PAGE = { en:{ page_title:"..." }, bm:{ page_title:"..." } };
 */

(function (w, d) {
  "use strict";

  var CORE = {
    bm: {
      nav_home: "LAMAN UTAMA",
      nav_directory: "DIREKTORI",
      nav_about: "MENGENAI PIP",
      nav_contact: "HUBUNGI KAMI",
      logout: "LOG KELUAR",

      cta_submit_icp_rd: "ISI CADANGAN PROJEK ICP ATAU R&D",
      cta_complete_profile: "LENGKAPKAN MAKLUMAT",

      box_org_title: "Maklumat Organisasi",
      box_docs_title: "Dokumen Muat Turun",
      docs_empty: "Tiada dokumen dimuat naik.",

      box_icp_title: "Program Kolaborasi Industri Pertahanan",
      icp_empty: "Tiada Rekod Program Kolaborasi Industri Pertahanan",

      box_wishlist_title: "Cadangan Wishlist",
      wishlist_empty: "Tiada cadangan buat masa ini.",

      modal_title: "Kemaskini Gambar Profil",
      modal_desc: "Muat naik imej logo/profil baharu. Format dibenarkan: JPG, PNG. Saiz maksimum: 1MB.",
      modal_choose_file: "Pilih fail",
      modal_hint: "Pastikan imej jelas dan berlatar belakang sesuai.",
      modal_cancel: "Batal",
      modal_upload: "Muat Naik",
      avatar_edit: "Edit Profile",
      dir_page_title: "Direktori Ekosistem Pertahanan Negara",
      dir_hero_title: "Direktori Ekosistem Pertahanan Negara",
      dir_hero_sub: "Direktori ini menghimpunkan organisasi utama ekosistem industri pertahanan negara yang berdaftar sebagai Rakan Industri Pertahanan.",
      dir_filter_category: "Kategori",
      dir_filter_sort: "Susun Mengikut",
      dir_filter_search: "Carian",
      dir_opt_all: "Semua",
      dir_opt_local: "Syarikat Tempatan",
      dir_opt_agency: "Agensi Kerajaan",
      dir_opt_academia: "Institusi Penyelidikan & Akademia",
      dir_opt_oem: "OEM",
      dir_sort_latest: "Susun Mengikut",
      dir_search_placeholder: "Contoh: siber, komunikasi, Kuala Lumpur",
      dir_search_btn: "Cari",
      dir_view_details: "Lihat butiran",
















      footer_privacy: "POLISI PRIVASI",
      footer_terms: "TERMA PENGGUNAAN",
      footer_contact: "HUBUNGI KAMI"
    },
    en: {
      nav_home: "HOME",
      nav_directory: "DIRECTORY",
      nav_about: "ABOUT PIP",
      nav_contact: "CONTACT US",
      logout: "LOGOUT",

      cta_submit_icp_rd: "SUBMIT ICP OR R&D PROJECT PROPOSAL",
      cta_complete_profile: "COMPLETE PROFILE",

      box_org_title: "Organisation Details",
      box_docs_title: "Download Documents",
      docs_empty: "No documents uploaded.",

      box_icp_title: "Defence Industry Collaboration Programme",
      icp_empty: "No Defence Industry Collaboration Programme records found.",

      box_wishlist_title: "Wishlist Proposals",
      wishlist_empty: "No proposals at the moment.",

      modal_title: "Update Profile Image",
      modal_desc: "Upload a new logo/profile image. Allowed formats: JPG, PNG. Max size: 1MB.",
      modal_choose_file: "Choose file",
      modal_hint: "Ensure the image is clear and has a suitable background.",
      modal_cancel: "Cancel",
      modal_upload: "Upload",
      avatar_edit: "Edit Profile",
      dir_page_title: "Defence Ecosystem Directory",
      dir_hero_title: "Defence Ecosystem Directory",
      dir_hero_sub: "This directory consolidates key organisations in the national defence industry ecosystem registered as Defence Industry Partners.",
      dir_filter_category: "Category",
      dir_filter_sort: "Sort By",
      dir_filter_search: "Search",
      dir_opt_all: "All",
      dir_opt_local: "Local Company",
      dir_opt_agency: "Government Agency",
      dir_opt_academia: "Research & Academia",
      dir_opt_oem: "OEM",
      dir_sort_latest: "Sort By",
      dir_search_placeholder: "Example: cyber, communications, Kuala Lumpur",
      dir_search_btn: "Search",
      dir_view_details: "View details",
















      footer_privacy: "PRIVACY POLICY",
      footer_terms: "TERMS OF USE",
      footer_contact: "CONTACT US"
    }
  };

  function safeJsonParse(v) { try { return JSON.parse(v); } catch (e) { return null; } }

  function mergeDict(base, extra) {
    var out = { bm: {}, en: {} };
    ["bm", "en"].forEach(function (lang) {
      var a = base && base[lang] ? base[lang] : {};
      var b = extra && extra[lang] ? extra[lang] : {};
      for (var k in a) out[lang][k] = a[k];
      for (var k2 in b) out[lang][k2] = b[k2];
    });
    return out;
  }

  function setHtmlLang(lang) { d.documentElement.setAttribute("lang", lang === "en" ? "en" : "ms"); }

  function persistLang(lang) {
    try { w.localStorage.setItem("pip_lang", lang); } catch (e) {}
    d.cookie = "pip_lang=" + encodeURIComponent(lang) + "; path=/; max-age=31536000";
  }

  function readCookieLang() {
    var m = d.cookie.match(/(?:^|;\s*)pip_lang=([^;]+)/);
    return m ? decodeURIComponent(m[1]) : "";
  }

  function getLang() {
    var ls = "";
    try { ls = w.localStorage.getItem("pip_lang") || ""; } catch (e) {}
    var lang = (ls || readCookieLang() || "bm").toLowerCase();
    return lang === "en" ? "en" : "bm";
  }

  function resolvePageDict() {
    if (w.PIP_I18N_PAGE && typeof w.PIP_I18N_PAGE === "object") return w.PIP_I18N_PAGE;

    var b = d.body;
    var attr = b ? b.getAttribute("data-i18n-page") : "";
    return attr ? safeJsonParse(attr) : null;
  }

  function apply(lang, dict) {
    var use = dict || mergeDict(CORE, resolvePageDict());

    // data-i18n (default TEXT; HTML only if data-i18n-mode="html")
    d.querySelectorAll("[data-i18n]").forEach(function (el) {
      var key = el.getAttribute("data-i18n");
      if (!key) return;
      var val = use[lang] && use[lang][key] != null ? use[lang][key] : null;
      if (val == null) return;

      var mode = (el.getAttribute("data-i18n-mode") || "").toLowerCase();
      if (mode === "html") el.innerHTML = val;
      else el.textContent = val;
    });

    // aria-label
    d.querySelectorAll("[data-i18n-aria]").forEach(function (el) {
      var key = el.getAttribute("data-i18n-aria");
      var val = use[lang] && use[lang][key] != null ? use[lang][key] : null;
      if (val != null) el.setAttribute("aria-label", val);
    });

    // translate attributes
    d.querySelectorAll("[data-i18n-attr][data-i18n]").forEach(function (el) {
      var key = el.getAttribute("data-i18n");
      var attr = el.getAttribute("data-i18n-attr");
      if (!key || !attr) return;
      var val = use[lang] && use[lang][key] != null ? use[lang][key] : null;
      if (val == null) return;
      if (attr === "value" && "value" in el) el.value = val;
      else el.setAttribute(attr, val);
    });

    // input value fallback for button-like inputs
    d.querySelectorAll("input[data-i18n]:not([data-i18n-attr])").forEach(function (el) {
      var type = (el.getAttribute("type") || "").toLowerCase();
      if (type === "button" || type === "submit" || type === "reset") {
        var key = el.getAttribute("data-i18n");
        var val = use[lang] && use[lang][key] != null ? use[lang][key] : null;
        if (val != null) el.value = val;
      }
    });

    // toggle active
    var bmA = d.querySelector('.pip-lang a[data-lang="bm"]');
    var enA = d.querySelector('.pip-lang a[data-lang="en"]');
    if (bmA && enA) {
      bmA.classList.toggle("active", lang !== "en");
      enA.classList.toggle("active", lang === "en");
    }

    setHtmlLang(lang);
    persistLang(lang);
  }

  function bindToggle() {
    var group = d.querySelector(".pip-lang");
    if (!group) return;
    group.addEventListener("click", function (e) {
      var a = e.target && e.target.closest ? e.target.closest("a[data-lang]") : null;
      if (!a) return;
      e.preventDefault();
      var lang = (a.getAttribute("data-lang") || "").toLowerCase() === "en" ? "en" : "bm";
      apply(lang);
    });
  }

  function init() { bindToggle(); apply(getLang()); }

  w.PIP_I18N = {
    CORE: CORE,
    getLang: getLang,
    setLang: function (lang) { apply(lang === "en" ? "en" : "bm"); },
    apply: function () { apply(getLang()); }
  };

  if (d.readyState === "loading") d.addEventListener("DOMContentLoaded", init);
  else init();

})(window, document);
