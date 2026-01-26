<script defer="" src="/pip/assets/js/pip-profile.js"></script>
<script>
    // DEV ONLY: Toggle TERHAD / RAKAN IP preview + ICP role
    (function() {
        const wrap = document.querySelector(".pip-dev-toggle");
        if (!wrap) return;

        wrap.addEventListener("click", function(e) {
            const statusBtn = e.target.closest("button[data-state]");
            if (statusBtn) {
                document.body.setAttribute("data-org-status", statusBtn.dataset.state);
                return;
            }

            const icpBtn = e.target.closest("button[data-icp]");
            if (icpBtn) {
                document.body.setAttribute("data-icp-role", icpBtn.dataset.icp);
            }
        });
    })();
</script>
<script>
    // ICP Role visibility (Recipient/Provider/Both/None)
    (function() {
        const icpBox = document.getElementById("pipBoxICP");
        if (!icpBox) return;

        function isTruthy(v) {
            return String(v || "").trim() === "1" || String(v || "").toLowerCase() === "true";
        }

        function syncICP() {
            const isRakanIP = document.body.getAttribute("data-org-status") === "rakanip";
            if (!isRakanIP) {
                icpBox.style.display = "none";
                return;
            }

            const isRecipient = isTruthy(icpBox.dataset.icpRecipient);
            const isProvider = isTruthy(icpBox.dataset.icpProvider);

            const recipientEl = icpBox.querySelector('[data-icp-role="recipient"]');
            const providerEl = icpBox.querySelector('[data-icp-role="provider"]');

            if (recipientEl) recipientEl.style.display = isRecipient ? "" : "none";
            if (providerEl) providerEl.style.display = isProvider ? "" : "none";

            // If none selected, hide whole card
            icpBox.style.display = (isRecipient || isProvider) ? "" : "none";
        }

        // Run once on load
        syncICP();

        // If you use DEV toggle, re-run on state change
        const devToggle = document.querySelector(".pip-dev-toggle");
        if (devToggle) {
            devToggle.addEventListener("click", function() {
                // small delay so body attribute updates first
                setTimeout(syncICP, 0);
            });
        }
    })();
</script>
<div aria-hidden="true" aria-labelledby="pipAvatarModalTitle" aria-modal="true" class="pip-modal" id="pipAvatarModal"
    role="dialog">
    <div class="pip-modal__backdrop" data-pip-close="true"></div>
    <div class="pip-modal__dialog" role="document">
        <div class="pip-modal__header">
            <h3 class="pip-modal__title" data-i18n="modal_title" id="pipAvatarModalTitle">Kemaskini Gambar Profil</h3>
            <button aria-label="Tutup" class="pip-modal__close" data-pip-close="true" type="button">×</button>
        </div>
        <form action="/pip/post/logo" class="pip-modal__body" enctype="multipart/form-data" method="post"
            novalidate="">
            @csrf
            <p class="pip-muted mb-2" data-i18n="modal_desc">Muat naik imej logo/profil baharu. Format dibenarkan: JPG,
                PNG. Saiz maksimum: 1MB.</p>
            <div class="pip-avatar-uploader">
                <div class="pip-avatar-uploader__preview">
                    @if($flag)
                    <img alt="Pratonton gambar profil" id="pipAvatarPreview" @if ($flag) src="{{ auth()->user()->profile()->logo == 'not-submitted' ? '/pip/assets/img/userProfileBotak.png' : '/' . auth()->user()->profile()->logo }}"
                            @else
                                src="/{{ $tag->profile()->logo }}" @endif />
                    @else
                    <img alt="Pratonton gambar profil" id="pipAvatarPreview" @if ($flag) src="{{ $tag->profile()->logo == 'not-submitted' ? '/pip/assets/img/userProfileBotak.png' : '/' . $tag->profile()->logo }}"
                            @else
                                src="/{{ $tag->profile()->logo }}" @endif />
                    @endif
                </div>
                <div class="pip-avatar-uploader__controls">
                    <label class="form-label" for="profile_image_upload">Pilih fail</label>

                    <input accept="image/png,image/jpeg" class="form-control" id="profile_image_upload"
                        name="profile_image_upload" type="file" />
                    <div class="form-text" data-i18n="modal_hint">Pastikan imej jelas dan berlatar belakang sesuai.</div>
                    <div class="pip-error mt-2" id="pipAvatarUploadError" style="display:none;"></div>
                </div>
            </div>
            <div class="pip-modal__footer">
                <button class="btn btn-outline-secondary" data-pip-close="true" type="button">Batal</button>
                <button class="btn btn-primary" type="submit" data-i18n="modal_upload">Muat Naik</button>
            </div>
        </form>
    </div>
</div>
<script id="pipAvatarInlineScript">
    (function() {
        "use strict";
        var openBtn = document.getElementById("pipAvatarEditBtn");
        var modal = document.getElementById("pipAvatarModal");
        if (!openBtn || !modal) return;

        var fileInput = document.getElementById("profile_image_upload");
        var previewImg = document.getElementById("pipAvatarPreview");
        var errBox = document.getElementById("pipAvatarUploadError");
        var MAX_MB = 5;

        function showError(msg) {
            if (!errBox) return;
            errBox.textContent = msg;
            errBox.style.display = msg ? "block" : "none";
        }

        function openModal() {
            modal.setAttribute("aria-hidden", "false");
            document.documentElement.style.overflow = "hidden";
            showError("");
            // reset input value (so choosing same file triggers change)
            if (fileInput) fileInput.value = "";
        }

        function closeModal() {
            modal.setAttribute("aria-hidden", "true");
            document.documentElement.style.overflow = "";
            showError("");
        }

        openBtn.addEventListener("click", openModal);

        modal.addEventListener("click", function(e) {
            var t = e.target;
            if (t && t.getAttribute("data-pip-close") === "true") closeModal();
        });

        document.addEventListener("keydown", function(e) {
            if (e.key === "Escape" && modal.getAttribute("aria-hidden") === "false") closeModal();
        });

        if (fileInput) {
            fileInput.addEventListener("change", function() {
                showError("");
                var file = fileInput.files && fileInput.files[0];
                if (!file) return;

                var isOkType = /image\/(jpeg|png)/i.test(file.type);
                if (!isOkType) {
                    showError("Format fail tidak dibenarkan. Sila pilih JPG atau PNG.");
                    fileInput.value = "";
                    return;
                }

                var maxBytes = MAX_MB * 1024 * 1024;
                if (file.size > maxBytes) {
                    showError("Saiz fail melebihi had " + MAX_MB + "MB.");
                    fileInput.value = "";
                    return;
                }

                // Preview
                var reader = new FileReader();
                reader.onload = function(evt) {
                    if (previewImg && evt && evt.target) previewImg.src = evt.target.result;
                };
                reader.readAsDataURL(file);
            });
        }
    })();
</script>
