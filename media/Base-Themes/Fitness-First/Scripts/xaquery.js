if (!('Sitecore' in window && Sitecore.WebEditSettings?.editing))
{
    window.$xa = function () {
        var xaJquery, xaJqueryUI;
        
        // I removed the jQuery
    
        xaJquery = jQuery;
    
        xaJqueryUI = function (jQuery) {
            // jQuery UI has been removed and should not be included
            // Only the editing theme has jQuery UI
        }(xaJquery);
    
        xaJquery.shouldInitialize = function () {
            return !!window.Sitecore.WebEditSettings.editing;
        };
    
        return xaJquery;
    }();
}
