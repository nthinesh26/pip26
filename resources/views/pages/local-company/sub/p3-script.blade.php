<script>
    (function() {
        "use strict";

        function byId(id) {
            return document.getElementById(id);
        }

        function safeTrim(v) {
            return (v || "").toString().trim();
        }

        function isAllEmpty(values) {
            return values.every(function(v) {
                return safeTrim(v) === "";
            });
        }

        function setVisible(el, isVisible) {
            if (!el) return;
            el.classList.toggle("d-none", !isVisible);
        }

        function clearInputs(ids) {
            ids.forEach(function(id) {
                var el = byId(id);
                if (!el) return;
                el.value = "";
            });
        }

        function renderTable(tableId, rows, columns, removePrefix) {
            var table = byId(tableId);
            if (!table) return;

            var tbody = table.querySelector("tbody");
            if (!tbody) return;

            tbody.innerHTML = "";
            rows.forEach(function(row, idx) {
                var tr = document.createElement("tr");

                columns.forEach(function(col) {
                    var td = document.createElement("td");
                    td.textContent = row[col] == null ? "" : String(row[col]);
                    tr.appendChild(td);
                });

                var action = document.createElement("td");
                action.className = "text-end";
                var btn = document.createElement("button");
                btn.type = "button";
                btn.className = "btn btn-link p-0 text-danger";
                btn.textContent = "Buang";
                btn.setAttribute("data-remove", removePrefix + ":" + idx);
                action.appendChild(btn);
                tr.appendChild(action);

                tbody.appendChild(tr);
            });
        }

        function setupSection(cfg) {
            var yes = byId(cfg.yesId);
            var no = byId(cfg.noId);
            var details = byId(cfg.detailsId);

            var addBtn = byId(cfg.addBtnId);
            var clearBtn = byId(cfg.clearBtnId);
            var payloadEl = byId(cfg.payloadId);

            function getRows() {
                try {
                    return JSON.parse(payloadEl.value || "[]");
                } catch (e) {
                    return [];
                }
            }

            function setRows(rows) {
                payloadEl.value = JSON.stringify(rows || []);
                renderTable(cfg.tableId, rows || [], cfg.columns, cfg.removePrefix);
            }

            function setEnabled(visible) {
                setVisible(details, visible);
            }

            function clearAll() {
                clearInputs(cfg.inputIds);
                setRows([]);
            }

            function currentInputObject() {
                var obj = {};
                cfg.columns.forEach(function(col, i) {
                    obj[col] = safeTrim(byId(cfg.inputIds[i]).value);
                });
                return obj;
            }

            function onToggle() {
                var isYes = yes && yes.checked;
                setEnabled(!!isYes);

                if (!isYes) {
                    // When switching to "Tidak", wipe user-entered records to avoid stale submissions
                    clearAll();
                } else {
                    // Ensure table renders from existing payload if any
                    setRows(getRows());
                }
            }

            if (yes) yes.addEventListener("change", onToggle);
            if (no) no.addEventListener("change", onToggle);

            if (addBtn) {
                addBtn.addEventListener("click", function() {
                    // Do not add if section is hidden
                    if (details && details.classList.contains("d-none")) return;

                    var values = cfg.inputIds.map(function(id) {
                        var el = byId(id);
                        return el ? el.value : "";
                    });

                    if (isAllEmpty(values)) return;

                    var row = currentInputObject();
                    var rows = getRows();
                    rows.push(row);
                    setRows(rows);
                });
            }

            if (clearBtn) {
                clearBtn.addEventListener("click", function() {
                    clearInputs(cfg.inputIds);
                });
            }

            // Row remove handler (event delegation)
            var table = byId(cfg.tableId);
            if (table) {
                table.addEventListener("click", function(e) {
                    var target = e.target;
                    if (!target) return;

                    var token = target.getAttribute("data-remove");
                    if (!token) return;

                    var parts = token.split(":");
                    if (parts.length !== 2) return;
                    if (parts[0] !== cfg.removePrefix) return;

                    var idx = parseInt(parts[1], 10);
                    if (Number.isNaN(idx)) return;

                    var rows = getRows();
                    rows.splice(idx, 1);
                    setRows(rows);
                });
            }

            // Initial state
            onToggle();
        }

        document.addEventListener("DOMContentLoaded", function() {
            setupSection({
                yesId: "icp_provider_yes",
                noId: "icp_provider_no",
                detailsId: "icp_provider_details",
                addBtnId: "btn_add_icp_provider",
                clearBtnId: "btn_clear_icp_provider",
                tableId: "icp_provider_table",
                payloadId: "icp_provider_payload",
                inputIds: [
                    "icp_provider_icp_name",
                    "icp_provider_contract",
                    "icp_provider_start_year",
                    "icp_provider_end_year"
                ],
                columns: ["icp_name", "contract", "start_year", "end_year"],
                removePrefix: "provider"
            });

            setupSection({
                yesId: "icp_recipient_yes",
                noId: "icp_recipient_no",
                detailsId: "icp_recipient_details",
                addBtnId: "btn_add_icp_recipient",
                clearBtnId: "btn_clear_icp_recipient",
                tableId: "icp_recipient_table",
                payloadId: "icp_recipient_payload",
                inputIds: [
                    "icp_recipient_icp_name",
                    "icp_recipient_contract",
                    "icp_recipient_start_year",
                    "icp_recipient_end_year",
                    "icp_recipient_provider_name"
                ],
                columns: ["icp_name", "contract", "start_year", "end_year", "provider_name"],
                removePrefix: "recipient"
            });
        });
    })();
</script>
