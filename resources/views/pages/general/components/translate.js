const originalTexts = [];
let translationMap = {};

const CSRF_TOKEN = document
    .querySelector('meta[name="csrf-token"]')
    ?.getAttribute("content");

function toPlainCleanText(input) {
    if (input == null) return "";

    // input should be string here
    let text = String(input);

    return text
        .replace(/\u00A0/g, " ") // non-breaking space
        .replace(/[\r\n]+/g, " ") // new lines -> space
        .replace(/\s+/g, " ") // collapse spaces
        .trim();
}

function collectTextNodesAndTranslate() {
    return new Promise((resolve, reject) => {
        originalTexts.length = 0;
        translationMap = {};

        // You can tune this selector (div/span can be too broad)
        const selector = "h1,h2,h3,p,label,legend,span,font,div";

        $(selector).each(function () {
            const $el = $(this);

            // Skip if it has element children (avoid nested duplication)
            if ($el.children().length > 0) return;

            // Skip empty / whitespace
            const cleaned = toPlainCleanText($el.text());
            if (!cleaned) return;

            // Skip purely numeric / symbols (optional but useful)
            if (/^[\d\s.,:/\-+()]+$/.test(cleaned)) return;

            // Store original text on element for reliable restore
            if (!$el.attr("data-orig")) {
                $el.attr("data-orig", cleaned);
            }

            originalTexts.push({
                element: this,
                text: cleaned,
            });
        });

        if (originalTexts.length === 0) {
            console.warn("No text nodes found");
            resolve();
            return;
        }

        const payload = originalTexts.map((item) => item.text);
        // here you can implement the dictonory and cookies
    });
}

function translateToEnglish() {
    originalTexts.forEach((item) => {
        const translated = translationMap[item.text];
        if (translated) {
            $(item.element).text(translated);
        }
    });

    localStorage.setItem("lang", "en");
}

function restoreMalay() {
    originalTexts.forEach((item) => {
        const $el = $(item.element);
        const orig = $el.attr("data-orig") || item.text;
        $el.text(orig);
    });

    localStorage.setItem("lang", "ms");
}

$(document).ready(function () {
    collectTextNodesAndTranslate()
        .then(() => {
            $(document).on("click", "#btn-en", translateToEnglish);
            $(document).on("click", "#btn-ms", restoreMalay);

            if (localStorage.getItem("lang") === "en") {
                translateToEnglish();
            }
        })
        .catch((err) => {
            console.error("Initialisation failed", err);
        });
});
