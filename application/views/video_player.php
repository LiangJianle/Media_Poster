<!DOCTYPE html>
<html>
<head>
    <title>Video.js | HTML5 Video Player</title>

    <!-- Chang URLs to wherever Video.js files will be hosted -->
    <link href="<?php echo base_url('resource/stylesheets/video-js.css'); ?>" rel="stylesheet" type="text/css">
    <!-- video.js must be in the <head> for older IEs to work. -->
    <script src="<?php echo base_url('resource/javascripts/video.js'); ?>"></script>
    <script type="text/javascript">
        // Must come after the video.js library

        // Add VideoJS to all video tags on the page when the DOM is ready
        VideoJS.setupAllWhenReady();//可选。不写此函数默认为显示播放控制条，鼠标移开隐藏

        /* ============= OR ============ */

        // Setup and store a reference to the player(s).
        // Must happen after the DOM is loaded
        // You can use any library's DOM Ready method instead of VideoJS.DOMReady

        /*
         VideoJS.DOMReady(function(){

         // Using the video's ID or element
         var myPlayer = VideoJS.setup("example_video_1");

         // OR using an array of video elements/IDs
         // Note: It returns an array of players
         var myManyPlayers = VideoJS.setup(["example_video_1", "example_video_2", video3Element]);

         // OR all videos on the page
         var myManyPlayers = VideoJS.setup("All");

         // After you have references to your players you can...(example)
         myPlayer.play(); // Starts playing the video for this player.
         });
         */

        /* ========= SETTING OPTIONS ========= */

        // Set options when setting up the videos. The defaults are shown here.

        /*
         VideoJS.setupAllWhenReady({
         controlsBelow: false, // Display control bar below video instead of in front of
         controlsHiding: true, // Hide controls when mouse is not over the video
         defaultVolume: 0.85, // Will be overridden by user's last volume if available
         flashVersion: 9, // Required flash version for fallback
         linksHiding: true // Hide download links when video is supported
         });
         */

        // Or as the second option of VideoJS.setup

        /*
         VideoJS.DOMReady(function(){
         var myPlayer = VideoJS.setup("example_video_1", {
         // Same options
         });
         });
         */
    </script>

    <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
    <script>
        videojs.options.flash.swf = "<?php echo base_url('umeditor/php/upload/20140511/video-js.swf'); ?>";
    </script>


</head>
<body>

<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="432" height="240"
       poster="http://video-js.zencoder.com/oceans-clip.png"
       data-setup='{"example_option":true}'>


    <source src="<?php echo base_url($full_path); ?>" type='video/mp4' />

    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
</video>

</body>
</html>
