function getAtt(el) {
   return el.getAttribute("data-target");
}

// close all chapters and sections per default
$(document).ready(function () {
    $( '#sidebar p' ).each(function() {
        $(this).next("ul.collapse").toggle();
    });
    $( '#sidebar ul.collapse > li.sct' ).each(function() {
        $(this).siblings('li.sct-sub').hide();
    });
    // listen on p chapters
    $( '#sidebar p' ).each(function() {
        $chapter = $(this);
        // listen on first link
        $chapter.children('a').on( "click", function(e) {
            $('#index').css( "margin-left", "5em" );
            $('label.sidebar-toggle').css( "margin-left", "10em" );
            e.stopPropagation();
        });
        // listen on link collabsible caret
        $chapter.children('a[data-toggle="collapse"]').on( "click", function(e) {
            $(this).children('i').toggleClass('fa-caret-down fa-caret-up');
            $target = getAtt(this); //this is the window object, and it has no getAttribute method, so we pass this as an argument
            $($target).toggle();
            e.stopPropagation();
        });
    });
    // listen on li sections
    $( '#sidebar ul.collapse > li.sct' ).each(function() {
        $section = $(this);
        $section.children('a[data-toggle="collapse"]').on( "click", function(e) {
            $(this).children('i').toggleClass('fa-caret-down fa-caret-up');
            $(this).parent().nextUntil( 'li.sct', 'li.sct-sub' ).toggle();
            e.stopPropagation();
        });
    });
    // unset helpers when removing sidebar by click in main id workspace
    $('#workspace').click(function() {
        $('#index').css( "margin-left", "initial" ).focus();
        $('.sidebar-toggle').css( "margin-left", "initial" ).blur();
    });
    // or on input id sidebar-checkbox for label class sidebar-toogle
    $('#sidebar-checkbox').click(function() {
        $('.sidebar-toggle').css( "margin-left", "initial" ).blur();
        $('#index').css( "margin-left", "initial" ).focus();
    });
});
