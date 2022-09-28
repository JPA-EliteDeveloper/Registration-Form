<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../resources/images/favicon.png">
    <link rel="stylesheet" href="../resources/css/style.css">
    

    <title>Registration Form</title>
</head>

<body style="height: 100%;" onload="">
    <audio id="beep">
        <source src="../resources/sound/beep.mp3" type="audio/mpeg">
    </audio>
    <audio id="login">
        <source src="../resources/sound/login.mp3" type="audio/mpeg">
    </audio>
    <div class="cursor"></div>
    <div class="cursor-border"></div>
    <div class="mask"></div>
    <div class="main">
        <div class="banner-canva">
            <img class="banner" src="../resources/images/halo.jpg" alt="">
        </div>
        <div class="registration">
            <h1>Registration Form</h1>
            <form action="welcome.php" method="post">
                <div class="form-item"><label>First Name</label>
                    <div class="input-wrapper">
                        <input type="text" id="fname" name="fname" autocomplete="off" autocorrect="off"
                            autocapitalize="off" spellcheck="false" data-lpignore="true" />
                        <div class="popover">Input this field!</div>

                    </div>
                </div>
                <div class="form-item"><label>Last Name</label>
                    <div class="input-wrapper"><input type="text" id="sname" name="sname" autocomplete="off"
                            autocorrect="off" autocapitalize="off" spellcheck="false" data-lpignore="true" />
                        <div class="popover">Input this field!</div>
                    </div>

                </div>
                <div class="form-item"><label>Email</label>
                    <div class="input-wrapper"><input type="text" id="email" name="email" autocomplete="off"
                            autocorrect="off" autocapitalize="off" spellcheck="false" data-lpignore="true" />
                        <div class="popover">Input this field!</div>
                    </div>
                </div>
                <div class="form-item"><label>Address</label>
                    <div class="input-wrapper"><input type="text" id="address" name="address" autocomplete="off"
                            autocorrect="off" autocapitalize="off" spellcheck="false" data-lpignore="true" />
                        <div class="popover">Input this field!</div>
                    </div>
                </div>
                <div class="form-item"><label>Password</label>
                    <div class="input-wrapper"><input type="password" id="password" name="password" autocomplete="off"
                            autocorrect="off" autocapitalize="off" spellcheck="false" data-lpignore="true" />
                        <div class="popover">Input this field!</div><button type="button" id="eyeball">
                            <div class="eye"></div>
                        </button>
                        <div id="beam"></div>
                    </div>
                </div>
                <div class="form-item"><label>Confirm Password</label>
                    <div class="input-wrapper"><input type="text" id="cpassword" name="cpassword" autocomplete="off"
                            autocorrect="off" autocapitalize="off" spellcheck="false" data-lpignore="true" />
                        <div class="popover">Input this field!</div>
                    </div>
                </div>
                <button id="submit" name="submit">Sign up</button>
            </form>

        </div>
    </div>

</body>
<script src="https://api.map.baidu.com/api?v=3.0&amp;ak=fQhFT2lC66DszI30AOkLCKu0720e3Mca"></script>
<script src="../resources/js/function.js"></script>

<script>
   
    var cursor = document.querySelector(".cursor");
    var cursorBorder = document.querySelector(".cursor-border");
    var getXY = function (event, element) {
        var x = event.clientX;
        var y = event.clientY;
        var rect = element.getBoundingClientRect();
        x -= rect.width / 2;
        y -= rect.height / 2;
        return [x, y];
    };
    document.addEventListener("mouseenter", function (e) {
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
    document.addEventListener("mousemove", function (e) {
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
    document.addEventListener("mouseleave", function (e) {
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
</script>

</html>