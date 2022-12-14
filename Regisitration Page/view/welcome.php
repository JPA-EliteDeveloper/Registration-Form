<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../resources/images/favicon.png">
    <link rel="stylesheet" href="../resources/css/style.css">
    <title>Welcome</title>
</head>

<body id="welcome" onload="">
    <audio id="myAudio">
        <source src="../resources/sound/theme.mp3" type="audio/mpeg">
    </audio>
    <video autoplay muted loop playsinline id="myVideo">
        <source src="../resources/video/halo.mp4" type="video/mp4">
    </video>
    <div class="cursor"></div>
    <div class="cursor-border"></div>

    <div class="intro_main">
        <button id="btn_m"><img src="../resources/images/music.png" alt=""></button>
        <div class="v2"></div>
        <div>

            <h1 class="title">Hello! Welcome!</h1>
            <?php
            $fname = $sname  = $email  = $address = $password  = null;
            // PHP VALIDATION
            function validate_data($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["submit"])) {
                    $fname    = validate_data($_POST["fname"]);
                    $sname    = validate_data($_POST["sname"]);
                    $email    = validate_data($_POST["email"]);
                    $address  = validate_data($_POST["address"]);
                    $password = $_POST["password"];

                    echo "<h3 id='typedtext1'>Your_Name: $fname $sname</h3>";
                    echo "<h3 id='typedtext2'>Your_Address:  $address</h3>";
                    echo "<h3 id='typedtext3'>Your_Email-Address: $email</h3>";
                    echo "<h3 id='typedtext4'>Your_password is $password</h3>";
                    echo "<script>
    
                function typeEffect(element, speed) {
                    var text = element.innerHTML;
                    element.innerHTML = '';
                    
                    var i = 0;
                    var timer = setInterval(function() {
                    if (i < text.length) {
                      element.append(text.charAt(i));
                      i++;
                    } else {
                      clearInterval(timer);
                    }
                  }, speed);
                }
                
                
                // application
                var speed = 100;
                var txt1 = document.getElementById('typedtext1');  
                var txt2 = document.getElementById('typedtext2');  
                var txt3 = document.getElementById('typedtext3');  
                var txt4 = document.getElementById('typedtext4');  
                // type affect to header
                typeEffect(txt1, speed);
                typeEffect(txt2, speed);
                typeEffect(txt3, speed);
                typeEffect(txt4, speed);
    
                   </script>";
                }
            }

            ?>

        </div>

    </div>
    <div class="back b1"></div>
    <div class="back b2"></div>
    <div class="back b3"></div>
    <script src="https://api.map.baidu.com/api?v=3.0&amp;ak=fQhFT2lC66DszI30AOkLCKu0720e3Mca"></script>
    <script src="../resources/js/function.js"></script>

    <script>
        var btn_m = document.getElementById("btn_m");
        var cursor = document.querySelector(".cursor");
        var cursorBorder = document.querySelector(".cursor-border");
        let switch_count = 0;
        var getXY = function(event, element) {
            var x = event.clientX;
            var y = event.clientY;
            var rect = element.getBoundingClientRect();
            x -= rect.width / 2;
            y -= rect.height / 2;
            return [x, y];
        };
        btn_m.addEventListener("click", function() {
            if (switch_count == 0) {
                switch_count = 1;
                Theme();
            } else {
                bg_music.pause();
                switch_count = 0;

            }

        });
        document.addEventListener("mouseenter", function(e) {
            cursor.animate([{
                opacity: 0
            }, {
                opacity: 1
            }], {
                duration: 300,
                fill: "forwards"
            });
            cursorBorder.animate([{
                    opacity: 0
                },
                {
                    opacity: 0.8
                }
            ], {
                duration: 300,
                fill: "forwards"
            });
        });
        document.addEventListener("mousemove", function(e) {
            var _a = getXY(e, cursor),
                cursorX = _a[0],
                cursorY = _a[1];
            var _b = getXY(e, cursorBorder),
                cursorBorderX = _b[0],
                cursorBorderY = _b[1];
            var targetName = e.target.tagName;
            if (targetName === "A" || targetName === "LABEL" || targetName === "BUTTON") {
                cursorBorder.classList.add("on-focus");
            } else {
                cursorBorder.classList.remove("on-focus");
            }
            cursor.animate([{
                transform: "translate(".concat(cursorX, "px, ").concat(cursorY, "px)")
            }, {
                transform: "translate(".concat(cursorX, "px, ").concat(cursorY, "px)")
            }], {
                duration: 300,
                fill: "forwards",
                delay: 50
            });
            cursorBorder.animate([{
                transform: "translate(".concat(cursorBorderX, "px, ").concat(cursorBorderY, "px)")
            }, {
                transform: "translate(".concat(cursorBorderX, "px, ").concat(cursorBorderY, "px)")
            }], {
                duration: cursorBorder.classList.contains("on-focus") ? 1500 : 300,
                fill: "forwards",
                delay: 150
            });
        });
        document.addEventListener("mouseleave", function(e) {
            cursor.animate([{
                opacity: 0.8
            }, {
                opacity: 0
            }], {
                duration: 500,
                fill: "forwards"
            });
            cursorBorder.animate([{
                    opacity: 0.8
                },
                {
                    opacity: 0
                }
            ], {
                duration: 500,
                fill: "forwards"
            });
        });

        function Theme() {
            bg_music.volume = 0.5;
            bg_music.play();
        }
    </script>
</body>

</html>