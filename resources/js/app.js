require('./bootstrap');
// Make 'project_hosting' accessible inside the HTML pages
import project_hosting from "./project_hosting";
window.project_hosting = project_hosting;
// Run the hello() function
project_hosting.hello();

$('[required]').each(function () {
    $(this).closest('.form-group')
        .find('label')
        .append('<sup class="text-danger mx-1">*</sup>');
});

$('nav i.fas').addClass('fa-fw mr-1');

$('body').tooltip({
    selector: '[data-toggle="tooltip"]',
    html : true,
}).on('click', '[data-toggle="tooltip"]', function () {
    // hide tooltip when you click on it
    $(this).tooltip('hide');
});