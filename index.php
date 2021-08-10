<?php
require_once('banner.php');
require_once("./config/session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-orange.min.css" />
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="/wst-ldds/style/main.css">
    <link rel="stylesheet" href="/wst-ldds/style/carousel.css">
    <script src="/wst-ldds/scripts/home.js" type="text/javascript" defer></script>
    <script src="/wst-ldds/scripts/scrollbar.js" type="text/javascript"></script>
    <script src="/wst-ldds/scripts/carousel.js" type="text/javascript"></script>
    <title>Home | LDDS</title>
</head>
<body class="hidden-scrollbar">
    <?php
        if (!isset($_SESSION['permission_level'])) {
            //assume anonymous without login
        } else {
            var_dump($_SESSION['permission_level']);
        }
    ?>
    <div class="content">
        <div class="carousel-container">
            <div class="carousel-item" style="display: none;">
                <a href="#">
                    <img src="/wst-ldds/style/images/carousel/JLC.jpg" />
                    <div class="caption-box fade-right">
                        <h1>Junior Leadership Camp</h1>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                </a>
            </div>
            <div class="carousel-item" style="display: none;">
                <a href="#">
                    <img src="/wst-ldds/style/images/carousel/Odyssey Night.JPG" />
                    <div class="caption-box fade-right">
                        <h1>Orientation Odyssey Night</h1>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                </a>
            </div>
            <div class="carousel-item" style="display: none;">
                <a href="#">
                    <img src="/wst-ldds/style/images/carousel/Orientation Week.JPG" />
                    <div class="caption-box fade-right">
                        <h1>Orientation Week</h1>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                </a>
            </div>
            <div class="carousel-item" style="display: none;"> 
                <a href="#">
                    <img src="/wst-ldds/style/images/carousel/Team Building.png" />
                    <div class="caption-box fade-right">
                        <h1>Team Building</h1>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                </a>
            </div>

            <div class="prev" onclick="advance(-1)">&#10094;</div>
            <div class="next" onclick="advance(1)">&#10095;</div>
            <div class="page-indicator">
                <script type="text/javascript">
                    generateIndicator();
                </script>
            </div>
        </div>

        <div class = "home-comm" id = "home-comm" style="display: none;">
            <h1>Committee</h1>
            <div class = "comm-desc" id = "comm-desc">
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                </p>
            </div>
            <div class = "comm-disp" id = "comm-disp">
                <img src = "/wst-ldds/style/images/committee/CZ.jpg">
            </div>
            <div class = "more-comm-info" id = "more-comm-info">
                <a href = "/wst-ldds/committee/index.php">
                    More
                </a>
            </div>
        </div>
        
        <div class = "home-event" id = "home-event" style="display: none;">
            <h1>Events</h1>
            <div class = "event-desc" id = "event-desc">
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                </p>
            </div>
            <div class = "event-disp" id = "event-disp">
                <img src = "/wst-ldds/style/images/carousel/JLC.jpg">
            </div>
            <div class = "more-event-info" id = "more-event-info">
                <a href = "/wst-ldds/events/index.php">
                    More
                </a>
            </div>
        </div>
    </div>
    

</body>
</html>