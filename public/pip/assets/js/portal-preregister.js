(function () {
  // Toggle "Other company type" input
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

  // Basic password strength bar (simple heuristic)
  const pwd = document.querySelector('input[name="account_pwd"]');
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
})();