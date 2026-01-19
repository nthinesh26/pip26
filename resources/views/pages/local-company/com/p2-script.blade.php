<script>
    (function() {
        const addBtn = document.getElementById('btn_add_director');
        const clearBtn = document.getElementById('btn_clear_director');
        const tableBody = document.querySelector('#directors_table tbody');
        const payload = document.getElementById('directors_payload');

        const fields = {
            name: document.getElementById('director_name'),
            id: document.getElementById('director_id_passport'),
            nat: document.getElementById('director_nationality'),
            pos: document.getElementById('director_position'),
            pct: document.getElementById('director_shareholding_pct'),
            status: () => document.querySelector('input[name="director_status"]:checked')?.value || ''
        };

        const readPayload = () => {
            try {
                return payload.value ? JSON.parse(payload.value) : [];
            } catch (e) {
                return [];
            }
        };
        const writePayload = (arr) => {
            payload.value = JSON.stringify(arr);
        };

        const clearInputs = () => {
            fields.name.value = '';
            fields.id.value = '';
            fields.nat.value = '';
            fields.pos.value = '';
            fields.pct.value = '';
            document.querySelectorAll('input[name="director_status"]').forEach(r => r.checked = false);
        };

        const render = () => {
            const arr = readPayload();
            tableBody.innerHTML = '';
            arr.forEach((d, i) => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
        <td>${d.name || ''}</td>
        <td>${d.id_passport || ''}</td>
        <td>${d.nationality || ''}</td>
        <td>${d.position || ''}</td>
        <td>${d.shareholding_pct ?? ''}</td>
        <td>${d.status || ''}</td>
        <td class="text-end">
          <button type="button" class="btn btn-sm btn-link text-danger" data-remove="${i}">Buang</button>
        </td>`;
                tableBody.appendChild(tr);
            });
        };

        addBtn?.addEventListener('click', () => {
            const d = {
                name: fields.name.value.trim(),
                id_passport: fields.id.value.trim(),
                nationality: fields.nat.value.trim(),
                position: fields.pos.value.trim(),
                shareholding_pct: fields.pct.value ? Number(fields.pct.value) : null,
                status: fields.status()
            };

            // basic guard: don't add empty rows
            if (!d.name && !d.id_passport && !d.nationality && !d.position && !d.shareholding_pct && !d
                .status) return;

            const arr = readPayload();
            arr.push(d);
            writePayload(arr);
            render();
            clearInputs();
        });

        clearBtn?.addEventListener('click', clearInputs);

        tableBody?.addEventListener('click', (e) => {
            const btn = e.target.closest('button[data-remove]');
            if (!btn) return;
            const idx = Number(btn.getAttribute('data-remove'));
            const arr = readPayload();
            arr.splice(idx, 1);
            writePayload(arr);
            render();
        });

        // initial
        render();
    })();
</script>
