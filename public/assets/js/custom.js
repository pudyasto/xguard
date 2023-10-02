/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */

var html = document.getElementsByTagName("HTML")[0];

$('.light-dark-mode').on('click', function (e) {
    var layoutMode = html.getAttribute("data-color-theme");
    $('.light-dark-mode').html('');
    if (layoutMode == null || layoutMode == 'light') {
        sessionStorage.setItem('data-color-theme', 'dark');
        $('.light-dark-mode').html('<i class="ph-sun"></i>');
        html.setAttribute("data-color-theme", 'dark');
    } else {
        sessionStorage.setItem('data-color-theme', 'light');
        $('.light-dark-mode').html('<i class="ph-moon"></i>');
        html.setAttribute("data-color-theme", 'light');
    }
})


function getLayout() {
    html.setAttribute("data-color-theme", sessionStorage.getItem('data-color-theme'));
    var layoutMode = html.getAttribute("data-color-theme");
    $('.light-dark-mode').html('');
    if (!layoutMode || layoutMode == 'null') {
        sessionStorage.setItem('data-color-theme', 'light');
        $('.light-dark-mode').html('<i class="ph-moon"></i>');
        html.setAttribute("data-color-theme", 'light');
    }

    if (layoutMode == 'dark') {
        $('.light-dark-mode').html('<i class="ph-sun"></i>');
    } else {
        $('.light-dark-mode').html('<i class="ph-moon"></i>');
    }
}

getLayout();