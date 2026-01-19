/*! PIP Shared i18n Module (BM / EN) — FINAL CLEANED
 *  Include (recommended):
 *    <script defer src="assets/js/pip-i18n.js"></script>
 *
 *  Mark translatable elements:
 *    <span data-i18n="nav_home">LAMAN UTAMA</span>
 *    <span data-i18n="dash_welcome_html" data-i18n-mode="html">Selamat Kembali, ...</span>
 *    <button data-i18n="cta_complete_profile">LENGKAPKAN MAKLUMAT</button>
 *    <input data-i18n="placeholder_search" data-i18n-attr="placeholder" placeholder="Cari...">
 *
 *  Optional per-page extension (recommended):
 *    window.PIP_I18N_PAGE = { bm:{...}, en:{...} };
 *  OR
 *    <body data-i18n-page='{"bm":{...},"en":{...}}'>
 */

(function (w, d) {
  "use strict";

  // ============================================================
  // 1) CORE DICTIONARY (Single Source of Truth)
  // ============================================================
  var CORE = {
    bm: {
      // Navigation / Global
      nav_home: "LAMAN UTAMA",
      nav_directory: "DIREKTORI",
      nav_about: "MENGENAI PIP",
      nav_contact: "HUBUNGI KAMI",
      logout: "LOG KELUAR",

      // Common UI
      placeholder_search: "Cari...",
      modal_close: "Tutup",

      // CTAs
      cta_submit_icp_rd: "ISI CADANGAN PROJEK ICP ATAU R&D",
      cta_complete_profile: "LENGKAPKAN MAKLUMAT",

      // Dashboard / Status
      box_status_title: "Status Profil",
      box_status_desc: "Sila lengkapkan profil organisasi anda untuk mengakses ekosistem pertahanan penuh.",
      status_percent_complete: "30% LENGKAP",
      status_item_basic: "Pendaftaran dan Maklumat Asas",
      status_item_profile_syarikat: "Profil dan Keupayaan Syarikat",
      dash_message_full: "Tahniah! Profil organisasi anda telah lengkap dan kini mempunyai akses penuh ke Portal Industri Pertahanan.",
      dash_welcome_html: "Selamat Kembali, <span id=\"pipAccountName\">[[ACCOUNT_NAME]]</span>!",

      // Common Boxes
      box_org_title: "Maklumat Organisasi",
      box_docs_title: "Dokumen Muat Turun",
      docs_empty: "Tiada dokumen dimuat naik.",
      box_overview_title: "Gambaran Keseluruhan Syarikat",
      box_expertise_title: "Bidang Kepakaran",

      // ICP
      box_icp_title: "Program Kolaborasi Industri Pertahanan",
      icp_empty: "Tiada Rekod Program Kolaborasi Industri Pertahanan",
      icp_provider: "ICP PROVIDER",
      icp_recipient: "ICP RECIPIENT",
      label_contract: "Kontrak",
      label_year: "Tahun",
      label_provider: "Penyedia",

      // Wishlist
      box_wishlist_title: "Cadangan",
      wishlist_empty: "Tiada cadangan buat masa ini.",
      wishlist_view_title: "Lihat Cadangan",
      wishlist_view_sub: "Paparan penuh maklumat cadangan berdasarkan input pengguna.",
      wishlist_project_type: "JENIS CADANGAN PROJEK",
      wishlist_desc_title: "Penerangan Terperinci Projek",
      wishlist_duration: "TEMPOH PROJEK",
      wishlist_priority: "BIDANG KEUTAMAAN",
      wishlist_sector: "SEKTOR",
      wishlist_category: "KATEGORI",
      wishlist_refno: "NOMBOR CADANGAN",
      wishlist_company: "NAMA SYARIKAT",
      wishlist_tasks_title: "Tugas dan Pencapaian Utama",
      wishlist_target_title: "Sasaran",
      wishlist_output_title: "Hasil Projek",
      wishlist_impact_title: "Kesan dan Manfaat Projek kepada Malaysia",
      btn_back: "KEMBALI",

      // Directory (Ekosistem)
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

      // Organisation profile fields (common)
      org_company_name: "NAMA SYARIKAT",
      org_ssm_no: "NO PENDAFTARAN SSM",
      org_ssm: "NO PENDAFTARAN SSM",
      org_incorp_date: "TARIKH DITUBUHKAN",
      org_country_established: "NEGARA DITUBUHKAN",
      org_year_established: "TAHUN DITUBUHKAN",
      org_company_type: "JENIS SYARIKAT",
      org_ownership: "STATUS PEMILIKAN",

      // OEM-specific
      org_oem_name: "NAMA OEM",


// Akademia

org_org_name: " NAMA ORGANISASI",
org_org_type: "JENIS ORGANISASI",
org_mandate_heading: "Penerang Organisai Mandat / Peranan Utama",

      // Agency-specific
      org_agency_name: "NAMA AGENSI",
      org_established_date: "TARIKH DITUBUHKAN",
      org_agency_type: "JENIS AGENSI",
      org_ministry: "KEMENTERIAN",

      // Page titles
      page_title_syarikat: "Profil Organisasi (Syarikat Tempatan)",

      // Modal (Profile Image)
      modal_title: "Kemaskini Gambar Profil",
      modal_desc: "Muat naik imej logo/profil baharu. Format dibenarkan: JPG, PNG. Saiz maksimum: 1MB.",
      modal_choose_file: "Pilih fail",
      modal_hint: "Pastikan imej jelas dan berlatar belakang sesuai.",
      modal_cancel: "Batal",
      modal_upload: "Muat Naik",
      avatar_edit: "Edit Profile",

      // Badges
      badge_basic: "MAKLUMAT ASAS",

  // View wishlist
	view_wishlist: "LIHAT CADANGAN", 



      // Footer
      footer_privacy: "POLISI PRIVASI",
      footer_terms: "TERMA PENGGUNAAN",
      footer_contact: "HUBUNGI KAMI"
    },

    en: {
      // Navigation / Global
      nav_home: "HOME",
      nav_directory: "DIRECTORY",
      nav_about: "ABOUT PIP",
      nav_contact: "CONTACT US",
      logout: "LOGOUT",

      // Common UI
      placeholder_search: "Search...",
      modal_close: "Close",

      // CTAs
      cta_submit_icp_rd: "SUBMIT ICP OR R&D PROJECT PROPOSAL",
      cta_complete_profile: "COMPLETE PROFILE",

      // Dashboard / Status
      box_status_title: "Profile Status",
      box_status_desc: "Please complete your organisation profile to access the full defence ecosystem.",
      status_percent_complete: "30% COMPLETE",
      status_item_basic: "Registration and Basic Information",
      status_item_profile_syarikat: "Company Profile and Capabilities",
      dash_message_full: "Congratulations! Your organisation profile is complete and you now have full access to the Defence Industry Portal.",
      dash_welcome_html: "Welcome back, <span id=\"pipAccountName\">[[ACCOUNT_NAME]]</span>!",

      // Common Boxes
      box_org_title: "Organisation Details",
      box_docs_title: "Download Documents",
      docs_empty: "No documents uploaded.",
      box_overview_title: "Company Overview",
      box_expertise_title: "Areas of Expertise",

      // ICP
      box_icp_title: "Defence Industry Collaboration Programme",
      icp_empty: "No Defence Industry Collaboration Programme records found.",
      icp_provider: "ICP PROVIDER",
      icp_recipient: "ICP RECIPIENT",
      label_contract: "Contract",
      label_year: "Year",
      label_provider: "Provider",

      // Wishlist
      box_wishlist_title: "Proposals",
      wishlist_empty: "No proposals at the moment.",
      wishlist_view_title: "View Proposal",
      wishlist_view_sub: "Full proposal details based on the user’s submitted input.",
      wishlist_project_type: "PROJECT PROPOSAL TYPE",
      wishlist_desc_title: "Detailed Project Description",
      wishlist_duration: "PROJECT DURATION",
      wishlist_priority: "PRIORITY AREA",
      wishlist_sector: "SECTOR",
      wishlist_category: "CATEGORY",
      wishlist_refno: "REFERENCE NUMBER",
      wishlist_company: "COMPANY NAME",
      wishlist_tasks_title: "Key Tasks and Achievements",
      wishlist_target_title: "Target",
      wishlist_output_title: "Project Output",
      wishlist_impact_title: "Impact and Benefits to Malaysia",
      btn_back: "BACK",

      // Directory (Ekosistem)
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

      // Organisation profile fields (common)
      org_company_name: "COMPANY NAME",
      org_ssm_no: "SSM REGISTRATION NO.",
      org_ssm: "SSM REGISTRATION NO.",
      org_incorp_date: "DATE ESTABLISHED",
      org_country_established: "COUNTRY ESTABLISHED",
      org_year_established: "YEAR ESTABLISHED",
      org_company_type: "COMPANY TYPE",
      org_ownership: "OWNERSHIP STATUS",

      // OEM-specific
      org_oem_name: "OEM NAME",

// Akademia

org_org_name: " ORGANISATION NAME",
org_org_type: "ORGANISATION TYPE",
org_mandate_heading: "Overview of the Organization’s Mandate / Key Roles",


      // Agency-specific
      org_agency_name: "AGENCY NAME",
      org_established_date: "DATE ESTABLISHED",
      org_agency_type: "AGENCY TYPE",
      org_ministry: "MINISTRY",

      // Page titles
      page_title_syarikat: "Organisation Profile (Local Company)",

      // Modal (Profile Image)
      modal_title: "Update Profile Image",
      modal_desc: "Upload a new logo/profile image. Allowed formats: JPG, PNG. Max size: 1MB.",
      modal_choose_file: "Choose file",
      modal_hint: "Ensure the image is clear and has a suitable background.",
      modal_cancel: "Cancel",
      modal_upload: "Upload",
      avatar_edit: "Edit Profile",

      // Badges
      badge_basic: "BASIC INFO",

// View Proposal
	view_wishlist: "VIEW PRPOPOSAL", 

      // Footer
      footer_privacy: "PRIVACY POLICY",
      footer_terms: "TERMS OF USE",
      footer_contact: "CONTACT US"
    }
  };

  // ============================================================
  // 2) HELPERS
  // ============================================================
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

  function setHtmlLang(lang) {
    d.documentElement.setAttribute("lang", lang === "en" ? "en" : "ms");
  }

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
    // Option A: JS variable
    if (w.PIP_I18N_PAGE && typeof w.PIP_I18N_PAGE === "object") return w.PIP_I18N_PAGE;

    // Option B: body attribute JSON
    var b = d.body;
    var attr = b ? b.getAttribute("data-i18n-page") : "";
    return attr ? safeJsonParse(attr) : null;
  }

  // ============================================================
  // 3) APPLY TRANSLATIONS
  // ============================================================
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

    // toggle active state (supports bm/en and legacy my/en)
    var bmA = d.querySelector('.pip-lang a[data-lang="bm"], .pip-lang a[data-lang="my"]');
    var enA = d.querySelector('.pip-lang a[data-lang="en"]');
    if (bmA && enA) {
      bmA.classList.toggle("active", lang !== "en");
      enA.classList.toggle("active", lang === "en");
    }

    setHtmlLang(lang);
    persistLang(lang);
  }

  // ============================================================
  // 4) LANGUAGE TOGGLE BINDING (JOOMLA-SAFE)
  //    Uses event delegation in CAPTURE phase to survive stopPropagation()
  // ============================================================
  function coerceLang(v) {
    v = (v || "").toLowerCase();
    // tolerate "my" used in some templates; treat it as "bm"
    if (v === "en") return "en";
    return "bm";
  }

  function bindToggle() {
    // Click
    d.addEventListener("click", function (e) {
      var a = e.target && e.target.closest ? e.target.closest(".pip-lang a[data-lang]") : null;
      if (!a) return;
      e.preventDefault();
      e.stopPropagation();
      apply(coerceLang(a.getAttribute("data-lang")));
    }, true);

    // Keyboard accessibility (Enter / Space)
    d.addEventListener("keydown", function (e) {
      if (e.key !== "Enter" && e.key !== " ") return;
      var a = e.target && e.target.closest ? e.target.closest(".pip-lang a[data-lang]") : null;
      if (!a) return;
      e.preventDefault();
      e.stopPropagation();
      apply(coerceLang(a.getAttribute("data-lang")));
    }, true);
  }

  function init() {
    bindToggle();
    apply(getLang());
  }

  // ============================================================
  // 5) PUBLIC API
  // ============================================================
  w.PIP_I18N = {
    CORE: CORE,
    getLang: getLang,
    setLang: function (lang) { apply(coerceLang(lang)); },
    apply: function () { apply(getLang()); }
  };

  if (d.readyState === "loading") d.addEventListener("DOMContentLoaded", init);
  else init();

})(window, document);
