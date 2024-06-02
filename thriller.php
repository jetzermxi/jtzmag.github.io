<?php include "header.php";
    
    ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-repeat: no-repeat;
            background-size: cover;
            
            background-color: rgb(46, 2, 2);
            color: #333;
        }

        .foryou-text{
            margin-top: 0px;
            color:white;
            font-size:25px;
            margin-left:30px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        .containers {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }
        .movie-item {
            width: 200px;
            height:75vh;
            margin: 10px;
            text-align: center;
            background-color: #ffffff2f;
            padding: 0px;
            border-radius: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            overflow: hidden;
        }

        .movie-items {
            width: 100px;
            height:30vh;
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
       .genre{
        font-size:15px;
        
       }
       .year{
        font-size:15px;
       }
       .title{
        font-size: 18px; 
        color: white;
        font-weight:bold;
        margin-top: 5px;
       }
       .more-div{
        display:flex;
        justify-content:space-between;
        align-items:center;
        
       }
       .see-more{
        margin-right:15px;
            margin-top:5px;
            padding: 10px;
            border-color: red;
            border-radius: 5px;
            background-color: rgba(0, 0, 0, 0);
            color: white;
       }
       .see-more:hover{
            background-color:red;
            cursor: pointer;
            
        }
      
        @media only screen and (max-width: 768px) {
            .movie-item {
            
            text-align: center;
            background-color: #ffffff2f;
           height:30vh;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            overflow: hidden;
        }
        .movie-items {
            width:100px;
            height:25vh;
            margin-top: 20px;
            text-align: center;
            background-color: #ffffff2f;
            padding: 0px;
            border-radius: 15px;
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
        .container {
            width:100%;
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-around;
            
            margin-top: 20px;
            overflow-x:scroll;
            
        }
        .containers {
            width:100%;
            display: flex;
            flex-wrap: wrap;
            justify-content:space-evenly;
            margin-top: 20px;
           
            
        }
        
        a{
            text-decoration:none;
            color:white;
           
            padding:0px;
        }
        .details{
            position:relative;
            bottom:130px;
            
        }
        .movie-item img {
            width: 100%;
            height:30vh;
            border-radius: 5px;
            object-fit: cover;
        }
    }
    </style>
</head>
<body>

<h1 class="foryou-text">Thriller Movies</h1>
       
    <div class="containers">
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
            if (isset($row['genre']) && $row['genre'] === "Thriller") {
                $thumbnailUrl = $row['thumbnail']; // Assuming 'thumbnail' is a direct image link

                // Generate link to movie details page
                echo '<a href="movie_details.php?id=' . $row['id'] . '">';
                echo '<div class="movie-items">';
                echo '<img src="' . $thumbnailUrl . '" alt="Thumbnail" width="100px" height="186px">';
                echo '<div class="details"><p class="title">' . $row['title'] . '</p>';
             
               
                echo '</div></div>';
                echo '</a>';

                $count++;
            }
        }
        ?>
    </div>