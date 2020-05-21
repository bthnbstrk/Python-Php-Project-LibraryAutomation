<?php
include 'netting/baglan.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Library is My World- Add Book</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="row text-center">

    <table class="table">

        <thead>

        <tr>
            <th scope="col">Book Name</th>
            <th scope="col">ISBN</th>
            <th scope="col">Author</th>
            <th scope="col">Add a Picture</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <?php
        $iceriksor=$db->prepare("select * from books");
        $iceriksor->execute();
        while( $icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <tbody>
        <tr>
            <th scope="row">  <?php  echo   $icerikcek['book_name']   ?></th>
            <th scope="row">  <?php  echo $icerikcek['book_isbn']; ?></th>
            <td><?php  echo $icerikcek['book_author']; ?></td>
            <td>  <a href="add-picture.php?book_id=<?php  echo $icerikcek['book_id'];?>">
                    <button style="width: 80px;" class="btn btn-primary btn-xs">Update</button>
                </a></td>
            <td> <a href="netting/islem.php?remove_book=ok&book_id=<?php  echo $icerikcek['book_id']; ?>">
                    <button style="width: 80px;" class="btn btn-danger btn-xs">Delete</button>
                </a></td>
        </tr>
        </tbody>
        <?php } ?>
    </table>




</div>
</body>
</html>