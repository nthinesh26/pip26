(function () {
  "use strict";

  function truthy(v) {
    v = String(v ?? "").toLowerCase().trim();
    return v === "1" || v === "true" || v === "yes" || v === "y";
  }

  function clamp(n, min, max) {
    n = Number(n);
    if (!Number.isFinite(n)) return min;
    return Math.min(max, Math.max(min, n));
  }

  // (A) Generic conditional show/hide (backend sets data-show="true/false")
  document.querySelectorAll(".pip-box[data-show]").forEach(function (el) {
    var v = String(el.getAttribute("data-show") || "").toLowerCase().trim();
    if (v === "false" || v === "0" || v === "no") el.style.display = "none";
  });

  // (B) Status Profil percentage (entity-specific total sections)
  // Backend should supply:
  //  - data-basic-complete: 0/1
  //  - data-sections-total: number
  //  - data-sections-complete: number
  // Optional:
  //  - aria-valuenow / {{PROFILE_PERCENT_FROM_DB}} (will be overwritten by computed pct when totals exist)
  var statusBox = document.getElementById("pipBoxProfileStatus");
  if (statusBox) {
    var basicComplete = truthy(statusBox.getAttribute("data-basic-complete"));
    var total = Number(statusBox.getAttribute("data-sections-total"));
    var done = Number(statusBox.getAttribute("data-sections-complete"));

    // Show status only after Maklumat Asas is completed.
    if (!basicComplete) {
      statusBox.style.display = "none";
    } else {
      // If totals are provided, compute.
      if (Number.isFinite(total) && total > 0 && Number.isFinite(done)) {
        done = clamp(done, 0, total);
        var pct = Math.round((done / total) * 100);

        var bar = statusBox.querySelector(".pip-status-progress-bar");
        var fill = statusBox.querySelector(".pip-status-progress-fill");
        var pillPct = document.getElementById("pipProfilePct");

        if (bar) bar.setAttribute("aria-valuenow", String(pct));
        if (fill) fill.style.width = pct + "%";
        if (pillPct) pillPct.textContent = String(pct);

        // If fully complete, hide the box (you can change this if you want to show 100% complete state).
        if (pct >= 100) {
          statusBox.style.display = "none";
        }
      } else {
        // Fallback: sync fill with aria-valuenow if present
        var bar2 = statusBox.querySelector(".pip-status-progress-bar[aria-valuenow]");
        if (bar2) {
          var fill2 = bar2.querySelector(".pip-status-progress-fill");
          var now2 = parseInt(bar2.getAttribute("aria-valuenow"), 10);
          var pct2 = Number.isFinite(now2) ? clamp(now2, 0, 100) : 0;
          if (fill2) fill2.style.width = pct2 + "%";
          bar2.setAttribute("aria-valuenow", String(pct2));
        }
      }
    }
  }

  // (C) Action button behaviour
  // For Syarikat Tempatan, UI is always unlocked (data-lock-mode="never").
  // Backend MUST still enforce permissions on the destination route.
  var actionBtn = document.getElementById("pipProfileBtn");
  if (actionBtn) {
    var lockMode = String(actionBtn.getAttribute("data-lock-mode") || "").toLowerCase().trim();
    var access = String(actionBtn.getAttribute("data-access") || "limited").toLowerCase().trim();
    var href = actionBtn.getAttribute("data-href");

    var unlocked = (lockMode === "never") || (access === "full");

    if (unlocked) {
      actionBtn.disabled = false;
      actionBtn.removeAttribute("aria-disabled");
      actionBtn.addEventListener("click", function () {
        if (href) window.location.href = href;
      });

      // Optional: hide lock icon if your CSS assumes a lock = locked
      // (kept as-is for now)
    } else {
      actionBtn.disabled = true;
      actionBtn.setAttribute("aria-disabled", "true");
    }
  }
})();
