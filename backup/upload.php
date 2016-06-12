<?php
$title = $_POST['title'];
$content = $_POST['content'];
$amount = $_POST['amount'];

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

echo $title.'<br>';
echo $content.'<br>';
echo $amount.'<br>';
echo $target_file.'<br>';

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
/* if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	$image = basename($_FILES["fileToUpload"]["name"]).$imageFileType;
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
        $con = mysqli_connect("localhost","sse1","se12bin134","sse1");
		mysqli_query($con, 'set names utf8');

        $query = "Insert INTO 'sse1'.'Content' 
		('num','title','content','image','amount','event') 
		VALUES(NULL,'$title','$content','$image','$amount','') " ;
		$result1=mysqli_query($con,$query);

        mysqli_close($con);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
 */

?>