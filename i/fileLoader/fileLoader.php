<div class="post main" id="FileLoader">
  <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="hidden" name="newsId" value="<?=$_GET['newsId']?>" />
    <input type="submit" value="Upload Image" name="submit" class="btn">
  </form>
</div>
