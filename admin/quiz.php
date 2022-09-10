<?php
include 'dbconnect.php';
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $time = trim($_POST['time']);
    if (!empty($name) && !empty($time)) {
        $existSql = "SELECT * FROM `quiz` WHERE `name` = '$name'";
        $result = mysqli_query($link, $existSql);
        $numRows = mysqli_num_rows($result);
        if ($numRows > 0) {
            $em = "Quiz already exists";
            header("Location: ../admin/quiz.php?msg=$em");
        } else {
            $sql = "INSERT INTO `quiz` (`name`, `time`) VALUES ('$name', '$time')";
            $result = mysqli_query($link, $sql);
        }
    }
}

if (isset($_POST['add_ques'])) {
    $quesId = $_POST['ques_id'];
    $quiz_id = $_POST['quiz_id'];
    foreach($quesId as $ques){
        $query = mysqli_query($link, "INSERT INTO `test_questions`(`question_id`, `quiz_id`) VALUES ('$ques', '$quiz_id')");
        if($query == 1){
            echo '<script>Question added.</script>';
        }
        else{
            echo '<script>Failed to insert question.</script>';
        }
    }
    // $sql = "INSERTT INTO `test_questions` (`quiz_id`, `question_id`) VALUES ('', '')";
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container my-4">
        <form action="quiz.php" method="POST">
            <div class="mb-3">
                <label for="inputQuizName" class="form-label">Quiz Name</label>
                <input type="text" class="form-control" name="name" id="inputQuizName">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="text" class="form-control" id="inputTime" name="time">
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">Add Questions </button>
            </div>
            <div class="container my-4">
                <div class="row">
                    <h3>Quiz</h3>
                    <h6 class="text-muted">View/Delete</h6>
                </div>
                <hr>
                <div class="container">
                    <div class="row py-5">
                        <div class="col-lg-10 mx-auto">
                            <div class="card rounded shadow border-0">
                                <div class="card-body p-5 bg-white rounded">
                                    <div class="table-responsive">
                                        <table id="category_table" style="width:100%"
                                            class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Sr. No.</th>
                                                    <th scope="col">Quiz</th>
                                                    <th scope="col">Add Question</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql1 = "SELECT * FROM `quiz`";
                                                $result = mysqli_query($link, $sql1);
                                                $sr = 0;
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $id = $row['id'];
                                                    $name = $row['name']; ?>
                                                <tr>
                                                    <td><?php echo ++$sr; ?></td>
                                                    <td><?php echo $name; ?></td>
                                                    <td class="text-center"><button type="button"
                                                            class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#quesModal<?php echo $id;?>">
                                                            +
                                                        </button></td>
                                                    <td><a href="../partials/_delQuiz.php?id=<?php echo $id; ?>"
                                                            type="button" class="btn btn-default btn-outline-danger"
                                                            name="delete_quiz" aria-label="Left Align">🗑</a></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="quesModal<?php echo $id;?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ques_id" value=<?php echo $id;?>>Add Question</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <h3>Questions</h3>
                                    <p class="text-muted">Add</p>
                                    <div class="col-lg-10 mx-auto">
                                        <div class="card rounded shadow border-0">
                                            <div class="card-body bg-white rounded">
                                                <div class="table-responsive">
                                                    <table id="question_table" style="width:100%"
                                                        class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Sr. No.</th>
                                                                <th scope="col">Question</th>
                                                                <th scope="col">Add</th>
                                                                <!-- <th></th> -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            // echo '
                                                            // <script>
                                                            // document.getElementById("ques_id").value();
                                                            // </script>
                                                            // ';
                                                            $sql = "SELECT * FROM `question`";
                                                            $result = mysqli_query($link, $sql);
                                                            $sr = 0;
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                $Qid = $row['id'];
                                                                $question = $row['question'];
                                                                $image = $row['image'];
                                                                echo "<tr>";
                                                                echo "<td>" . ++$sr . "</tds>";
                                                                echo "<form action='quiz.php' method='POST' enctype=multipart/form-data>";
                                                                echo "<td>" . $question . "</td>";
                                                                echo '<td><div class="form-check"><input type="text" name="quiz_id" value="'.$id.'" style="display:none;">
                                                                <input class="form-check-input" type="checkbox" name="ques_id[]" value="'.$Qid.'"' . $Qid . '" id="' . $Qid . '" >
                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                </label>
                                                                </div></td>';
                                                                echo "</tr>";
                                                            ?>
                                                        </tbody>
                                                        <?php } ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h6 id="modal_body"></h6>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="add_ques">Save changes</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
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