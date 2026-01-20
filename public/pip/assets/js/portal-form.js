(function () {
  // ----------------------------
  // Toggle "Other company type" input
  // ----------------------------
  const otherRadio = document.getElementById("company_type_other_radio");
  const otherInput = document.getElementById("company_type_other");

  function syncOther() {
    if (!otherRadio || !otherInput) return;
    const enabled = otherRadio.checked;
    otherInput.disabled = !enabled;
    if (!enabled) otherInput.value = "";
  }

  document.addEventListener("change", function (e) {
    if (e.target && e.target.name === "company_type") syncOther();
  });
  syncOther();

  // ----------------------------
  // Toggle "Kepakaran - Others" text input
  // ----------------------------
  const kepakaranOthersCheckbox = document.getElementById("kepakaran_others");
  const kepakaranOthersWrap = document.getElementById("kepakaranOthersWrap");
  const kepakaranOthersText = document.getElementById("kepakaranOthersText");

  function syncKepakaranOthers() {
    // if (!kepakaranOthersCheckbox || !kepakaranOthersWrap || !kepakaranOthersText) return;

    // const enabled = kepakaranOthersCheckbox.checked;
    // kepakaranOthersWrap.style.display = enabled ? "block" : "none";
    // kepakaranOthersText.required = enabled;
    // if (!enabled) kepakaranOthersText.value = "";
  }

  if (kepakaranOthersCheckbox) {
    kepakaranOthersCheckbox.addEventListener("change", syncKepakaranOthers);
    syncKepakaranOthers();
  }

  // ----------------------------
  // Basic password strength bar (supports multiple field names)
  // ----------------------------
  const pwd =
    document.querySelector('input[name="account_pwd"]') ||
    document.querySelector('input[name="password"]') ||
    document.getElementById("password");

  const bar = document.getElementById("pwd-barstr");
  const label = document.getElementById("pwd-barstr-text");

  function scorePassword(v) {
    let s = 0;
    if (!v) return 0;
    if (v.length >= 8) s += 25;
    if (v.length >= 12) s += 15;
    if (/[A-Z]/.test(v)) s += 15;
    if (/[a-z]/.test(v)) s += 10;
    if (/[0-9]/.test(v)) s += 15;
    if (/[^A-Za-z0-9]/.test(v)) s += 20;
    return Math.min(100, s);
  }

  function textForScore(s) {
    if (s < 35) return "Lemah";
    if (s < 65) return "Sederhana";
    return "Kuat";
  }

  function updateStrength() {
    if (!pwd || !bar || !label) return;
    const s = scorePassword(pwd.value);
    bar.style.width = s + "%";
    label.textContent = "Kekuatan Kata Laluan: " + textForScore(s);
  }

  if (pwd) {
    pwd.addEventListener("input", updateStrength);
    updateStrength();
  }

  // ----------------------------
  // Ministry "OTHER" toggle (moved from inline HTML script)
  // ----------------------------
  document.addEventListener("DOMContentLoaded", function () {
    const select = document.getElementById("ministry");
    const otherWrap = document.getElementById("otherWrap");
    const otherInput = document.getElementById("otherText");

    if (!select || !otherWrap || !otherInput) return;

    function syncMinistryOther() {
      if (select.value === "OTHER") {
        otherWrap.classList.remove("hidden");
        otherInput.setAttribute("required", "required");
      } else {
        otherWrap.classList.add("hidden");
        otherInput.removeAttribute("required");
        otherInput.value = "";
      }
    }

    select.addEventListener("change", syncMinistryOther);
    syncMinistryOther(); // init
  });

  // ----------------------------
  // For Wishlist Lain-lain (SAFE - no crash if elements not on page)
  // ----------------------------
  {
    const ddl = document.getElementById("kategori");
    const group = document.getElementById("lainLainGroup");
    const txt = document.getElementById("kategori_lain");
    const OTHER_VALUE = "Lain-lain (Nyatakan)";

    function toggleOtherField() {
      if (!ddl || !group || !txt) return;

      const isOther = ddl.value === OTHER_VALUE;
      group.style.display = isOther ? "block" : "none";
      txt.required = isOther;

      if (!isOther) {
        txt.value = "";
        txt.classList.remove("is-invalid");
      }
    }

    if (ddl) {s
      toggleOtherField();
      ddl.addEventListener("change", toggleOtherField);
    }
  }

  // ----------------------------
  // For Agensi Lain-lain (SAFE)
  // ----------------------------
  {
    const radios = document.querySelectorAll('input[name="jenis_agensi"]');
    const atmExtra = document.getElementById("atm-extra");
    const lainExtra = document.getElementById("lain-extra");
    const atmBranch = document.getElementById("atm_branch");
    const atmPasukan = document.getElementById("atm_pasukan_nyatakan");
    const lainNyatakan = document.getElementById("lain_nyatakan");

    function updateVisibility() {
      if (!atmExtra || !lainExtra) return;

      const selected = document.querySelector('input[name="jenis_agensi"]:checked');
      const isATM = selected && selected.value === "ATM";
      const isLain = selected && selected.value === "Lain-lain";

      atmExtra.style.display = isATM ? "" : "none";
      lainExtra.style.display = isLain ? "" : "none";

      if (!isATM) {
        if (atmBranch) atmBranch.selectedIndex = 0;
        if (atmPasukan) atmPasukan.value = "";
      }
      if (!isLain && lainNyatakan) {
        lainNyatakan.value = "";
      }
    }

    if (radios && radios.length) {
      radios.forEach((r) => r.addEventListener("change", updateVisibility));
      updateVisibility();
    }
  }

  // ----------------------------
  // For IPT selection (GLOBAL so inline onclick can call it)
  // ----------------------------
  window.toggleIPT = function (show) {
    const el = document.getElementById("iptOptions");
    if (!el) return;

    el.style.display = show ? "block" : "none";

    // Optional cleanup: clear iptType if hiding
    if (!show) {
      const checked = document.querySelector('input[name="iptType"]:checked');
      if (checked) checked.checked = false;
    }
  };

  // Init IPT state on load (handles prefilled data / back button)
  document.addEventListener("DOMContentLoaded", () => {
    const orgChecked = document.querySelector('input[name="orgType"]:checked');
    if (!orgChecked) return;

    window.toggleIPT(orgChecked.value === "akademia");
  });
})();
