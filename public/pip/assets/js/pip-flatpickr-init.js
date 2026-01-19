/**
 * PIP Flatpickr Single Source Initializer
 * - Attach Flatpickr to any input with class `.js-flatpickr-date`
 * - Default format: YYYY-MM-DD (ISO 8601)
 * - Defaults: allowInput=true, disableMobile=true
 * - Optional per-field overrides via data-attributes:
 *    data-min-date="YYYY-MM-DD"
 *    data-max-date="today" | "YYYY-MM-DD"
 *    data-default-date="YYYY-MM-DD"
 *    data-disable-future="true"  (sets maxDate=today)
 *
 * Notes:
 * - Dispatches an 'input' event on change to keep existing validators working.
 */
(function () {
  "use strict";

  function initFlatpickr() {
    if (typeof window.flatpickr === "undefined") return;

    var els = document.querySelectorAll(".js-flatpickr-date");
    if (!els || !els.length) return;

    els.forEach(function (el) {
      // Read data-attributes (optional)
      var minDate = el.getAttribute("data-min-date") || null;
      var maxDate = el.getAttribute("data-max-date") || null;
      var defaultDate = el.getAttribute("data-default-date") || null;
      var disableFuture = (el.getAttribute("data-disable-future") || "").toLowerCase() === "true";

      var config = {
        dateFormat: "Y-m-d",   // ISO 8601 (YYYY-MM-DD)
        allowInput: true,
        disableMobile: true
      };

      if (minDate) config.minDate = minDate;
      if (defaultDate) config.defaultDate = defaultDate;

      if (disableFuture && !maxDate) {
        config.maxDate = "today";
      } else if (maxDate) {
        config.maxDate = maxDate;
      }

      window.flatpickr(el, config);

      // Ensure existing validators listening on input/change still trigger
      el.addEventListener("change", function () {
        el.dispatchEvent(new Event("input", { bubbles: true }));
      });
    });
  }

  // Init on DOM ready
  document.addEventListener("DOMContentLoaded", initFlatpickr);

  // Optional: allow re-init after dynamic DOM updates (SP Page Builder or AJAX)
  // Call: window.PIP_FlatpickrInit && window.PIP_FlatpickrInit();
  window.PIP_FlatpickrInit = initFlatpickr;
})();
