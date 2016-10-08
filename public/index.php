<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Potgify - Play of the game generator</title>
        <meta name="description" content="Easily create your own overwatch styled play of the game!">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <style>
            @font-face {
                font-family: overwatch;
                src: url(BigNoodleTooOblique.ttf);
            }
            #imagePreview {
                width: 100%;
                min-height: 60%;
                border: 1px #ccc solid;
            }
            .input-group {
                width: 100%;
            }
            h2 {
                margin-left: 15px;
            }
            #imagePreview h1 {
                position: absolute;
                left: 50px;
                bottom: 25%;
                color: #fff;
            }
        </style>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-fork-ribbon-css/0.2.0/gh-fork-ribbon.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    </head>
    <body class="">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <h2 style="margin-top: 10px;">Potgify - Play of the game generator!</h2>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div id="imagePreview">
                        <img style="width: 100%" src="http://i.imgur.com/NtsDnBD.jpg">
                        <h1 style="font-family: overwatch;">
                            <span id="top">TOP</span><br />
                            <span id="middle" style="padding-left: 20px; color: #fff843;">MIDDLE</span><br />
                            <span id="bottom" style="padding-left: 40px;">BOTTOM</span>
                        </h1>
                    </div>
                </div>
                <div class="col-md-4">
                    <form enctype="multipart/form-data" method="post" role="form" action="process.php">
                        <div class="input-group" style="margin-bottom: 10px;">
                            <input required onchange="changeImage(this.value);" type="text" class="form-control" placeholder="http://i.imgur.com/NtsDnBD.jpg" name="imageURL">
                        </div>
                        <div class="input-group">
                            <input required onkeyup="changeText('#top', this.value);" type="text" class="form-control" placeholder="TOP" name="top">
                        </div>
                        <br />
                        <div class="input-group">
                            <input required onkeyup="changeText('#middle', this.value);" type="text" class="form-control" placeholder="MIDDLE" name="middle">
                        </div>
                        <br />
                        <div class="input-group">
                            <input required onkeyup="changeText('#bottom', this.value);" type="text" class="form-control" placeholder="BOTTOM" name="bottom">
                        </div>
                        <br />
                        <div class="input-group">
                            <input required type="file" name="video">
                        </div> (Max 500MB; Only tested with MP4)
                        <br /><br />
                        <input type="submit" class="btn btn-success btn-small" value="Potgify!" />
                    </form>
                    <br />
                    <p>
                        <b>What the hell is this?</b><br />
                        A simple generator that accepts an image and video. The given text will be animated over the image,
                        whilst the Overwatch play of the game music is played in the background. After the intro, your uploaded video is played.
                        Make sure the resolution of the image matches your video for the best outcome.
                    </p>
                    <p>
                        <b>Want the real deal?</b><br />
                        <a href="https://www.reddit.com/r/Overwatch/comments/4m7ine/since_yall_suck_at_animating_the_overwatch/">Check out this adobe after effects post on reddit.</a>
                    </p>
                    <p>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="8JJWJCDCJV6XC">
                            <input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
                        </form>
                    </p>
                    <p>Made by <a href="https://www.swordbeta.com">swordbeta</a>.</p>
                </div>
            </div>
        </div>
		<a target="_blank" class="github-fork-ribbon right-bottom fixed" href="https://github.com/swordbeta/potgify" title="Fork me on GitHub">Fork me on GitHub</a>
		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-24187741-1','auto');ga('send','pageview');
        </script>
        <script>
            function changeImage(src) {
                $('#imagePreview img').attr('src', src);
            }
            function changeText(id, text) {
                $(id).html(text);
            }
        </script>
    </body>
</html>
