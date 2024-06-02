<?php include "header.php";?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: black;
            color: #fff;
        }

        .container {
            max-width: 800px;
            height: 80vh;
            background-color: #ffffff69;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color:white;

        }

        p {
            font-size: 16px;
            margin-bottom: 8px;
            color:white;
        }

        .play-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: red;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-align: center;
        }
        .download-button{
            display: inline-block;
            padding: 10px 20px;
            background-color: green;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-align: center;
            width:85%;
            margin-top:20px;
        }

        .play-button:hover {
            background-color: #0056b3;
        }

        .thumbnail {
            width: 20%;
            height:40vh;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .container-more {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        .movie-item {
            width: 200px;
            height:60vh;
            margin: 10px;
            text-align: center;
            background-color: #ffffff2f;
            padding: 0px;
            border-radius: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            overflow: hidden;
        }

        .movie-item img {
            width: 100%;
            border-radius: 5px;
        }

       

        .movie-item a {
            text-decoration: none;
            color:white;
        }

        /* Hover effect */
        .movie-item:hover {
            transform: scale(1.1); /* Increase scale on hover */
        }
        a{
            text-decoration:none;
            color:white;
           
        }
        .vj-info {
        font-size: 14px; 
        color: grey;
        margin-top: 5px; 
       }
       .title{
        font-size: 18px; 
        color: white;
        font-weight:bold;
        margin-top: 5px;
       }
       .more-text{
        color:white;
       }
        @media only screen and (max-width: 768px) {
            .thumbnail {
            width: 100%;
            height:40vh;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .container {
            max-width: 800px;
            height: 90vh;
            background-color: black;
            margin-top:100px;
            padding: 5px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .play-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: red;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-align: center;
            width:85%;
        }
        .movie-item {
            
            text-align: center;
            background-color: #ffffff2f;
           height:30vh;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            overflow: hidden;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url(images/bg1.jpg);
            
        }
        .container-more {
            width:100%;
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-around;
            
            margin-top: 20px;
            overflow-x:scroll;
            
        }
        a{
            text-decoration:none;
            color:white;
           
            padding:0px;
        }
        .details{
            position:relative;
            bottom:100px;
            
        }
        .movie-item img {
            width: 100%;
            height:30vh;
            border-radius: 5px;
        }
        .more-text{
            margin-top:100px;
        }
    }
    </style>
</head>
<body>
   
    <div class="container">
        <?php
        // Supabase credentials
        $supabaseUrl = 'https://hzupaqgkflmqjjrivkwc.supabase.co';
        $serviceRoleKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imh6dXBhcWdrZmxtcWpqcml2a3djIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTcxMzk1MTYwNywiZXhwIjoyMDI5NTI3NjA3fQ.RVA9Y4EPDnPUR7Rrw6ZARcpn3slWLTUaD7WSf_CVWxM';

        // Retrieve movie details from URL parameter
        if (isset($_GET['id'])) {
            $movieId = $_GET['id'];

            // API endpoint to fetch specific movie details
            $apiUrl = $supabaseUrl . '/rest/v1/movie?id=eq.' . $movieId; // Filter by movie ID

            // Initialize cURL session
            $ch = curl_init();

            // Set cURL options
            curl_setopt($ch, CURLOPT_URL, $apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'apikey: ' . $serviceRoleKey,
            ));

            // Execute cURL session
            $response = curl_exec($ch);

            // Check for cURL errors
            if (curl_errno($ch)) {
                echo 'Error: ' . curl_error($ch);
                exit;
            }

            // Close cURL session
            curl_close($ch);

            // Decode JSON response
            $movieData = json_decode($response, true);

            // Check if movie data retrieval was successful
            if ($movieData && isset($movieData[0])) {
                $movie = $movieData[0]; // Extract movie details

                // Display movie details
                echo '<img src="' . $movie['thumbnail'] . '" alt="Thumbnail" class="thumbnail">';
                echo '<h1>' . $movie['title'] . '</h1>';
                echo '<p><strong>Description:</strong> ' . $movie['description'] . '</p>';
                echo '<p><strong>Cast:</strong> ' . $movie['rating'] . '</p>';
                echo '<p><strong>Genre:</strong> ' . $movie['genre'] . '</p>';
                echo '<p><strong>VJ:</strong> ' . $movie['vj'] . '</p>';
                echo '<a href="' . $movie['video'] . '" target="_blank" class="play-button">Play Movie</a>';
                 echo '<a href="' . $movie['video'] . '" target="_blank" class="download-button">Download Movie</a>';
            } else {
                echo '<p>Movie not found.</p>';
            }
        } else {
            echo '<p>Invalid movie ID.</p>';
        }
        ?>
    </div>
    <h1 class="more-text">More movies</h1>
    <div class="container-more">
        <?php
        // Supabase credentials
        $supabaseUrl = 'https://hzupaqgkflmqjjrivkwc.supabase.co';
        $serviceRoleKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imh6dXBhcWdrZmxtcWpqcml2a3djIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTcxMzk1MTYwNywiZXhwIjoyMDI5NTI3NjA3fQ.RVA9Y4EPDnPUR7Rrw6ZARcpn3slWLTUaD7WSf_CVWxM';

        // API endpoint to fetch data
        $apiUrl = $supabaseUrl . '/rest/v1/movie?select=*'; // Fetch all columns

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'apikey: ' . $serviceRoleKey,
        ));

        // Execute cURL session
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
            exit;
        }

        // Close cURL session
        curl_close($ch);

        // Decode JSON response
        $data = json_decode($response, true);

        // Check if data retrieval was successful
        if (!$data) {
            echo 'Failed to retrieve data.';
            exit;
        }

        // Display the fetched data with thumbnails and filtering by 'new' attribute
        $count = 0;
        foreach ($data as $row) {
            // Check if the 'new' attribute is true and limit to 10 movies
            if ($count < 12) {
                $thumbnailUrl = $row['thumbnail']; // Assuming 'thumbnail' is a direct image link

                // Generate link to movie details page
                echo '<a href="movie_details.php?id=' . $row['id'] . '">';
                echo '<div class="movie-item">';
                echo '<img src="' . $thumbnailUrl . '" alt="Thumbnail">';
                echo '<div class="details"><p class="title">' . $row['title'] . '</p>';
                echo '<p class="vj-info">' . $row['vj'] . '</p>';
                echo '<p>' . $row['genre'] . '</p>';
                echo '<p>' . $row['year'] . '</p>';
                echo '</div></div>';
                echo '</a>';

                $count++;
            }
        }
        ?>
    </div>
    <?php include "footer.php";?>
</body>
</html>
