<?php 
session_start();
include 'includes/header.inc.php';
require 'includes/dbh.inc.php';


// get ID
$id = mysqli_real_escape_string($conn, $_GET['id']);

// Create query
$query = 'SELECT * FROM gallery WHERE idGallery = '.$id;

// Get result
$result = mysqli_query($conn, $query);


// Fetch Data
$image = mysqli_fetch_assoc($result);


// Free Result
mysqli_free_result($result);

// Close connection
mysqli_close($conn);

    
?>

<div class="displayImg">
  <img src="img/<?php echo $image['imgFullNameGallery'] ?>" alt="">
  <h1><?php echo $image['titleGallery']; ?></h1>
  <p><?php echo $image['descGallery']; ?></p>

  <?php if (isset($_SESSION['userUid'])): ?>
    <form action='delete.php?id=<?php echo $image['idGallery']; ?>' method='POST'>
      <button type='submit' name='delete-submit' class='btn btn-delete'>Delete Image</button>
    </form>
<?php endif; ?>
  
</div>

</div>
