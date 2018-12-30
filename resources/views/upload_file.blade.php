<html>

<form method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="upload_file" id="upload_file">
    <button type="submit">submit</button>
</form>

</html>