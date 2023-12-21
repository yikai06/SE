jQuery(function ($) {
    if (typeof $xa !== "undefined") {
        /**
         * jQuery ajax prefilter to avoid loading scripts again when form is wrapped in SXA
         */
        var loadOnceScriptsFilter = function (options, originalOptions, jqXHR) {
            var form = $("form");
            var isFormLoaded = form.length && typeof form.attr("data-sc-fxb") !== "undefined" && typeof $.fxbConditions !== "undefined";
            if (isFormLoaded && options.url.indexOf("sitecore%20modules/Web/ExperienceForms/scripts/") !== -1) {
                jqXHR.abort();
            }
        };

        /**
         * jQuery ajax success event handler to initialize tracking when form is wrapped in SXA
         */
        var initFormTracking = function (event, xhr, settings) {
            if (settings.dataTypes.indexOf("html") >= 0 && typeof $.fxbFormTracker !== "undefined") {
                $("form[data-sc-fxb]").track_fxbForms();
            }
        };

        $xa.ajaxPrefilter("script", loadOnceScriptsFilter);
        $xa(document)
            .off("ajaxSuccess", initFormTracking)
            .ajaxSuccess(initFormTracking);
    }
});
