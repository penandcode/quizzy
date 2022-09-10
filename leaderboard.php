<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <?php
        include 'header.php';
        include 'dbconnect.php';
    ?>

    <div class="container my-3">
        <h2 class="text-center py-3">Leaderboard</h2>
        <div class="card card-rounded">


            <div class="card-body p-5 bg-white bg-success rounded">
                <div class="table-responsive">
                    <table id="quiz_table" style="width:100%" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Sr. No.</th>
                                <th scope="col">Quiz</th>
                                <th scope="col">Time</th>
                                <th scope="col">Leaderboard</th>
                            </tr>
                        </thead>
                        <?php
            $sr = 0;
            $sql = "SELECT * FROM `quiz`";
            $result = mysqli_query($link, $sql);
            while($row = mysqli_fetch_array($result)){
                $id= $row['id'];
                $name= $row['name'];
                $time= $row['time'];?>
                        <tbody>
                            <tr>
                                <td><?php echo ++$sr;?></td>
                                <td><?php echo $name;?></td>
                                <td><?php echo $time;?></td>
                                <td><a href="result.php?id=<?php echo $id;?>" class="btn btn-primary">View</a></td>
                            </tr>
                            <?php
            }
            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
    </script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script>
    $(function() {
        $(document).ready(function() {
            $('#quiz_table').DataTable();
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