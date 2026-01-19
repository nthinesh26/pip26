(function () {
  // If Joomla/SP Page Builder injects content late, defer already helps,
  // but this makes it bulletproof across pages.
  function init() {
    const countryEl = document.getElementById("country");
    const stateSelectWrap = document.getElementById("stateSelectWrap");
    const stateSelect = document.getElementById("stateSelect");
    const stateTextWrap = document.getElementById("stateTextWrap");
    const stateText = document.getElementById("stateText");

    // If this page doesn't have these fields, do nothing (safe reuse)
    if (!countryEl || !stateSelectWrap || !stateSelect || !stateTextWrap || !stateText) return;

    const statesByCountry = {
      Malaysia: [
        "Johor", "Kedah", "Kelantan", "Kuala Lumpur", "Labuan", "Melaka", "Negeri Sembilan",
        "Pahang", "Penang", "Perak", "Perlis", "Putrajaya", "Sabah", "Sarawak", "Selangor", "Terengganu"
      ],
      // Add more later if needed
    };

    function resetSelect(el, placeholder) {
      el.innerHTML = `<option value="" disabled selected hidden>${placeholder}</option>`;
      el.value = "";
    }

    function showSelectFor(country) {
      resetSelect(stateSelect, "Pilih Negeri");
      (statesByCountry[country] || []).forEach((s) => {
        const opt = document.createElement("option");
        opt.value = s;
        opt.textContent = s;
        stateSelect.appendChild(opt);
      });

      stateSelectWrap.classList.remove("d-none");
      stateSelect.disabled = false;
      stateSelect.required = true;

      stateTextWrap.classList.add("d-none");
      stateText.disabled = true;
      stateText.required = false;
      stateText.value = "";
    }

    function showTextField() {
      stateSelectWrap.classList.add("d-none");
      stateSelect.disabled = true;
      stateSelect.required = false;
      resetSelect(stateSelect, "Pilih Negeri");

      stateTextWrap.classList.remove("d-none");
      stateText.disabled = false;
      stateText.required = true;
    }

    function hideBoth() {
      stateSelectWrap.classList.add("d-none");
      stateSelect.disabled = true;
      stateSelect.required = false;
      resetSelect(stateSelect, "Pilih Negeri");

      stateTextWrap.classList.add("d-none");
      stateText.disabled = true;
      stateText.required = false;
      stateText.value = "";
    }

    function onCountryChange() {
      const c = (countryEl.value || "").trim();

      if (!c) return hideBoth();
      if (c === "Malaysia") return showSelectFor("Malaysia");
      return showTextField();
    }

    countryEl.addEventListener("change", onCountryChange);
    onCountryChange(); // init
  }

  // Run now if DOM is ready, otherwise wait
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }
})();
