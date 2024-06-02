<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Video List</title>
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
    .video-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }
    .video-item {
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
        cursor: pointer;
    }
    .video-details {
        padding: 10px;
    }
</style>
</head>
<body>
    <div id="container">
        <?php
        $videoDir = 'dawah/';

        // Get video file names from the directory
        $videoFiles = scandir($videoDir);
        
        if (count($videoFiles) > 2) { // Ignore "." and ".." directories
            echo "<div class='video-list'>";
            foreach ($videoFiles as $file) {
                if ($file !== '.' && $file !== '..') {
                    echo "<a href='download.php?file=$file' class='video-item'>";
                    echo "<div class='video-details'>";
                    echo "<h2>Video: $file</h2>";
                    echo "</div>";
                    echo "</a>";
                }
            }
            echo "</div>";
        } else {
            echo "<h2>No videos available.</h2>";
        }
        ?>
    </div>
</body>
</html>
