<script>
    /* ============================================================
   GLOBAL VARIABLES
============================================================ */
    const originalTexts = [];
    let translationMap = {};

    /* ============================================================
       SAFE CSRF TOKEN FETCH
    ============================================================ */
    const CSRF_TOKEN = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute('content');

    if (!CSRF_TOKEN) {
        console.error('CSRF token missing');
    }

    /* ============================================================
       COLLECT + TRANSLATE
    ============================================================ */

    function toPlainCleanText(input) {
        if (input == null) return '';

        // 1) Get a string from anything: DOM element, jQuery element, or string
        let raw = '';

        // jQuery object
        if (window.jQuery && input instanceof jQuery) {
            // if you pass a jQuery element: use its html (or text if you prefer)
            raw = input.html() ?? '';
        }
        // DOM element (Node)
        else if (input && typeof input === 'object' && input.nodeType === 1) {
            // element.innerHTML gives HTML; element.textContent is already plain text
            raw = input.innerHTML ?? '';
        }
        // plain string
        else {
            raw = String(input);
        }

        // 2) Convert HTML -> plain text (NO div creation)
        // DOMParser parses HTML correctly (handles <br>, nested tags, etc.)
        const doc = new DOMParser().parseFromString(raw, 'text/html');
        let text = (doc.body && doc.body.textContent) ? doc.body.textContent : '';

        // 3) Normalise whitespace & remove line breaks
        return text
            .replace(/\u00A0/g, ' ') // non-breaking space -> normal space
            .replace(/[\r\n]+/g, ' ') // remove \r and \n lines
            .replace(/\s+/g, ' ') // collapse multiple spaces/tabs
            .trim(); // remove beginning/end spaces
    }

    function htmlToCleanText(input) {

        if (!input) return '';

        return input
            // Remove HTML tags
            .replace(/<[^>]*>/g, ' ')

            // Convert HTML entities &nbsp;
            .replace(/&nbsp;/gi, ' ')

            // Remove line breaks
            .replace(/[\r\n]+/g, ' ')

            // Collapse multiple spaces
            .replace(/\s+/g, ' ')

            // Trim spaces
            .trim();
    }

    function collectTextNodesAndTranslate() {

        return new Promise((resolve, reject) => {

            originalTexts.length = 0;
            translationMap = {};

            $('h1, h2, h3, p, label, div, font, legend, span').each(function() {

                if ($(this).children().length > 0) return;

                const text = toPlainCleanText($(this).text());

                if (!text) return;

                originalTexts.push({
                    element: this,
                    text: text
                });
            });
            if (originalTexts.length === 0) {
                console.warn('No text nodes found');
                resolve();
                return;
            }

            const payload = originalTexts.map(item => item.text);

            $.ajax({
                type: 'POST',
                url: '/pip/general/translator',
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                dataType: 'json',
                data: {
                    k: payload
                },

                success: function(response) {
                    if (typeof response !== 'object') {
                        console.error('Invalid translation response');
                        reject(response);
                        return;
                    }

                    translationMap = response;
                    resolve(response);
                },

                error: function(xhr) {
                    console.error('AJAX failed:', xhr.status, xhr.responseText);
                    reject(xhr);
                }
            });
        });
    }

    /* ============================================================
       TRANSLATE
    ============================================================ */
    function translateToEnglish() {
        if (!translationMap || Object.keys(translationMap).length === 0) {
            console.warn('translationMap empty');
            return;
        }
        originalTexts.forEach(item => {
            if (translationMap[item.text]) {
                $(item.element).text(translationMap[item.text]);
            }
        });
        localStorage.setItem('lang', 'en');
    }

    /* ============================================================
       RESTORE
    ============================================================ */
    function restoreMalay() {
        originalTexts.forEach(item => {
            $(item.element).text(item.text);
        });
        localStorage.setItem('lang', 'ms');
    }

    /* ============================================================
       INITIALISE
    ============================================================ */
    $(document).ready(function() {
        collectTextNodesAndTranslate()
            .then(() => {
                // Event delegation (safe for dynamic DOM)
                $(document).on('click', '#btn-en', translateToEnglish);
                $(document).on('click', '#btn-ms', restoreMalay);

                if (localStorage.getItem('lang') === 'en') {
                    translateToEnglish();
                }
            })
            .catch(err => {
                console.error('Initialisation failed', err);
            });
    });
</script>
