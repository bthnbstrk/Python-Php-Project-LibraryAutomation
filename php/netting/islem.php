<?php
include  'baglan.php';
if (@$_GET['remove_book'] == "ok") {

    $sil = $db->prepare("DELETE from books where book_id=:book_id");
    $kontrol = $sil->execute(array(
        'book_id' => $_GET['book_id']
    ));
    if ($kontrol) {
        Header("Location: ../AddBookPicture.php?durum=ok");
    } else {
        Header("Location: ../AddBookPicture.php?durum=no");
    }
}

else if (isset($_POST['AddPhoto'])) {

    if ($_FILES['book_photo']["size"] > 0) {

        $uploads_dir = '../img/';
        @$tmp_name = $_FILES['book_photo']["tmp_name"];
        @$name = $_FILES['book_photo']["name"];
        $benzersizsayi1 = rand(20000, 32000);
        $benzersizsayi2 = rand(20000, 32000);
        $benzersizsayi3 = rand(20000, 32000);
        $benzersizsayi4 = rand(20000, 32000);
        $benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
        $refimgyol = substr($uploads_dir, 3) . "/" . $benzersizad . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");




        $duzenle = $db->prepare("UPDATE books SET
book_name=:hi,
book_author=:hviz,
book_pages=:hm2,
book_isbn=:hm,
book_photo=:ry
    WHERE book_id={$_POST ['book_id']}");
        $update = $duzenle->execute(array(
            'hviz' => $_POST['book_name'],
            'hi' => $_POST['book_author'],
            'hm2' => $_POST['book_page'],
            'hm' => $_POST['book_isbn'],
            'ry' => $refimgyol

        ));
        $book_id = $_POST ['book_id'];

        if ($update) {
            $resimsilunlink = $_POST['book_photo'];//hidden ile gönderdik buraya post edilen yerden
            unlink("../../$resimsilunlink");
            Header("Location: ../AddBookPicture.php?book_id=$book_id&durum=ok");
        } else {
            Header("Location: ../AddBookPicture.php?durum=no");
        }
    }

    else {
        $duzenle = $db->prepare("UPDATE books SET
book_name=:hi,
book_author=:hviz,
book_pages=:hm2,
book_isbn=:hm,
book_photo=:ry
    WHERE book_id={$_POST ['book_id']}");
        $update = $duzenle->execute(array(
            'hviz' => $_POST['book_name'],
            'hi' => $_POST['book_author'],
            'hm2' => $_POST['book_page'],
            'hm' => $_POST['book_isbn']
        ));
        $book_id = $_POST ['book_id'];
        if ($update) {
            Header("Location: ../AddBookPicture.php?book_id=$book_id&durum=ok");
        } else {
            Header("Location: ../AddBookPicture.php?durum=no");
        }
    }
}
?>