<?php include('../_includes/setup.php'); ?><!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, viewport-fit=cover">
    <title><?php echo $languages[$_SESSION['country']]['title']; ?></title>
    <meta name="description" content="<?php echo $languages[$_SESSION['country']]['description']; ?>">
    <meta name="author" content="Cyberpunk">
    <link rel="stylesheet" href="/css/main.css">
    <script src="/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mobile-detect@1.4.4/mobile-detect.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script>
        window.addEventListener("load", function() {
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#000000",
                        "text": "#ffffff"
                    },
                    "button": {
                        "background": "transparent",
                        "text": "#ffffff",
                        "border": "#ffffff"
                    }
                },
                "content": {
                    "dismiss": "OK",
                    "message": "Our website uses cookies to ensure you get the best experience.",
                    "href": "https://regulations.cdprojektred.com/en/cookie_policy/"
                }
            })
        });
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-33315505-48"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-33315505-48');
    </script>
</head>

<body class="bg-black">
    <div class="bg-yellow bg-cover bg-center" style="background-image: url(images/bg.jpg)">
        <main class="text-center">
            <div class="content relative flex">
                <div class="w-full self-center">
                    <header class="flex justify-center items-center mt-2 mb-10">
                        <div class="logo-cyberpunk-wrapper mx-1b"><img src="/images/cyberpunk2077@2x.png" alt="cyberpunk2077"></div>
                    </header>
                    <div id="view-countdown-clock">
                        <ul class="flex justify-between relative px-1">
                            <li class="tab-countdown">
                                <h4><?php echo $languages[$_SESSION['country']]['hours']; ?></h4>
                                <span class="count-hours">00</span>
                            </li>
                            <li class="tab-countdown">
                                <h4><?php echo $languages[$_SESSION['country']]['minutes']; ?></h4>
                                <span class="count-mins">00</span>
                            </li>
                            <li class="tab-countdown">
                                <h4><?php echo $languages[$_SESSION['country']]['seconds']; ?></h4>
                                <span class="count-seconds">00</span>
                            </li>
                        </ul>
                        <div id="progress-bar" class="w-full mt-4 sm:mt-8">
                            <h4 class="text-left mb-1"><?php echo $languages[$_SESSION['country']]['loading']; ?></h4>
                            <div class="border-t-2"></div>
                            <div id="progress" class="bg-black" style="width: 0%"></div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /content -->
            <footer class="footer">
                <div class="inner">
                    <div>
                        <small><?php echo $languages[$_SESSION['country']]['copyright1']; ?> <div class="copy"><?php echo $languages[$_SESSION['country']]['copyright2']; ?></div></small>
                    </div>
            </footer>
        </main>
        </div>
        <script>
            //Check for mobile and hide warning message
            var md = new MobileDetect(window.navigator.userAgent);
            if (md.mobile()) {
                document.getElementById("desktop-warning").style.display = "none";
            }

            function totalSeconds(time){
                var parts = time.split(':');
                return parts[0] * 3600 + parts[1] * 60 + parts[2];
            }

            function getTimeRemaining(endtime) {
            const total = (Date.parse(endtime) - Date.parse(new Date()))/1000;
            const seconds = Math.floor(total % 60);
            const minutes = Math.floor((total / 60) % 60);
            const hours = Math.floor((total / (60 * 60)));
            const days = Math.floor(total / (60 * 60));
            return {
              total,
              days,
              hours,
              minutes,
              seconds
            };
            }

            function initializeClock(starttime,endtime) {

              var et = Date.parse(endtime);
              var st = Date.parse(starttime);

            function updateClock() {
              const t = getTimeRemaining(endtime);
              var current = Date.parse(new Date());
              var elapsed = current - st;
              var completed = (elapsed / (et - st)) * 100;
              $('#progress').css('width',completed+'%');
              $('.count-hours').html(('0' + t.hours).slice(-2));
              $('.count-mins').html(('0' + t.minutes).slice(-2));
              $('.count-seconds').html(('0' + t.seconds).slice(-2));
              if (t.total <= 0) {
                clearInterval(timeinterval);
              }
            }

            updateClock();
            const timeinterval = setInterval(updateClock, 1000);
            }

            const launch = "October 31 2020 23:00:00 GMT";
            const deadline = "November 02 2020 14:00:00 GMT";
            initializeClock(launch,deadline);
            </script>

</body>

</html>
