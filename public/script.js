// import 'https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js';

$(function () {

    // Initate masonry grid
    var $grid = $('.gallery-wrapper').masonry({
        temSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        percentPosition: true,
    });

    // Initate imagesLoaded
    $grid.imagesLoaded().progress( function() {
        $grid.masonry('layout');
    });
    
});

