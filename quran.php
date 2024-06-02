<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        audio {
            width: 100%;
            max-width: 400px;
            margin: 20px 0;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            padding: 8px 16px;
            margin: 0 5px;
            text-decoration: none;
            background-color: #ddd;
            color: #333;
            border-radius: 5px;
        }

        .pagination a:hover {
            background-color: #555;
            color: #fff;
        }
    </style>
</head>
<body>

    <h1>Music Player</h1>

    <?php
        $musicFolder = "quran"; // Your music folder path
        $audioFiles = glob("$musicFolder/*.mp3"); // Adjust the file extension if needed

        $songsPerPage = 15;
        $totalSongs = count($audioFiles);
        $totalPages = ceil($totalSongs / $songsPerPage);

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $start = ($currentPage - 1) * $songsPerPage;
        $end = $start + $songsPerPage;

        $displayedFiles = array_slice($audioFiles, $start, $songsPerPage);

        if (!empty($displayedFiles)) {
            foreach ($displayedFiles as $audioFile) {
                $filename = basename($audioFile);
                echo "<audio controls preload='metadata'>
                        <source src='$audioFile' type='audio/mp3'>
                        Your browser does not support the audio element.
                      </audio>
                      <p>$filename</p>";
            }

            // Pagination
            echo "<div class='pagination'>";
            for ($i = 1; $i <= $totalPages; $i++) {
                $activeClass = ($i == $currentPage) ? 'active' : '';
                echo "<a href='?page=$i' class='$activeClass'>$i</a>";
            }
            echo "</div>";
        } else {
            echo "<p>No audio files found in the 'music' folder.</p>";
        }
    ?>

</body>
</html>
