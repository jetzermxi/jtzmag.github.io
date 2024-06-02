
<?php
  include "header.php";
?>

<style>
  .for-you-div {
    width: 100%;
    height: 30vh;
    background-color: red;
    text-align: center; /* Center align text */
  }

  .for-you-text {
    margin-top: 50px;
    color: white;
    font-size: 24px; /* Increase font size for heading */
  }

  .movie-list {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px;
  }

  .movie-item {
    width: 200px;
    text-align: center;
    background-color: #f9f9f9;
    padding: 10px;
    border-radius: 5px;
  }

  .movie-item img {
    width: 100%;
    height: auto;
    border-radius: 5px;
  }
</style>

<h2 class="for-you-text">For You</h2>
<div class="for-you-div">

<?php
// Supabase credentials
$supabaseUrl = 'https://hzupaqgkflmqjjrivkwc.supabase.co';
$serviceRoleKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Imh6dXBhcWdrZmxtcWpqcml2a3djIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTcxMzk1MTYwNywiZXhwIjoyMDI5NTI3NjA3fQ.RVA9Y4EPDnPUR7Rrw6ZARcpn3slWLTUaD7WSf_CVWxM';

// API endpoint to fetch data
$apiUrl = $supabaseUrl . '/rest/v1/movie?select=*,thumbnail(new_row=true)'; // Fetch all columns and filter by 'new_row=true'

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

// Display the fetched data (limited to 20 items)
$count = 0;
echo '<div class="movie-list">'; // Container for movie list
foreach ($data as $row) {
    if ($count < 20) { // Only process 20 items
      $thumbnailUrl = ''; // Initialize thumbnail URL variable
  
      // Check if 'thumbnail' key exists and is an array
      if (isset($row['thumbnail']) && is_array($row['thumbnail'])) {
        // Get the first thumbnail URL from the 'thumbnail' array
        $thumbnailUrl = $row['thumbnail'][0];
      } else {
        // Set a default thumbnail URL or handle the case where no thumbnail exists
        $thumbnailUrl = 'default-thumbnail.jpg';
      }
  
      echo '<div class="movie-item">';
      echo '<img src="' . $thumbnailUrl . '" alt="Thumbnail">';
      echo '<p>' . $row['title'] . '</p>';
      echo '<p>' . $row['vj'] . '</p>';
      echo '</div>';
  
      $count++;
    }
  }
?>

</div>
