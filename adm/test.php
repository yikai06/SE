
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKEditor Example</title>
    <!-- Include CKEditor script -->
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
    <!-- Textarea element to be replaced by CKEditor -->
    <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>

    <script>
        // Replace the textarea with CKEditor
        CKEDITOR.replace('editor1');
    </script>
</body>
</html>
