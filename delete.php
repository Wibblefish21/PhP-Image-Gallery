<?php
    include_once 'includes/dbh.inc.php';  
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    

    // Create query
    $query = 'SELECT * FROM gallery WHERE idGallery = '.$id;

    // Get result
    $result = mysqli_query($conn, $query);

    // Fetch Data
    $image = mysqli_fetch_assoc($result);


    // Free Result
    mysqli_free_result($result);

    $path = $image['imgFullNameGallery'];
    $pathFull = "img/$image";

    if (isset($_POST['delete-submit'])) {
        
        unlink("img/".$path);
        $delete = "DELETE FROM gallery WHERE idGallery = $id";
        $result = mysqli_query($conn, $delete);
        
        if ($result) {
            header("Location: index.php?delete=success");
            exit();
        } else {
            echo "File not deleted";
        }
        
    } else {
        header("Location: index.php?delete=failure");
    }

?>
