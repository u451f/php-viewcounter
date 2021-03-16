// video view count: on clicking a video, we trigger the count
(function($) {
"use strict";
    function count_views(element) {
        var $video = $(element).find('video');
        //console.log($video);
        $video.on("play", function() {
            console.log("Playing event triggered");
            var filesrc = $video.attr('src');
            $.ajax({
                  method: "POST",
                  url: "https://example.org/path_to/viewcount.php",
                  data: { filename: filesrc }
            })
            .done(function(msg) {
                  console.log("View counted." + msg);
            });
        });
    }
    jQuery(function($) {
        $('.entry').each(function(){
            count_views(this);
        });
    });
})(jQuery);
