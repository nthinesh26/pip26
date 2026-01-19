<script>
    (function() {
        const radios = document.querySelectorAll('input[name="jenis_agensi"]');
        const atmExtra = document.getElementById('atm-extra');
        const lainExtra = document.getElementById('lain-extra');
        const atmBranch = document.getElementById('atm_branch');
        const atmPasukan = document.getElementById('atm_pasukan_nyatakan');
        const lainNyatakan = document.getElementById('lain_nyatakan');

        function updateVisibility() {
            const selected = document.querySelector('input[name="jenis_agensi"]:checked');
            const isATM = selected && selected.value === 'ATM';
            const isLain = selected && selected.value === 'Lain-lain';

            // Toggle ATM block
            atmExtra.style.display = isATM ? '' : 'none';
            // Toggle Lain-lain block
            lainExtra.style.display = isLain ? '' : 'none';

            // Clear values when hidden (optional)
            if (!isATM) {
                if (atmBranch) atmBranch.selectedIndex = 0;
                if (atmPasukan) atmPasukan.value = '';
            }
            if (!isLain && lainNyatakan) {
                lainNyatakan.value = '';
            }
        }

        // Bind events
        radios.forEach(r => r.addEventListener('change', updateVisibility));
        // Initialize on load (handles pre-filled forms)
        updateVisibility();
    })();
</script>
