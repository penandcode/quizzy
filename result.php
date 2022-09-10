<?php
session_unset();
include 'dbconnect.php';
include "header.php";
$id = $_GET['id'];
$user = $_SESSION['userLogin'];
$total = 0;
$sql1 = "SELECT * FROM `answer` WHERE `quiz_id` = '$id' && `user_id` = '$user'";
$result1 = mysqli_query($link, $sql1);
while ($row1 = mysqli_fetch_array($result1)) {
    // if($id != $row1['id']){
    //     header("Location: quiz.php");
    // }
    
    $total = $total + 1;
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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>


    <?php
    $no = 0;
    $sql1 = "SELECT * FROM `answer` WHERE `quiz_id` = '$id' && `user_id` = '$user'";
    $result1 = mysqli_query($link, $sql1);
    $score = 0;
    while ($row1 = mysqli_fetch_array($result1)) {
        $no = $no + 1;
        $question_id = $row1['question_id'];
        $selected = $row1['answer'];
    ?>
    <div class="container my-3">

        <?php
            $sql2 = "SELECT * FROM `question` WHERE `id`='$question_id'";
            $result2 = mysqli_query($link, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $question = $row2['question'];
            $image = $row2['image'];
            $option_a = $row2['option_a'];
            $option_b = $row2['option_b'];
            $option_c = $row2['option_c'];
            $option_d = $row2['option_d'];
            $option_e = $row2['option_e'];
            $answer = $row2['answer'];
            ?>
        <?php
            if($selected == "null"){
                echo '<div class="card" style="max-width:75rem;">';

            }
            elseif($selected == $answer){
                echo '<div class="card text-white bg-success" style="max-width:75rem;">';
            }
            elseif($selected != $answer){
                echo '<div class="card text-white bg-danger" style="max-width:75rem;">';
            }
            else{
                echo '<div class="card text-white bg-dark" style="max-width:75rem;">';
            }
            ?>
        <?php
                if($selected == 'null') {?>
        <h5 class="card-header"><?php echo $no . "/" . $total; ?></h5>
        <?php  }
                elseif($selected == $answer) {?>
        <h5 class="card-header list-group-item-success"><?php echo $no . "/" . $total; ?></h5>
        <?php }
                else{?>
        <h5 class="card-header list-group-item-danger"><?php echo $no . "/" . $total; ?></h5>
        <?php }?>

        <div class="card-body">
            <p class="card-text"><?php echo $question; ?></p>
            <?php
                    if ($image) {
                        echo '<img src="' . $image . '" alt="">';
                    }
                    ?>
            <?php
                        if($selected == $answer){
                            $score = $score+1;
                        }
                    ?>
            <ul class="list-group list-group-flush">
                <?php
                        if($answer == 1){
                            if($selected == 1){
                                echo '
                                <li class="list-group-item  list-group-item-success text-success">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item ">' . $option_d . '</li>';
                            }
                            elseif($selected == 2){
                                echo '
                                <li class="list-group-item list-group-item-success text-success">' . $option_a . '</li>
                                <li class="list-group-item  list-group-item-danger text-danger">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item ">' . $option_d . '</li>';
                            }
                            elseif($selected == 3){
                                echo '
                                <li class="list-group-item list-group-item-success text-success">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item list-group-item-danger text-danger">' . $option_c . '</li>
                                <li class="list-group-item ">' . $option_d . '</li>';
                            }
                            elseif($selected == 4){
                                echo '
                                <li class="list-group-item list-group-item-success text-success">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item list-group-item-danger text-danger">' . $option_d . '</li>';
                            }
                            else{
                                echo '
                                <li class="list-group-item list-group-item-success text-success">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item">' . $option_d . '</li>';
                            }

                        }
                        if($answer == 2){
                            if($selected == 1){
                                echo '
                                <li class="list-group-item list-group-item-danger text-danger">' . $option_a . '</li>
                                <li class="list-group-item list-group-item-success text-success">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item ">' . $option_d . '</li>';
                            }
                            elseif($selected == 2){
                                echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item list-group-item-success text-success">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item ">' . $option_d . '</li>';
                            }
                            elseif($selected == 3){
                                echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item list-group-item-success text-success">' . $option_b . '</li>
                                <li class="list-group-item list-group-item-danger text-danger">' . $option_c . '</li>
                                <li class="list-group-item ">' . $option_d . '</li>';
                            }
                            elseif($selected == 4){
                                echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item list-group-item-success text-success">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item list-group-item-danger text-danger">' . $option_d . '</li>';
                            }
                            else{
                                echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item list-group-item-success text-success">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item">' . $option_d . '</li>';
                            }
                        }
                        if($answer == 3){
                            if($selected == 1){
                                echo '
                                <li class="list-group-item list-group-item-danger text-danger">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item list-group-item-success text-success">' . $option_c . '</li>
                                <li class="list-group-item ">' . $option_d . '</li>';
                            }
                            elseif($selected == 2){
                                echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item list-group-item-danger text-danger">' . $option_b . '</li>
                                <li class="list-group-item list-group-item-success text-success">' . $option_c . '</li>
                                <li class="list-group-item ">' . $option_d . '</li>';
                            }
                            elseif($selected == 3){
                                echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item list-group-item-success text-success">' . $option_c . '</li>
                                <li class="list-group-item ">' . $option_d . '</li>';
                            }
                            elseif($selected == 4){
                                echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item list-group-item-success text-success">' . $option_c . '</li>
                                <li class="list-group-item list-group-item-danger text-danger ">' . $option_d . '</li>';
                            }
                            else{
                                echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item list-group-item-success text-success">' . $option_c . '</li>
                                <li class="list-group-item">' . $option_d . '</li>';
                            }

                        }
                        if($answer == 4){
                            if($selected == 1){
                                echo '
                                <li class="list-group-item list-group-item-danger text-danger">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item  list-group-item-success text-success">' . $option_d . '</li>';
                            }
                            elseif($selected == 2){
                                echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item list-group-item-danger text-danger">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item  list-group-item-success text-success">' . $option_d . '</li>';
                            }
                            elseif($selected == 3){
                                echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item list-group-item-danger text-danger">' . $option_c . '</li>
                                <li class="list-group-item  list-group-item-success text-success">' . $option_d . '</li>';
                            }
                            elseif($selected == 4){
                                echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item  list-group-item-success text-success">' . $option_d . '</li>';
                            }
                            else{
                                echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item  list-group-item-success text-success">' . $option_d . '</li>';
                            }
                        }
                        if($option_e){

                            if($answer == 5){
                                if($selected == 1){
                                    echo '
                                <li class="list-group-item list-group-item-danger text-danger">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item ">' . $option_d . '</li>
                                <li class="list-group-item  list-group-item-success text-success">' . $option_e . '</li>';
                                }
                                elseif($selected == 2){
                                    echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item list-group-item-danger text-danger">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item ">' . $option_d . '</li>
                                <li class="list-group-item  list-group-item-success text-success">' . $option_e . '</li>';
                                }
                                elseif($selected == 3){
                                    echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item list-group-item-danger text-danger">' . $option_c . '</li>
                                <li class="list-group-item ">' . $option_d . '</li>
                                <li class="list-group-item  list-group-item-success text-success">' . $option_e . '</li>';
                                }
                                elseif($selected == 4){
                                    echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item  list-group-item-danger text-danger">' . $option_d . '</li>
                                <li class="list-group-item  list-group-item-success text-success">' . $option_e . '</li>';
                                }
                                elseif($selected == 5){
                                    echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item ">' . $option_d . '</li>
                                <li class="list-group-item  list-group-item-success text-success">' . $option_e . '</li>';
                                }
                                else{
                                    echo '
                                <li class="list-group-item">' . $option_a . '</li>
                                <li class="list-group-item">' . $option_b . '</li>
                                <li class="list-group-item">' . $option_c . '</li>
                                <li class="list-group-item ">' . $option_d . '</li>
                                <li class="list-group-item  list-group-item-success text-success">' . $option_e . '</li>';
                                }
                            }
                        }

                    ?>
            </ul>
        </div>
        <div class="card-footer text-center">
            <?php
                if($selected == "null"){
                    echo '<h4>No Attempt</h4>';
                }
                elseif($answer == $selected){
                    echo '<h4>+1</h4>';
                }
                elseif($selected != $answer){
                    echo '<h4>+0</h4>';
                }
                else{
                    echo '<h4>-</h4>';
                }
            ?>
        </div>
    </div>
    </div>

    <?php
    } ?>

    <div class="scorecard px-2 bg-secondary rounded" style="position:fixed; top:50%; right:3%;">
        <h5>Score:</h5>
        <h1 class="fa-solid fa-000"><?php echo $score.'/'.$total;?></h1>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    </script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
    </script>
</body>

</html>