(function () {
  "use strict";

  document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form.pip-form");
    if (!form) return;

    // Password strength bar (exists on Pg1)
    const pwdBar = document.getElementById("pwd-barstr");
    const pwdBarText = document.getElementById("pwd-barstr-text");

    const q = (sel, root = document) => root.querySelector(sel);
    const qa = (sel, root = document) => Array.from(root.querySelectorAll(sel));
    const norm = (v) => String(v ?? "").trim();

    const touched = new WeakSet();
    let hasSubmitted = false;

    // =====================================================
    // DATE NORMALISATION (ISO 8601 – LARAVEL SAFE)
    // =====================================================
    function isISODate(v) {
      return /^\d{4}-\d{2}-\d{2}$/.test(String(v || "").trim());
    }

    // Accepts DD/MM/YYYY or DD-MM-YYYY, returns YYYY-MM-DD (or "" if invalid)
    function dmyToISO(v) {
      const m = String(v || "").trim().match(/^(\d{2})[\/-](\d{2})[\/-](\d{4})$/);
      if (!m) return "";

      const dd = Number(m[1]);
      const mm = Number(m[2]);
      const yyyy = Number(m[3]);

      if (yyyy < 1900 || yyyy > 2100) return "";
      if (mm < 1 || mm > 12) return "";
      if (dd < 1 || dd > 31) return "";

      // Calendar-accurate validation
      const dt = new Date(Date.UTC(yyyy, mm - 1, dd));
      const valid =
        dt.getUTCFullYear() === yyyy &&
        (dt.getUTCMonth() + 1) === mm &&
        dt.getUTCDate() === dd;

      if (!valid) return "";

      return `${yyyy}-${String(mm).padStart(2, "0")}-${String(dd).padStart(2, "0")}`;
    }

    function normalizeAllDateFields() {
      qa('input[type="date"], input[data-date-format]', form).forEach((el) => {
        if (!el || el.disabled) return;

        const v = norm(el.value);
        if (!v) return;
        if (isISODate(v)) return;

        const iso = dmyToISO(v);
        if (iso) el.value = iso;
      });
    }

    // =====================================================
    // YEAR FIELD HELPERS (for icp_provider_start_year / end_year)
    // =====================================================
    function isYearField(el) {
      if (!el) return false;
      if (el.getAttribute("data-year") === "true") return true;
      const id = (el.id || "").toLowerCase();
      const name = (el.name || "").toLowerCase();
      return id.includes("_year") || name.includes("_year");
    }

    // sanitize while typing: digits only, max 4 chars
    function sanitizeYearInput(el) {
      if (!el) return;
      const raw = String(el.value || "");
      const digitsOnly = raw.replace(/[^\d]/g, "").slice(0, 4);
      if (raw !== digitsOnly) el.value = digitsOnly;
    }

    function validateYearField(el) {
      if (!el || el.disabled) return true;

      const label = getFieldLabel(el);
      const v = norm(el.value);

      // optional year fields: empty is OK
      if (!el.required && v === "") {
        clearNeutral(el);
        return true;
      }

      // must be exactly 4 digits if not empty
      if (!/^\d{4}$/.test(v)) {
        paintInvalid(el, t("invalid_year_format", { label }) || `${label}: masukkan 4 digit tahun`);
        return false;
      }

      const minAttr = el.getAttribute("data-min") || el.getAttribute("min") || "1900";
      const maxAttr = el.getAttribute("data-max") || el.getAttribute("max") || "9999";
      const min = Number(minAttr);
      const max = Number(maxAttr);
      const n = Number(v);

      if (Number.isFinite(min) && n < min) {
        paintInvalid(el, t("invalid_year_min", { label, min }) || `${label}: minimum ${min}`);
        return false;
      }
      if (Number.isFinite(max) && n > max) {
        paintInvalid(el, t("invalid_year_max", { label, max }) || `${label}: maksimum ${max}`);
        return false;
      }

      paintValid(el);
      return true;
    }

    // =========================
    // Language + Dictionary
    // =========================
    function getCookie(name) {
      const m = document.cookie.match(new RegExp("(^| )" + name + "=([^;]+)"));
      return m ? decodeURIComponent(m[2]) : "";
    }

    function getLang() {
      const active = q(".pip-lang a.active[data-lang]");
      if (active) {
        const v = (active.getAttribute("data-lang") || "").toLowerCase();
        return v.startsWith("en") ? "en" : "ms";
      }
      const c = (getCookie("pip_lang") || getCookie("lang") || getCookie("locale") || "").toLowerCase();
      if (c.startsWith("en")) return "en";
      if (c.startsWith("ms") || c.startsWith("bm")) return "ms";
      const htmlLang = (document.documentElement.getAttribute("lang") || "").toLowerCase();
      return htmlLang.startsWith("en") ? "en" : "ms";
    }

    function dict() {
      return (
        window.PIP_I18N_DICTIONARY &&
        window.PIP_I18N_DICTIONARY.common &&
        window.PIP_I18N_DICTIONARY.common.pip_validation
      ) || {};
    }

    function fmt(str, params) {
      let out = String(str || "");
      if (params && typeof params === "object") {
        Object.keys(params).forEach((k) => {
          out = out.replace(new RegExp("\\{" + k + "\\}", "g"), String(params[k]));
        });
      }
      return out;
    }

    function t(key, params) {
      const pack = dict();
      const node = pack[key];
      if (!node) return "";
      const raw = node[getLang()] || node.ms || node.en || "";
      return fmt(raw, params);
    }

    // =========================
    // Summary banner
    // =========================
    function getOrCreateSummary() {
      let summary = q("#pipErrorSummary", form);
      if (!summary) {
        summary = document.createElement("div");
        summary.id = "pipErrorSummary";
        summary.className = "alert alert-danger d-none";
        summary.setAttribute("role", "alert");
        summary.setAttribute("aria-live", "polite");
        summary.innerHTML = `
          <strong id="pipErrorSummaryTitle"></strong>
          <div class="mt-1" id="pipErrorSummaryText"></div>
        `;
        form.prepend(summary);
      }
      return summary;
    }

    function showSummary(count) {
      const summary = getOrCreateSummary();
      summary.querySelector("#pipErrorSummaryTitle").textContent =
        t("summary_title") || "Please review the form.";
      summary.querySelector("#pipErrorSummaryText").textContent =
        count === 1
          ? (t("summary_count_1") || "There is 1 error that must be corrected.")
          : (t("summary_count_n", { n: count }) || `There are ${count} errors that must be corrected.`);
      summary.classList.remove("d-none");
      summary.scrollIntoView({ behavior: "smooth", block: "start" });
    }

    function hideSummary() {
      const summary = q("#pipErrorSummary", form);
      if (summary) summary.classList.add("d-none");
    }

    // =========================
    // Labels + feedback
    // =========================
    function getFieldLabel(el) {
      if (!el) return "Field";

      const id = el.getAttribute("id");
      if (id) {
        const lbl = q(`label[for="${CSS.escape(id)}"]`, form);
        if (lbl && norm(lbl.textContent)) return norm(lbl.textContent);
      }

      const wrap =
        el.closest(".col-12, .col-md-6, .col-md-4, .mb-3, fieldset, .pip-fieldset, .row, .card-body") ||
        el.parentElement;

      if (wrap) {
        const lbl = wrap.querySelector("label, legend");
        if (lbl && norm(lbl.textContent)) return norm(lbl.textContent);
      }

      return el.getAttribute("placeholder") || el.getAttribute("name") || "Field";
    }

    // ✅ checkbox feedback placement (prevents "duplicate label" look)
    function ensureFeedbackEl(el) {
      if (!el) return null;
      const type = (el.getAttribute("type") || "").toLowerCase();
      if (type === "radio") return null;

      const key = (el.getAttribute("id") || el.getAttribute("name") || "field").replace(/[^a-zA-Z0-9_-]/g, "_");
      const feedbackId = `fb_${key}`;

      let fb = q(`#${CSS.escape(feedbackId)}`, form);
      if (!fb) {
        fb = document.createElement("div");
        fb.id = feedbackId;
        fb.className = "invalid-feedback";
        fb.style.display = "block";

        if (type === "checkbox") {
          const formCheck = el.closest(".form-check");
          if (formCheck) {
            const lbl =
              (el.id && formCheck.querySelector(`label[for="${CSS.escape(el.id)}"]`)) ||
              formCheck.querySelector("label");
            if (lbl) lbl.insertAdjacentElement("afterend", fb);
            else formCheck.appendChild(fb);
          } else {
            el.insertAdjacentElement("afterend", fb);
          }
        } else {
          el.insertAdjacentElement("afterend", fb);
        }
      }

      const describedBy = (el.getAttribute("aria-describedby") || "").split(/\s+/).filter(Boolean);
      if (!describedBy.includes(feedbackId)) {
        describedBy.push(feedbackId);
        el.setAttribute("aria-describedby", describedBy.join(" "));
      }

      return fb;
    }

    function ensureGroupFeedback(container, groupKey) {
      if (!container) return null;
      const feedbackId = `fb_group_${String(groupKey || "group").replace(/[^a-zA-Z0-9_-]/g, "_")}`;

      let fb = container.querySelector(`#${CSS.escape(feedbackId)}`);
      if (!fb) {
        fb = document.createElement("div");
        fb.id = feedbackId;
        fb.className = "invalid-feedback";
        fb.style.display = "block";

        const legend = container.querySelector("legend");
        if (legend) legend.insertAdjacentElement("afterend", fb);
        else container.appendChild(fb);
      }
      return fb;
    }

    function shouldShow(el) {
      return hasSubmitted || touched.has(el);
    }

    function paintInvalid(el, message) {
      if (!el) return;
      el.setCustomValidity(message || "Invalid");
      if (!shouldShow(el)) return;

      el.classList.add("is-invalid");
      el.classList.remove("is-valid");

      const fb = ensureFeedbackEl(el);
      if (fb) fb.textContent = message || "";
    }

    function paintValid(el) {
      if (!el) return;
      el.setCustomValidity("");
      if (!shouldShow(el)) return;

      el.classList.remove("is-invalid");
      el.classList.add("is-valid");

      const fb = ensureFeedbackEl(el);
      if (fb) fb.textContent = "";
    }

    function clearNeutral(el) {
      if (!el) return;
      el.setCustomValidity("");
      el.classList.remove("is-invalid", "is-valid");
      const fb = ensureFeedbackEl(el);
      if (fb) fb.textContent = "";
    }

    // =========================
    // Validators
    // =========================
    function isValidEmail(v) {
      const value = norm(v);
      return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/i.test(value);
    }

    function isValidMYMobile(v) {
      const value = String(v || "").replace(/[\s-]/g, "");
      return /^01\d{8,9}$/.test(value) || /^(?:\+?60)1\d{8,9}$/.test(value);
    }

    function isValidPhoneGeneric(v) {
      const digits = String(v || "").replace(/[^\d]/g, "");
      return digits.length >= 7 && digits.length <= 15;
    }

    function isValidWebsite(v) {
      const value = norm(v);
      if (!value) return true;

      if (/^[a-zA-Z][a-zA-Z0-9+.-]*:\/\//.test(value)) {
        try { new URL(value); return true; } catch { return false; }
      }

      const domainLike =
        /^(?=.{1,253}$)(?!-)[a-zA-Z0-9-]{1,63}(?:\.[a-zA-Z0-9-]{1,63})+$/;
      return domainLike.test(value.replace(/^www\./i, ""));
    }

    function passwordRules(v) {
      const s = String(v || "");
      return {
        len: s.length >= 8,
        upper: /[A-Z]/.test(s),
        lower: /[a-z]/.test(s),
        num: /[0-9]/.test(s),
        sym: /[^A-Za-z0-9]/.test(s),
      };
    }

    function updatePwdMeter(v) {
      if (!pwdBar || !pwdBarText) return;

      const r = passwordRules(v);

      let passed = 0;
      if (r.len) passed = [r.upper, r.lower, r.num, r.sym].filter(Boolean).length + 1;

      pwdBar.style.width = Math.round((passed / 5) * 100) + "%";

      let strength = t("pwd_weak") || "Weak";
      if (passed >= 4) strength = t("pwd_strong") || "Strong";
      else if (passed === 3) strength = t("pwd_medium") || "Medium";

      pwdBarText.textContent = (t("pwd_strength_prefix") || "Password strength: ") + strength;
    }

    function isOtherValue(v) {
      const x = norm(v).toLowerCase();
      return x === "other" || x === "lain" || x === "lain-lain" || x === "others";
    }

    function isKategoriOther(v) {
      const x = String(v || "").toLowerCase();
      return x.includes("lain") || x.includes("other");
    }

    function validatePdfUpload(el) {
      if (!el || el.disabled) return true;

      const label = getFieldLabel(el);
      const files = el.files;

      if (el.required && (!files || files.length === 0)) {
        paintInvalid(el, t("required_fill", { label }) || `${label}: required`);
        return false;
      }
      if (!files || files.length === 0) {
        clearNeutral(el);
        return true;
      }

      const f = files[0];
      const isPdf = (f.type === "application/pdf") || /\.pdf$/i.test(f.name || "");
      if (!isPdf) {
        paintInvalid(el, t("invalid_file_pdf", { label }) || `${label}: PDF only`);
        return false;
      }

      const maxBytes = 10 * 1024 * 1024;
      if (f.size > maxBytes) {
        paintInvalid(el, t("invalid_file_size", { label, max: "10MB" }) || `${label}: max 10MB`);
        return false;
      }

      paintValid(el);
      return true;
    }

    function validatePasswordField(pwd) {
      if (!pwd || pwd.disabled) return true;
      const v = String(pwd.value || "");
      updatePwdMeter(v);

      const label = getFieldLabel(pwd);

      if (pwd.required && norm(v) === "") {
        paintInvalid(pwd, t("required_fill", { label }) || `${label}: required`);
        return false;
      }
      if (!pwd.required && norm(v) === "") {
        clearNeutral(pwd);
        return true;
      }

      const r = passwordRules(v);
      const pass = r.len && r.upper && r.lower && r.num && r.sym;

      if (!pass) {
        paintInvalid(pwd, t("pwd_policy") || "Invalid password.");
        return false;
      }

      paintValid(pwd);
      return true;
    }

    // =========================
    // Base field validation
    // =========================
    function validateControl(el) {
      if (!el || el.disabled) return true;

      const tag = el.tagName.toLowerCase();
      const type = (el.getAttribute("type") || "").toLowerCase();
      const label = getFieldLabel(el);
      const value = norm(el.value);

      if (type === "radio") return true;

      // ✅ Year fields: sanitize + validate strictly
      if (isYearField(el)) {
        sanitizeYearInput(el);
        return validateYearField(el);
      }

      // Password
      if (type === "password" || el.name === "password" || el.name === "account_pwd") {
        return validatePasswordField(el);
      }

      // File upload
      if (type === "file") {
        return validatePdfUpload(el);
      }

      // Required
      if (el.required) {
        if (type === "checkbox") {
          const ok = el.checked === true;

          if (!ok) {
            if (el.id === "consent_pdpa") {
              paintInvalid(el, t("required_pdpa") || "Sila tandakan persetujuan PDPA.");
            } else {
              paintInvalid(el, t("required_check", { label }) || `${label}: required`);
            }
          } else {
            paintValid(el);
          }

          return ok;
        }

        if (tag === "select") {
          const ok = value !== "";
          if (!ok) paintInvalid(el, t("required_select", { label }) || `${label}: required`);
          else paintValid(el);
          return ok;
        }

        if (value === "") {
          paintInvalid(el, t("required_fill", { label }) || `${label}: required`);
          return false;
        }
      } else {
        if (value === "") {
          clearNeutral(el);
          return true;
        }
      }

      // Email
      if (type === "email") {
        const ok = isValidEmail(value);
        if (!ok) paintInvalid(el, t("invalid_email", { label }) || `${label}: invalid email`);
        else paintValid(el);
        return ok;
      }

      // URL (allow no scheme)
      if (type === "url") {
        const ok = isValidWebsite(value);
        if (!ok) paintInvalid(el, t("invalid_website", { label }) || `${label}: invalid website`);
        else paintValid(el);
        return ok;
      }

      // Date
      if (type === "date" && !el.checkValidity()) {
        paintInvalid(el, t("invalid_date", { label }) || `${label}: invalid date`);
        return false;
      }

      if (el.hasAttribute("minlength") && !el.checkValidity()) {
        const min = el.getAttribute("minlength");
        paintInvalid(el, t("minlength", { label, min }) || `${label}: minimum ${min} characters`);
        return false;
      }

      const hasFormatConstraint =
        el.hasAttribute("pattern") ||
        el.hasAttribute("maxlength") ||
        ["number"].includes(type);

      if (hasFormatConstraint && !el.checkValidity()) {
        paintInvalid(el, t("format_check", { label }) || `${label}: invalid`);
        return false;
      }

      paintValid(el);
      return true;
    }

    // =========================
    // Required radio groups
    // =========================
    function validateRequiredRadioGroups() {
      const radios = qa('input[type="radio"]', form);
      const requiredNames = new Set(radios.filter(r => r.required).map(r => r.name).filter(Boolean));
      let okAll = true;

      requiredNames.forEach((name) => {
        const group = radios.filter(r => r.name === name && !r.disabled);
        if (group.length === 0) return;

        const anyChecked = group.some(r => r.checked);
        const first = group[0];

        const container =
          first.closest("fieldset") ||
          first.closest(".pip-fieldset") ||
          first.closest(".col-12") ||
          form;

        const label =
          container.querySelector("legend") ? norm(container.querySelector("legend").textContent) : getFieldLabel(first);

        const fb = ensureGroupFeedback(container, name);

        if (!anyChecked) {
          okAll = false;
          first.setCustomValidity("Required");
          if (hasSubmitted) {
            group.forEach(r => r.classList.add("is-invalid"));
            group.forEach(r => r.classList.remove("is-valid"));
            if (fb) fb.textContent = t("required_radio", { label }) || `${label}: required`;
          }
        } else {
          first.setCustomValidity("");
          if (hasSubmitted) {
            group.forEach(r => r.classList.remove("is-invalid"));
            group.forEach(r => r.classList.add("is-valid"));
            if (fb) fb.textContent = "";
          }
        }
      });

      return okAll;
    }

    // =========================
    // Required checkbox group
    // =========================
    function validateCheckboxGroupByName(name, container, labelText) {
      const boxes = qa(`input[type="checkbox"][name="${CSS.escape(name)}"]`, form).filter(b => !b.disabled);
      if (!boxes.length) return true;

      const anyChecked = boxes.some(b => b.checked);
      const fb = ensureGroupFeedback(container, name);

      if (!anyChecked) {
        boxes[0].setCustomValidity("Required");
        if (hasSubmitted) {
          boxes.forEach(b => b.classList.add("is-invalid"));
          boxes.forEach(b => b.classList.remove("is-valid"));
          if (fb) fb.textContent = t("required_checkbox_group", { label: labelText }) || `${labelText}: required`;
        }
        return false;
      }

      boxes[0].setCustomValidity("");
      if (hasSubmitted) {
        boxes.forEach(b => b.classList.remove("is-invalid"));
        boxes.forEach(b => b.classList.add("is-valid"));
        if (fb) fb.textContent = "";
      }
      return true;
    }

    // =========================
    // Conditional rules
    // =========================
    function setEnabled(el, enabled) {
      if (!el) return;
      el.disabled = !enabled;
      if (!enabled) el.value = "";
    }

    function validateConditionals() {
      let ok = true;

      const companyTypeRadios = qa('input[type="radio"][name="company_type"]', form);
      const companyTypeOther = q('[name="company_type_other"]', form);
      if (companyTypeRadios.length && companyTypeOther) {
        const selected = companyTypeRadios.find(r => r.checked)?.value || "";
        const isReq = isOtherValue(selected);
        setEnabled(companyTypeOther, isReq);
        companyTypeOther.required = isReq;

        if (isReq && norm(companyTypeOther.value) === "") {
          paintInvalid(companyTypeOther, t("other_required", { label: getFieldLabel(companyTypeOther) }) || "Required");
          ok = false;
        } else if (isReq) {
          paintValid(companyTypeOther);
        } else {
          clearNeutral(companyTypeOther);
        }
      }

      const kepOthers = q("#kepakaran_others", form);
      const kepWrap = q("#kepakaranOthersWrap", form);
      const kepText = q('[name="kepakaran_lain"]', form);
      if (kepOthers && kepWrap && kepText) {
        const show = kepOthers.checked === true;
        kepWrap.style.display = show ? "" : "none";
        kepText.required = show;

        if (show && norm(kepText.value) === "") {
          paintInvalid(kepText, t("other_required", { label: getFieldLabel(kepText) }) || "Required");
          ok = false;
        } else if (show) {
          paintValid(kepText);
        } else {
          clearNeutral(kepText);
        }
      }

      const nyatakan = q('[name="nyatakan_kepakaran"]', form);
      if (nyatakan) {
        nyatakan.required = true;
        if (norm(nyatakan.value) === "") {
          paintInvalid(nyatakan, t("required_fill", { label: getFieldLabel(nyatakan) }) || "Required");
          ok = false;
        } else {
          paintValid(nyatakan);
        }
      }

      const kategori = q('[name="kategori"]', form);
      const kategoriLainGroup = q('#lainLainGroup', form);
      const kategoriLain = q('[name="kategori_lain"]', form);
      if (kategori && kategoriLainGroup && kategoriLain) {
        const isOther = isKategoriOther(kategori.value);
        kategoriLainGroup.style.display = isOther ? "" : "none";
        kategoriLain.required = isOther;

        if (!isOther) {
          kategoriLain.value = "";
          clearNeutral(kategoriLain);
        } else {
          if (norm(kategoriLain.value) === "") {
            paintInvalid(kategoriLain, t("required_fill", { label: getFieldLabel(kategoriLain) }) || "Required");
            ok = false;
          } else {
            paintValid(kategoriLain);
          }
        }
      }

      const icpProviderYes = q('#icp_provider_yes', form);
      const icpProviderPayload = q('#icp_provider_payload', form);
      if (icpProviderYes && icpProviderPayload) {
        const isYes = icpProviderYes.checked === true;
        const details = q("#icp_provider_details", form);
        if (details) details.classList.toggle("d-none", !isYes);

        // when not yes, clear local inputs + validation state
        if (!isYes) {
          ["icp_provider_icp_name", "icp_provider_contract", "icp_provider_start_year", "icp_provider_end_year"].forEach((id) => {
            const el = q(`#${CSS.escape(id)}`, form);
            if (el) { el.value = ""; clearNeutral(el); }
          });
        }

        if (isYes) {
          let arr = [];
          try { arr = JSON.parse(icpProviderPayload.value || "[]"); } catch { arr = []; }
          if (!Array.isArray(arr) || arr.length === 0) {
            const container = q('#icp_provider_details', form) || form;
            const fb = ensureGroupFeedback(container, "icp_provider_payload");
            if (hasSubmitted && fb) fb.textContent = t("required_icp_provider_payload") || "Please add at least one ICP Provider record.";
            ok = false;
          }
        }
      }

      const icpRecipientYes = q('#icp_recipient_yes', form);
      const icpRecipientPayload = q('#icp_recipient_payload', form);
      if (icpRecipientYes && icpRecipientPayload) {
        const isYes = icpRecipientYes.checked === true;
        if (isYes) {
          let arr = [];
          try { arr = JSON.parse(icpRecipientPayload.value || "[]"); } catch { arr = []; }
          if (!Array.isArray(arr) || arr.length === 0) {
            const container = q('#icp_recipient_details', form) || form;
            const fb = ensureGroupFeedback(container, "icp_recipient_payload");
            if (hasSubmitted && fb) fb.textContent = t("required_icp_recipient_payload") || "Please add at least one ICP Recipient record.";
            ok = false;
          }
        }
      }

      const declarationName = q('[name="declaration_name"]', form);
      if (declarationName) {
        declarationName.required = true;
        if (norm(declarationName.value) === "") {
          paintInvalid(declarationName, t("required_fill", { label: getFieldLabel(declarationName) }) || "Required");
          ok = false;
        } else {
          paintValid(declarationName);
        }
      }

      return ok;
    }

    // =========================
    // Shared named fields
    // =========================
    function validateSharedNamedFields() {
      let ok = true;

      ["account_phone"].forEach((nm) => {
        const el = q(`[name="${nm}"]`, form);
        if (!el) return;
        const v = norm(el.value);
        if ((el.required || v) && v && !isValidMYMobile(v)) {
          paintInvalid(el, t("invalid_phone_my_mobile", { label: getFieldLabel(el) }) || "Invalid mobile number");
          ok = false;
        }
      });

      ["company_phonenumber"].forEach((nm) => {
        const el = q(`[name="${nm}"]`, form);
        if (!el) return;
        const v = norm(el.value);
        if ((el.required || v) && v && !isValidPhoneGeneric(v)) {
          paintInvalid(el, t("invalid_phone_generic", { label: getFieldLabel(el) }) || "Invalid phone number");
          ok = false;
        }
      });

      ["company_website"].forEach((nm) => {
        const el = q(`[name="${nm}"]`, form);
        if (!el) return;
        const v = norm(el.value);
        if (v && !isValidWebsite(v)) {
          paintInvalid(el, t("invalid_website", { label: getFieldLabel(el) }) || "Invalid website");
          ok = false;
        }
      });

      return ok;
    }

    // =========================
    // Validate all (NORMALISE FIRST)
    // =========================
    function validateAll({ showSummaryBanner }) {
      normalizeAllDateFields();

      let ok = true;
      let count = 0;

      qa("input, select, textarea", form).forEach((el) => {
        const type = (el.getAttribute("type") || "").toLowerCase();
        if (type === "radio") return;
        const pass = validateControl(el);
        if (!pass) { ok = false; count += 1; }
      });

      if (!validateSharedNamedFields()) { ok = false; count += 1; }
      if (!validateConditionals()) { ok = false; count += 1; }
      if (!validateRequiredRadioGroups()) { ok = false; count += 1; }

      const kepFieldset =
        q("#kepakaran_1", form)?.closest("fieldset") ||
        q('input[name="kepakaran_bidang"]', form)?.closest("fieldset");
      if (kepFieldset) {
        const labelText = "Nama Bidang Kepakaran";
        const pass = validateCheckboxGroupByName("kepakaran_bidang", kepFieldset, labelText);
        if (!pass) { ok = false; count += 1; }
      }

      if (!ok && showSummaryBanner) showSummary(count);
      if (ok) hideSummary();

      return ok;
    }

    function focusFirstError() {
      const first = q(".is-invalid", form) || q(":invalid", form);
      if (first && typeof first.focus === "function") {
        first.focus({ preventScroll: true });
        first.scrollIntoView({ behavior: "smooth", block: "center" });
      }
    }

    // =========================
    // Events
    // =========================

    // ✅ CHANGE: do NOT mark touched on focus anymore (prevents “error immediately on click”)
    // Previously you had: el.addEventListener("focus", () => touched.add(el)); :contentReference[oaicite:1]{index=1}
    qa("input, select, textarea", form).forEach((el) => {
      // live sanitize for year fields while typing
      if (isYearField(el)) {
        el.addEventListener("input", () => {
          sanitizeYearInput(el);
          // don't validate unless it's already touched/submitted
          if (hasSubmitted || touched.has(el)) validateAll({ showSummaryBanner: false });
        });
      } else {
        el.addEventListener("input", () => validateAll({ showSummaryBanner: false }));
      }

      // mark touched on change + blur only
      el.addEventListener("change", () => { touched.add(el); validateAll({ showSummaryBanner: false }); });
      el.addEventListener("blur", () => { touched.add(el); validateAll({ showSummaryBanner: false }); });
    });

    // Optional: normalize dates on blur/change
    qa('input[type="date"], input[data-date-format]', form).forEach((el) => {
      el.addEventListener("blur", () => {
        normalizeAllDateFields();
        validateAll({ showSummaryBanner: false });
      });
      el.addEventListener("change", () => {
        normalizeAllDateFields();
        validateAll({ showSummaryBanner: false });
      });
    });

    qa('input[name="company_type"]', form).forEach((r) =>
      r.addEventListener("change", () => validateAll({ showSummaryBanner: false }))
    );

    const kepOthersToggle = q("#kepakaran_others", form);
    if (kepOthersToggle) kepOthersToggle.addEventListener("change", () => validateAll({ showSummaryBanner: false }));

    const kategoriToggle = q('[name="kategori"]', form);
    if (kategoriToggle) kategoriToggle.addEventListener("change", () => validateAll({ showSummaryBanner: false }));

    // Toggle ICP provider details show/hide on radio change
    qa('input[name="icp_provider_status"]', form).forEach((r) =>
      r.addEventListener("change", () => validateAll({ showSummaryBanner: false }))
    );

    qa(".pip-lang a[data-lang]").forEach((a) => {
      a.addEventListener("click", () => {
        setTimeout(() => validateAll({ showSummaryBanner: hasSubmitted }), 50);
      });
    });

    // ✅ Reset ICP provider input fields after successful "Add"
    (function wireIcpProviderAddReset() {
      const btn = q("#btn_add_icp_provider", form);
      const payload = q("#icp_provider_payload", form);
      if (!btn || !payload) return;

      function safeParse(v) {
        try {
          const arr = JSON.parse(v || "[]");
          return Array.isArray(arr) ? arr : [];
        } catch {
          return [];
        }
      }

      btn.addEventListener("click", function () {
        const before = safeParse(payload.value).length;

        // let your existing "add" logic run first (wherever it is)
        setTimeout(() => {
          const after = safeParse(payload.value).length;

          // only reset if a record was actually added
          if (after > before) {
            const ids = [
              "icp_provider_icp_name",
              "icp_provider_contract",
              "icp_provider_start_year",
              "icp_provider_end_year"
            ];

            ids.forEach((id) => {
              const el = q(`#${CSS.escape(id)}`, form);
              if (!el) return;
              el.value = "";
              clearNeutral(el);
            });

            const first = q("#icp_provider_icp_name", form);
            if (first) first.focus();
          }
        }, 0);
      });
    })();

    // ✅ SINGLE submit handler
    form.addEventListener("submit", function (e) {
      hasSubmitted = true;

      normalizeAllDateFields();

      const ok = validateAll({ showSummaryBanner: true });
      if (!ok) {
        e.preventDefault();
        e.stopPropagation();
        focusFirstError();
      }
    });

    // Do NOT validate on load
    hideSummary();
    updatePwdMeter("");
    validateConditionals();
  });
})();
