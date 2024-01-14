<html>

<div class="profile_pic" id="profile_pic-sets">
    <?php if (isset($_GET['error'])) : ?>
        <p><?php echo $_GET['error']; ?></p>
    <?php endif ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="my_image">
        <input type="submit" name="submit" value="Upload">

    </form>


</div>



</html>