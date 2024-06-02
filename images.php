<style>
    /* Basic styling for the image grid */
.image-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 10px;
    padding: 20px;
}

.image-item {
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
}

.image-item img {
    max-width: 100%;
    height: auto;
    transition: transform 0.3s ease-in-out;
}

.image-item img:hover {
    transform: scale(1.05);
}

</style>

<?php
$directory = 'images/';

// Get all files from the directory
$files = scandir($directory);

// Display images in a grid
echo '<div class="image-grid">';

foreach ($files as $file) {
    // Exclude directories and system files (like . and ..)
    if (!is_dir($directory . $file) && $file !== '.' && $file !== '..') {
        echo '<div class="image-item">';
        echo '<img src="' . $directory . $file . '" alt="' . $file . '">';
        echo '<div class="image-caption">' . $file . '</div>';
        echo '</div>';
    }
}

echo '</div>';
?>

