<?php
    include 'dbconnect.php';
    $sql1 = "SELECT * FROM `category`";
    $result = mysqli_query($link, $sql1);

    // Submit questions of Options

    if(isset($_POST['submitopt'])){
        $question = trim($_POST['question']);
        $img = $_FILES['ques_img'];
        $option1 = trim($_POST['option1']);
        $option2 = trim($_POST['option2']);
        $option3 = trim($_POST['option3']);
        $option4 = trim($_POST['option4']);
        $option5 = trim($_POST['option5']);
        $answer = trim($_POST['answer']);
        $category = $_POST['category'];

        $opt5 = array("a", "b", "c", "d", "e", "A", "B", "C", "D", "E");
        $noOpt5 = array("a", "b", "c", "d", "A", "B", "C", "D");

        $img_name = $img['name']; 
        $img_size = $img['size']; 
        $tmp_name = $img['tmp_name']; 
        $error = $img['error'];
        $img_ext = explode('.', $img_name);
        $img_check = strtolower(end($img_ext));
        $new_name = uniqid("QUES-", true).'.'.$img_check;

        $allowed = array("jpg", "jpeg", "png");

        $existSql = "SELECT * FROM `question` WHERE question = '$question'";
        $result = mysqli_query($link, $existSql);
        $numRows = mysqli_num_rows($result);

        // Check question exists

        if($numRows>0){
        $em = "Question already exists.";
        header("location: /project/admin/questions.php?msg=$em");
        }

        // Check is image present

        if($img){
            if(in_array($img_check, $allowed)){
            $desination = 'image/'.$new_name;
            move_uploaded_file($tmp_name, $desination);

            // If option5 is present

            if($option5){
                if(in_array($answer, $opt5)){
                    $sql = "INSERT INTO `question`(`category`, `question`,  `image`, `question_type`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `answer`) VALUES ('$category', '$question', '$desination', '1', '$option1', '$option2', '$option3', '$option4', '$option5', '$answer')";
                    $query = mysqli_query($link, $sql);
                    if($query){
                        $em = "Question Added";
                        header("location: /project/admin/questions.php?msg=$em");
                    }
                    else{
                        $em = "Something Went Wrong!";
                        header("location: /project/admin/questions.php?msg=$em");
                    }
                }
                else{
                    $msg = "Write Correct Answer";
                    header("location: /project/admin/questions.php?msg=$msg");
                }
                
                }
            }

            // If option 5 is not present

            if(!$option5){
                if(in_array($answer, $noOpt5)){
                    $sql = "INSERT INTO `question`(`category`, `question`,  `image`, `question_type`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES ('$category', '$question', '$desination', '1', '$option1', '$option2', '$option3', '$option4', '$answer')";
                    $query = mysqli_query($link, $sql);
                    if($query){
                        $em = "Question Added";
                        header("location: /project/admin/questions.php?msg=$em");
                    }
                    else{
                        $em = "Something Went Wrong!";
                        header("location: /project/admin/questions.php?msg=$em");
                    }
                }
                else{
                    $msg = "Write Correct Answer";
                    header("location: /project/admin/questions.php?msg=$msg");
                }
                
            }
        }


        // If image is not present

        else{

            if($option5){
                if(in_array($answer, $opt5)){
                    $sql = "INSERT INTO `question`(`category`, `question`, `question_type`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `answer`) VALUES ('$category', '$question', '1', '$option1', '$option2', '$option3', '$option4', '$option5', '$answer')";
                    $query = mysqli_query($link, $sql);
                    if($query){
                        $em = "Question Added";
                        header("location: /project/admin/questions.php?msg=$em");
                    }
                    else{
                        $em = "Something Went Wrong!";
                        header("location: /project/admin/questions.php?msg=$em");
                    }
                }
                else{
                    $msg = "Write Correct Answer";
                    header("location: /project/admin/questions.php?msg=$msg");
                }
                
            }
            
            if(!$option5){
                if(in_array($answer, $noOpt5)){
                    $sql = "INSERT INTO `question`(`category`, `question`, `question_type`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES ('$category', '$question', '1', '$option1', '$option2', '$option3', '$option4', '$answer')";
                    $query = mysqli_query($link, $sql);
                    if($query){
                        $em = "Question Added";
                        header("location: /project/admin/questions.php?msg=$em");
                    }
                    else{
                        $em = "Something Went Wrong!";
                        header("location: /project/admin/questions.php?msg=$em");
                    }
                }
                else{
                    $msg = "Write Correct Answer";
                    header("location: /project/admin/questions.php?msg=$msg");
                }
                
            }
        }
    }




if(isset($_POST['submittrfa'])){
    $question = trim($_POST['question']);
    $img = $_FILES['ques_tf_img'];
    $option1 = trim($_POST['option_a']);
    $option2 = trim($_POST['option_b']);
    $answer_tf = trim($_POST['answer_tf']);
    $category_tf = $_POST['category_tf'];

    $ans_ver = array("a", "b", "A", "B", "t", "f", "T", "F");

    $img_name = $img['name']; 
    $img_size = $img['size']; 
    $tmp_name = $img['tmp_name']; 
    $error = $img['error'];
    $img_ext = explode('.', $img_name);
    $img_check = strtolower(end($img_ext));
    $new_name = uniqid("QUES-", true).'.'.$img_check;

    $allowed = array("jpg", "jpeg", "png");
    $existSql = "SELECT * FROM `question` WHERE question = '$question'";
    $result = mysqli_query($link, $existSql);
    $numRows = mysqli_num_rows($result);



    if($numRows>0){
    $em = "Question already exists.";
    header("location: /project/admin/questions.php?msg=$em");
    }
    
    elseif($img){
        if(in_array($img_check, $allowed)){
            $desination = 'image/'.$new_name;
            move_uploaded_file($tmp_name, $desination);
            if(in_array($answer_tf, $ans_ver)){
            $sql = "INSERT INTO `question`(`category`, `question`,  `image`, `question_type`, `option_a`, `option_b`, `answer`) VALUES ('$category_tf', '$question', '$desination', '2', '$option1', '$option2', '$answer_tf')";
            $query = mysqli_query($link, $sql);
            $em = "Added";
            header("location: /project/admin/questions.php?msg=$em");
            }
            
            else{
            $em = "Write Correct Answer";
            header("location: /project/admin/questions.php?msg=$em");
            }
        }

        
    else{
    if(in_array($answer_tf, $ans_ver)){
        $sql = "INSERT INTO `question`(`category`, `question`, `question_type`, `option_a`, `option_b`, `answer`) VALUES ('$category_tf', '$question', '2', '$option1', '$option2', '$answer_tf')";
        $query = mysqli_query($link, $sql);
        $em = "Added";
        header("location: /project/admin/questions.php?msg=$em");}
        else{
        $em = "Write Correct Answer";
        header("location: /project/admin/questions.php?msg=$em");
        }  
    }
}

else{
    $em = "Something went wrong";
    header("location: /project/admin/questions.php?msg=$em");
}
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <?php include 'navbar.php'?>
    <div class="alert alert-info">
        <div class="container my-4">
            <h3>Add Questions</h3>
            <hr>
            <!-- Option Question -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#option">
                Options
            </button>
            <div class="modal fade" id="option" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="optionLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="optionLabel">Add Question with options</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="opt">
                                <form action="questions.php" method="POST" enctype="multipart/form-data">
                                    <div class="">
                                        <label class="col-form-label" for="category">Category</label>
                                        <select name="category" id="category" required
                                            class="btn btn-light dropdown-toggle">
                                            <option value="">Select Category</option>
                                            <?php 
                                                while($row= mysqli_fetch_array($result)){ ?>
                                            <option value="<?php echo $row['id'];?>">
                                                <?php echo $row['category_name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label my-4" for="question">Question</label>
                                        <div class="col-sm-8 my-4">
                                            <textarea class="form-control" required name="question" id="question"
                                                rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label my-2" for="ques_img">Upload Image</label>
                                        <div class="col-sm-3 my-2">
                                            <input type="file" class="form-control" name="ques_img" id="image"
                                                name="image" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label my-4" for="option1">Option a</label>
                                        <div class="col-sm-8 my-4">
                                            <textarea class="form-control" required name="option1" id="option1"
                                                rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label my-4" for="option2">Option b</label>
                                        <div class="col-sm-8 my-4">
                                            <textarea class="form-control" required name="option2" id="option2"
                                                rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label my-4" for="option3">Option c</label>
                                        <div class="col-sm-8 my-4">
                                            <textarea class="form-control" required name="option3" id="option3"
                                                rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label my-4" for="option4">Option d</label>
                                        <div class="col-sm-8 my-4">
                                            <textarea class="form-control" required name="option4" id="option4"
                                                rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label my-4" for="option5">Option e</label>
                                        <div class="col-sm-8 my-4">
                                            <textarea class="form-control" name="option5" id="option5"
                                                rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label my-4" for="answer">Answer</label>
                                        <div class="col-sm-8 my-4">
                                            <input type="texts" class="form-control" required name="answer" id="answer"
                                                placeholder="Write a/b/c/d/e">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <div class="">
                                            <button type="submit" name="submitopt"
                                                class="btn btn-outline-secondary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- True False Question -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#trfa">
                True False</button>
            <div class="modal fade" id="trfa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="trfaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="trfaLabel">Add True/False Questions</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="trfa">
                                <form action="questions.php" method="POST" enctype="multipart/form-data">
                                    <div class="">
                                        <label class="col-form-label" for="category_tf">Category</label>
                                        <select name="category_tf" required class="btn btn-light dropdown-toggle">
                                            <option value="">Select Category</option>
                                            <?php 
$sql1 = "SELECT * FROM `category`";
$result = mysqli_query($link, $sql1);
while($row = mysqli_fetch_array($result)){?>
                                            <option value="<?php echo $row['id'];?>">
                                                <?php echo $row['category_name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label my-4" for="question">Question</label>
                                        <div class="col-sm-8 my-4">
                                            <textarea class="form-control" id="question-tf" name="question"
                                                rows="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label my-2" for="ques_tf_img">Upload
                                            Image</label>
                                        <div class="col-sm-3 my-2">
                                            <input type="file" class="form-control" id="ques_tf_img" name="ques_tf_img">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label my-4" for="option_a">Option a</label>
                                        <div class="col-sm-8 my-4">
                                            <textarea class="form-control" required name="option_a" id="option_a"
                                                rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label my-4" for="option_b">Option b</label>
                                        <div class="col-sm-8 my-4">
                                            <textarea class="form-control" required name="option_b" id="option_b"
                                                rows="1"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label my-4" for="answer_tf">Answer</label>
                                        <div class="col-sm-8 my-4">
                                            <input type="texts" class="form-control" required name="answer_tf"
                                                id="answer_tf" placeholder="Write t/f">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <div class="">
                                            <button type="submit" name="submittrfa"
                                                class="btn btn-outline-secondary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Questions -->
        <div class="container py-5">
            <div class="row py-5">
                <h3>Questions</h3>
                <h6 class="text-muted">View/Update/Delete</h6>
                <div class="col-lg-10 mx-auto">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                            <div class="table-responsive">
                                <table id="question_table" style="width:100%"
                                    class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr. No.</th>
                                            <th scope="col">Question</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Option a</th>
                                            <th scope="col">Option b</th>
                                            <th scope="col">Option d</th>
                                            <th scope="col">Option e (if any)</th>
                                            <th scope="col">Answer</th>
                                            <th scope="col">Delete</th>
                                            <!-- <th></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$sql = "SELECT * FROM `question`";
$result = mysqli_query($link, $sql);
$sr = 0;
while ($row = mysqli_fetch_array($result)) {
$id = $row['id'];
$question = $row['question'];
$image = $row['image'];
$option_a = $row['option_a'];
$option_b = $row['option_b'];
$option_c = $row['option_c'];
$option_d = $row['option_d'];
$option_e = $row['option_e'];
$answer = $row['answer'];
echo "<tr>";
echo "<td>".++$sr."</td>";
echo "<td>".$question."</td>";
if($image){
    echo "<td><img src='".$image."' style='height:50px; width:50px;>'</td>";
}
else{
    echo "<td>No image</td>";
}
echo "<td>".$option_a."</td>";
echo "<td>".$option_b."</td>";
echo "<td>".$option_c."</td>";
echo "<td>".$option_d."</td>";
if($image){
    echo "<td>".$option_e."</td>";
}
else{
    echo "<td>N/A</td>";
}
echo "<td>".$answer."</td>";
echo "<td><a href='../partials/_delQues.php?id=".$id."' type='button'
class='btn btn-default btn-outline-danger' name='delete_question'
aria-label='Left Align'>🗑</a></td>";
echo "</tr>";
}?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
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
            $('#question_table').DataTable();
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