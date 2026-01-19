/* =========================================================
   Maklumat Asas Profile JS
   File: assets/js/asasUserProfile.js
   Purpose: UX only (button lock + hint text).
   Backend must enforce permissions server-side.
   ========================================================= */

(function () {
  const btn = document.getElementById("pipProfileBtn");
  const hint = document.getElementById("pipProfileHint");

  function applyAccessState() {
    if (!btn) return;

    const access = (btn.dataset.access || "limited").toLowerCase();
    const isFull = access === "full";

    btn.disabled = !isFull;
    btn.setAttribute("aria-disabled", String(!isFull));

    if (hint) {
      hint.textContent = isFull
        ? "Akses: Penuh (butang aktif)"
        : "Akses: Terhad (Sila Lengkapkan Profil)";
    }
  }

  if (btn) {
    btn.addEventListener("click", function () {
      if (btn.getAttribute("aria-disabled") === "true") return;
      const href = btn.dataset.href;
      if (href) window.location.href = href;
    });
  }

  applyAccessState();
})();
