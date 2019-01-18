<?php 
    session_start();
?>
<?php 
include 'includes/header.inc.php';
?>

    <main>
        <section class="gallery-links">
            <div class="wrapper">
                

                <div class="gallery-container">
                    <?php 
                    include_once 'includes/dbh.inc.php';

                    $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL statement failed!";
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt); 
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="galleryItem" id="'.$row["idGallery"].'">
                            <img height="300" src="img/'.$row["imgFullNameGallery"].'">
                            <div class="imgDesc">
                            <h3 class="imgTitle">'.$row["titleGallery"].'</h3>
                           
                            <a href="image.php?id='.$row["idGallery"].'">More Info</a>
                            </div>
                        </div>';
                        }
                    }
                    
                    ?>
                    
                </div>       
                    
                <?php 

                if (isset($_SESSION['userUid'])) {
                    echo  '<div class="gallery-upload">
                    <form action="includes/gallery-upload.inc.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="fileName" placeholder="File name...">
                        <input type="text" name="fileTitle" placeholder="Image title...">
                        <input type="textarea" name="fileDesc" placeholder="Image description...">
                        <input type="file" name="file">
                        <button type="submit" name="submit">UPLOAD</button>
                    </form>
                </div>';
                }
               
                ?>

            </div>
        </section>
    </main>

</body>
</html>
