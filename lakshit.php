<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tinymce Editor in using PHP Example - Nicesnippets.com</title>
    <!-- include Boostrap 5 -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <!-- include tinymce -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <?php 
        include "dbconnect.php";

        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $long_desc = $_POST['long_desc'];

            if($title != ''){
                mysqli_query($link, "INSERT INTO contents(title,long_desc) VALUES('".$title."','".$long_desc."') ");
                header('location: lakshit.php');
            }
        }
    ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center bg-danger text-white">
                        <h4>Tinymce Editor in using PHP Example - Nicesnippets.com</h4>
                    </div>
                    <div class="card-body">
                        <form method='post' action=''>
                            <div class="mb-3">
                                <label><strong>Title :</strong></label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="mb-1">
                                <label><strong>Long Description :</strong></label>
                                <textarea id="mytextarea" name='long_desc' class="form-control"></textarea><br>
                            </div>
                            <div class="d-flex justify-content-center">
                                <input type="submit" name="submit" value="Submit" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script>
    tinymce.init({
        selector: '#mytextarea',
        plugins: [
            'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
            'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
            'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help',
            'wordcount'
        ],
        toolbar: 'undo redo | formatpainter casechange styleselect | bold italic backcolor | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
    });
    </script>
</body>

</html>