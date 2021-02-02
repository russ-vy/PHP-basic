<div class="container">

    <form class="form-file" enctype="multipart/form-data" method="POST">
        <input type="file" name="photo" accept="image/*,image/jpeg" class="form-file-input" id="customFile">
        <label class="form-file-label" for="customFile">
            <span class="form-file-text">Choose file...</span>
            <span class="form-file-button">Browse</span>
        </label>
        <button class="form-file-button send" type="submit">Send</button>
    </form>

    <div class="gallery row">

        <?php   getImages();    ?>

    </div>

</div>