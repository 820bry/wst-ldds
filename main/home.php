<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-orange.min.css" />
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="./main/carousel.js" type="text/javascript"></script>
    <title>Home | LDDS</title>
</head>
<body>
    <div class="banner">
        <img src="./main/ldds-logo.png" alt="logo" />
        <a href="./home">Home</a>
        <a href="./events">Events</a>
        <a href="./committee">Committee</a>
        <a href="https://youtu.be/dQw4w9WgXcQ">About Us</a>
    </div>

    <div class="content">
        <div class="carousel-container">
            <div class="carousel-item">
                <a href="#">
                    <img src="./images/carousel/JLC.jpg" />
                    <div class="caption-box fade-right">
                        <h1>Junior Leadership Camp</h1>
                        <p>Lorem Ipsum</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#">
                    <img src="./images/carousel/Odyssey Night.JPG" />
                    <div class="caption-box fade-right">
                        <h1>Junior Leadership Camp</h1>
                        <p>Lorem Ipsum</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#">
                    <img src="./images/carousel/Orientation Week.JPG" />
                    <div class="caption-box fade-right">
                        <h1>Junior Leadership Camp</h1>
                        <p>Lorem Ipsum</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="#">
                    <img src="./images/carousel/Team Building.png" />
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
    </div>

</body>

</html>