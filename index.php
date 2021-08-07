<?php
require_once('banner.php');
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

    <link rel="stylesheet" href="style/main.css">
    <script src="scripts/carousel.js" type="text/javascript"></script>
    <title>Home | LDDS</title>
</head>
<body>
    <div class="content">
        <div class="carousel-container">
            <div class="carousel-item">
                <a href="#">
                    <img src="style/images/carousel/JLC.jpg" />
                    <div class="caption-box fade-right">
                        <h1>Junior Leadership Camp</h1>
                        <p>Lorem Ipsum</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#">
                    <img src="style/images/carousel/Odyssey Night.JPG" />
                    <div class="caption-box fade-right">
                        <h1>Junior Leadership Camp</h1>
                        <p>Lorem Ipsum</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#">
                    <img src="style/images/carousel/Orientation Week.JPG" />
                    <div class="caption-box fade-right">
                        <h1>Junior Leadership Camp</h1>
                        <p>Lorem Ipsum</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#">
                    <img src="style/images/carousel/Team Building.png" />
                    <div class="caption-box fade-right">
                        <h1>Junior Leadership Camp</h1>
                        <p>Lorem Ipsum</p>
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
        <div class = "home-comm" id = "home-comm">
            <div class = "comm-desc" id = "comm-desc">
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                </p>
            </div>
            <div class = "comm-disp" id = "comm-disp">
                <img src = "style/images/committee/CZ.jpg">
            </div>
            <div class = "more-comm-info" id = "more-comm-info">
                <a href = "committee/index.php">
                    More
                </a>
            </div>
        </div>
    </div>
    

</body>
</html>