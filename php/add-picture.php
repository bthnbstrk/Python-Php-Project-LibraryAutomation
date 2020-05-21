<?php
include 'netting/baglan.php';

$iceriksor = $db->prepare("select * from books where book_id=:book_id"); //islem.phpden geldi bu mevzu
$iceriksor->execute(array(
    'book_id'=>$_GET['book_id']
));
$icerikcek = $iceriksor->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h1>Add a Picture</h1>
<form action="netting/islem.php" method="POST" enctype="multipart/form-data"
      id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
    <input type="hidden" name="book_id" value="<?php echo $icerikcek['book_id']; ?>">
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Name<span class="required">*</span>
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" id="first-name" required="required" name="book_name" style="width: 60%" value="<?php echo $icerikcek['book_name']?>">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">ISBN<span class="required">*</span>
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" id="first-name" required="required" name="book_isbn" style="width: 60%" value="<?php echo $icerikcek['book_isbn']?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Author<span class="required">*</span>
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" id="first-name" required="required" name="book_author" style="width: 60%" value="<?php echo $icerikcek['book_author']?>" >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Page Count<span class="required">*</span>
        </label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <input type="text" id="first-name"  name="book_page"  style="width: 60%" value="<?php echo $icerikcek['book_pages']?>">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Picture of Book<span class="required">*</span>
        </label>
        <div class="col-md-9 col-sm-12 col-xs-12">
            <input type="file" id="first-name" required="required" name="book_photo"   class="form-control col-md-7 col-xs-12">
        </div>
    </div>

    <div  class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" name="AddPhoto" class="btn btn-primary">Upload</button>
        </div>
    </div>


</form>
</body>
</html>