<?php include("includes/header.php"); ?>


<div class="row container mt-4" id="discoverAlbum">
    <?php

$albumQuery=mysqli_query($conn,"SELECT * FROM Albums ORDER BY RAND() LIMIT 10");

while($row=mysqli_fetch_array($albumQuery)){  ?>

    <div class="col-3 mt-3" id="">
        <div class="card" style="width: 10rem;">
            <a href="album.php?id=<?php echo $row['id'] ?>"> <img src="<?php echo($row['artworkPath'])?>"
                    class="card-img-top" alt="No Image Found"> </a>
            <div class="card-body text-center lead">
                <a class="card-title text-dark"
                    href="album.php?id=<?php echo $row['id'] ?>"><?php echo($row['title']) ?></a>
            </div>
        </div>
    </div>


    <?php } ?>

</div>






<?php include("includes/footer.php");  ?>