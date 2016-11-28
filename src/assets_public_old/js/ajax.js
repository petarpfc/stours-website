

$(document).on({
    ajaxStart: function() { $('.ajax-modal').fadeIn("5000");},
    ajaxStop: function() { $('.ajax-modal').fadeOut("5000"); }
});