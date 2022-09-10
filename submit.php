<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnect.php';
    include 'auth.php';
    $user = $_POST['user'];
    $answer = $_POST['option'];
    $question = $_POST['questionId'];
    $quiz = $_POST['quiz'];

    $result = mysqli_query($link, "SELECT * FROM `answer` WHERE `quiz_id`='$quiz'");
    while ($row = mysqli_fetch_array($result)) {
        if ($row['user_id'] == $user) {
            $msg = "Already Givern";
            header("Location:quiz.php?msg=$msg");
        }
    }
    for ($i = 0; $i < count($question); $i++) {
        $j = $i + 1;
        $sql = "INSERT INTO `answer`(`quiz_id`, `question_id`, `user_id`, `answer`) VALUES('$quiz', '$question[$i]', '$user', '$answer[$j]')";
        $result = mysqli_query($link, $sql);
        if ($result) {
            header("Location:result.php?id=$quiz");
        }
    }
}
?>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>