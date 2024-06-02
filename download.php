<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Player</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        #container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        .video-player {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div id="container">
        <?php
        $videoDir = 'dawah/';

        if (isset($_GET['file'])) {
            $file = $_GET['file'];
            $filePath = $videoDir . $file;

            if (file_exists($filePath)) {
                echo "<h2>Playing Video: $file</h2>";
                echo "<div class='video-player'>";
                echo "<video width='800' height='450' controls>";
                echo "<source src='$filePath' type='video/mp4'>";
                echo "Your browser does not support the video tag.";
                echo "</video>";
                echo "</div>";
            } else {
                echo "<h2>Video not found.</h2>";
            }
        } else {
            echo "<h2>No video selected.</h2>";
        }
        ?>
    </div>
</body>
</html>
