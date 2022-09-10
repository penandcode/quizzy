<?php
$id = $_GET['id'];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="alert alert-info">

        <div class="container">
            <div class="container">
                <div class="row py-5">
                    <div class="col-lg-10 mx-auto">
                        <div class="card rounded shadow border-0">
                            <div class="card-body p-5 bg-white rounded">
                                <div class="table-responsive">
                                    <table id="questions_table" style="width:100%;" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Sr. No.</td>
                                                <td>Question</td>
                                                <td>Select</td>
                                                <td>Add</td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            include 'dbconnect.php';
                                            $sr = 0;
                                            $sql = "SELECT * FROM `question`";
                                            $result = mysqli_query($link, $sql);
                                            if ($result) {
                                                while ($row = mysqli_fetch_array($result)) {
                                            ?>

                                                    <tr>
                                                        <td><?php echo ++$sr; ?></td>
                                                        <td><?php echo $row['question']; ?></td>
                                                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                                            <td><input type="checkbox" class="ques" name='ques[]' value=<?php echo $id; ?>></td>
                                                            <td><button type="submit" name="submit" id="submit" class="btn btn-primary">+</button></td>
                                                        </form>
                                                    </tr>

                                            <?php
                                                }
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
    </div>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </script>
    <script src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    </script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
    </script>
    <script>
        $(function() {
            $(document).ready(function() {
                $('#questions_table').DataTable();
            });
        });
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <!-- <script>
        $(document).ready(function(){
            $('#submit').click(function(){
                var insert = [];
                $('.ques').each(function())
                if($(this).is(":checked"))
                {
                    insert.push($(this).val());
                }
            });
            insert = insert.toString();
            $.ajax({
                url:"insert.php",
                method: "POST",
                data: {insert:insert},
                success: function(data){
                    $('#result').html(data);
                }
            })
        })
    </script> -->
</body>

</html>