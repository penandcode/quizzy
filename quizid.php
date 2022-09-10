<?php
include 'dbconnect.php';
include 'auth.php';
$quiz_id = $_GET['id'];

$result = mysqli_query($link, "SELECT * FROM `answer` WHERE `quiz_id`='$quiz_id'");
while ($row = mysqli_fetch_array($result)) {
    if ($row['user_id'] == $_SESSION['userLogin']) {
        $msg = "Already Given";
        header("Location:quiz.php?msg=$msg");
    }
}

$result1 = mysqli_query($link, "SELECT * FROM `quiz` WHERE `id`='$quiz_id'");
$row1 = mysqli_fetch_array($result1);
$quiz_name = $row1['name'];
$quiz_time = $row1['time'];
$total = 0;
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
    <style type="text/css">
    #quiz_form fieldset:not(:first-of-type) {
        display: none;
    }
    </style>
</head>

<body>
    <!-- <nav class="text-center navbar navbar-expand-md navbar-dark fixed-top bg-dark"> -->
        <div class="navbar-brand mx-3 text-center"><?php echo $quiz_name; ?></div>
        <div class="navbar-brand mx-3" id="timer"></div>
        <script>
        function countdown(elementName, minutes, seconds) {
            var element, endTime, hours, mins, msLeft, time;

            function twoDigits(n) {
                return (n <= 9 ? "0" + n : n);
            }

            function updateTimer() {
                msLeft = endTime - (+new Date);
                if (msLeft < 1000) {
                    document.getElementById('quiz_form').submit();
                } else {
                    time = new Date(msLeft);
                    hours = time.getUTCHours();
                    mins = time.getUTCMinutes();
                    element.innerHTML = (hours ? hours + ':' + twoDigits(mins) : mins) + ':' + twoDigits(time
                        .getUTCSeconds());
                    setTimeout(updateTimer, time.getUTCMilliseconds() + 500);
                }
            }

            element = document.getElementById(elementName);
            endTime = (+new Date) + 1000 * (60 * minutes + seconds) + 500;
            updateTimer();
        }

        countdown("timer", <?php echo $quiz_time; ?>, 0);
        </script>
    <!-- </nav> -->
    <div class="container">

        <form action="submit.php" novalidate id="quiz_form" method="POST">



            <div class="progress my-3">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
            <?php
            $result2 = mysqli_query($link, "SELECT * FROM `test_questions` WHERE `quiz_id`='$quiz_id'");
            while ($row2 = mysqli_fetch_array($result2)) {
                $total = $total + 1;
                $question_id = $row2['question_id'];
                $result3 = mysqli_query($link, "SELECT * FROM `question` WHERE `id`='$question_id'");
                $row3 = mysqli_fetch_assoc($result3);
                    $question = $row3['question'];
                    $image = $row3['image'];
                    $option_a = $row3['option_a'];
                    $option_b = $row3['option_b'];
                    $option_c = $row3['option_c'];
                    $option_d = $row3['option_d'];
                    $option_e = $row3['option_e'];
            ?>
            <fieldset>
                <div class="card my-3">
                    <div class="card-body">
                        <p class="py-3"><?php echo $question; ?></p>
                        <input name="questionId[]" style="display:none;" value="<?php echo $question_id; ?>">
                        <input name="quiz" style="display:none;" value="<?php echo $quiz_id; ?>">
                        <input name="user" style="display:none;" value="<?php echo $_SESSION['userLogin']; ?>">
                    </div>
                    <?php
                            if ($image) {
                                echo '<div class="container py-3"></div>
                        <div class="image-responsive">
                        <img src="$image" class="image-responsive">
                        </div>
                        ';
                            }
                            ?>
                    <div class="card-footer">

                        <div class="container py-3">
                            <input type="radio" name="option[<?php echo $question_id; ?>]" value="1">
                            <label for="option_a"><?php echo $option_a; ?></label>
                        </div>
                        <div class="container py-3">
                            <input type="radio" name="option[<?php echo $question_id; ?>]" value="2">
                            <label for="option_b"><?php echo $option_b; ?></label>
                        </div>
                        <div class="container py-3">
                            <input type="radio" name="option[<?php echo $question_id; ?>]" value="3">
                            <label for="option_c"><?php echo $option_c; ?></label>
                        </div>
                        <div class="container py-3">
                            <input type="radio" name="option[<?php echo $question_id; ?>]" value="4">
                            <label for="option_d"><?php echo $option_d; ?></label>
                        </div>
                        <div class="container py-3">
                            <input type="radio" name="option[<?php echo $question_id; ?>]" value="null" checked
                                style="display:none;">
                        </div>
                        <?php
                                if ($option_e) {
                                    echo '<div class="container py-3">
                                <input type="radio" name="option[' . $question_id . ']"  value="e">
                                <label for="option_e">' . $option_e . '</label>
                                </div>  ';
                                }
                                ?>
                    </div>
                    <div class="text-center py-3">
                        <!-- <input type="button" name="previous" class="previous btn btn-default" value="Previous" /> -->
                        <input type="button" name="next" class="next btn btn-outline-primary" value="Next" />
                    </div>
            </fieldset>
            <?php
                }
            
            ?>
    </div>
    <div class="container text-center py-3">

        <button type="submit" class="btn btn-danger">Submit</button>
    </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <script>
    window.onbeforeunload = function(e) {
        e = e || window.event;

        // For IE and Firefox prior to version 4
        if (e) {
            e.returnValue = 'Sure?';
        }

        // For Safari
        return 'Sure?';
    };


    $(document).ready(function() {
        var current = 0,
            current_step, next_step, steps;
        steps = $("fieldset").length;
        $(".next").click(function() {
            current_step = $(this).closest("fieldset");
            next_step = $(this).closest("fieldset").next();
            next_step.show();
            current_step.hide();
            setProgressBar(++current);
        });
        $(".previous").click(function() {
            current_step = $(this).closest("fieldset");
            next_step = $(this).closest("fieldset")
            next_step.show();
            current_step.hide();
            setProgressBar(--current);
        });
        setProgressBar(current);
        // Change progress bar action
        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
                .html(percent + "%");
        }
    });
    </script>
</body>

</html>