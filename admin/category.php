<?php
include 'dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $img = $_FILES['cat_img'];

    $img_name = $img['name'];
    $img_size = $img['size'];
    $tmp_name = $img['tmp_name'];
    $error = $img['error'];

    $img_ext = explode('.', $img_name);
    $img_check = strtolower(end($img_ext));

    $new_name = uniqid("IMG-", true) . '.' . $img_check;

    $allowed = array("jpg", "jpeg", "png");

    $existSql = "SELECT * FROM `category` WHERE category_name = '$category'";
    $result = mysqli_query($link, $existSql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $em = "Category already exists.";
        header("location: category.php?msg=$em");
    } elseif (!$img) {
        $sql = "INSERT INTO `category`(`category_name`, `type`) VALUES ('$category', '1')";
        $query = mysqli_query($link, $sql);
        $em = "No file selected";
        header("location: category.php?msg=$em");
    } elseif ($img) {

        if (in_array($img_check, $allowed)) {
            $desination = 'image/' . $new_name;
            move_uploaded_file($tmp_name, $desination);
            echo $desination . $tmp_name;
            $sql = "INSERT INTO `category`(`category_name`, `type`, `image`) VALUES ('$category', '1', '$desination')";
            $query = mysqli_query($link, $sql);
            if ($query) {
                $em = "Category Added";
                header("location: category.php?msg=$em");
            }
        } else {
            $em = "Wrong file type";
            header("location: category.php?msg=$em");
        }
    } else {
        $em = "Something went wrong";
        header("location: category.php?msg=$em");
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="alert alert-info">

        <div class="container my-4">
            <h3>Create Main Category</h3>
            <hr>
            <form action="category.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col md-9">
                        <label for="category">Category</label>
                        <input type="text" class="my-3 form-control" id="category" required name="category" placeholder="Enter your Category">
                    </div>
                    <div class="col md-9">
                        <label for="cat-img">Choose File</label>
                        <input type="file" class="my-3 form-control" id="cat_img" name="cat_img" value="" />
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <button type="submit" class="btn btn-outline-secondary">Submit</button>
                </div>
            </form>

        </div>

        <div class="container my-4">
            <div class="row">
                <h3>Categories</h3>
                <h6 class="text-muted">View/Update/Delete</h6>
            </div>
            <hr>
            <div class="container">
                <div class="row py-5">
                    <div class="col-lg-10 mx-auto">
                        <div class="card rounded shadow border-0">
                            <div class="card-body p-5 bg-white rounded">
                                <div class="table-responsive">
                                    <table id="category_table" style="width:100%" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sr. No.</th>
                                                <th scope="col">Id</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Image</th>
                                                <!-- <th scope="col">Edit</th> -->
                                                <th scope="col">Delete</th>
                                                <!-- <th></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $sql = "SELECT * FROM `category`";
                                            $result = mysqli_query($link, $sql);
                                            $sr = 0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                $id = $row['id'];
                                                $category_name = $row['category_name'];
                                                $image = $row['image'];
                                                echo "<tr>";
                                                echo "<td>" . ++$sr . "</tds>";
                                                echo "<td>" . $id . "</td>";
                                                echo "<td>" . $category_name . "</td>";
                                                echo "<td><img src='" . $image . "' style='height:50px; width:50px;>'</td>";
                                                // echo "<td><button data-id='".$id."' class= 'btn btn-info btn-sm btn-popup' data-bs-toggle=''>✎</button></td>";
                                                echo "<td><a href='../partials/_delCat.php?id=" . $id . "' type='button'
class='btn btn-default btn-outline-danger' name='delete_category'
aria-label='Left Align'>🗑</a></td>";
                                                echo "</tr>";
                                            }

                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editCat" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
        <script src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script>
            $(function() {
                $(document).ready(function() {
                    $('#category_table').DataTable();
                });
            });
        </script>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
</body>

</html>