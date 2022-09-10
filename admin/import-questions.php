<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container">
        <h1>Import Questions</h1>
    </div>
    <div class="container my-3">
        <form action="import-questions.php" method="post" enctype="multipart/form-data">
            <label class="form-label" for="customFile">Choose Excel file only </label>
            <input type="file" class="form-control" id="questions_file" name="questions_file" />
            <label for="submit" class="submit my-3">
                <button class="btn btn-primary" name="submit">Submit</button>
            </label>
        </form>
    </div>
    <div class="container">

        <?php
        if (isset($_POST['submit'])) {
            if (isset($_FILES['questions_file']['name']) && $_FILES['questions_file']['name'] != "") {
                $allowedExtensions = array("xls", "xlsx", "csv");
                $ext = pathinfo($_FILES['questions_file']['name'], PATHINFO_EXTENSION);

                if (in_array($ext, $allowedExtensions)) {
                    // Uploaded file
                    $file = "uploads/" . $_FILES['questions_file']['name'];
                    $isUploaded = copy($_FILES['questions_file']['tmp_name'], $file);
                    // check uploaded file
                    if ($isUploaded) {
                        // Include PHPExcel files and database configuration file
                        include("dbconnect.php");
                        require_once __DIR__ . '\vendor\autoload.php';
                        include(__DIR__ . '\vendor\phpoffice\phpexcel\Classes\PHPExcel\IOFactory.php');
                        try {
                            // load uploaded file
                            $objPHPExcel = PHPExcel_IOFactory::load($file);
                        } catch (Exception $e) {
                            die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME) . '": ' . $e->getMessage());
                        }

                        // Specify the excel sheet index
                        $sheet = $objPHPExcel->getSheet(0);
                        $total_rows = $sheet->getHighestRow();
                        $highestColumn      = $sheet->getHighestColumn();
                        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

                        //	loop over the rows

                        $html = '<div class="container">
                        <div class="row py-5">
                        <div class="col-lg-10 mx-auto">
                        <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                        <div class="table-responsive">';
                        $html .= '<table id="question_table" style="width:100%" class="table table-striped table-bordered">';
                        $html .= "<thead><tr>
                        <th  scope='col'>Category</th>
                        <th  scope='col'>Question</th>
                        <th  scope='col'>Question Type</th>
                        <th  scope='col'>Option a</th>
                        <th  scope='col'>Option b</th>
                        <th  scope='col'>Option c</th>
                        <th  scope='col'>Option d</th>
                        <th  scope='col'>Answer</th>
                        </tr></thead>";
                        for ($row = 2; $row <= $total_rows; ++$row) {
                            for ($col = 0; $col < $highestColumnIndex; ++$col) {
                                $cell = $sheet->getCellByColumnAndRow($col, $row);
                                $val = $cell->getValue();
                                $records[$row][$col] = $val;
                            }
                        }

                        foreach ($records as $row) {
                            // HTML content to render on webpage
                            // Insert into database
                            $html .= "<tr>";
                            $category = isset($row[0]) ? $row[0] : '';
                            $question = isset($row[1]) ? $row[1] : '';
                            $question_type = '1';
                            $option_a = isset($row[3]) ? $row[3] : '';
                            $option_b = isset($row[4]) ? $row[4] : '';
                            $option_c = isset($row[5]) ? $row[5] : '';
                            $option_d = isset($row[6]) ? $row[6] : '';
                            $answer = isset($row[7]) ? $row[7] : '';
                            $html .= "<td>" . $category . "</td>";
                            $html .= "<td>" . $question . "</td>";
                            $html .= "<td>" . $question_type . "</td>";
                            $html .= "<td>" . $option_a . "</td>";
                            $html .= "<td>" . $option_b . "</td>";
                            $html .= "<td>" . $option_c . "</td>";
                            $html .= "<td>" . $option_d . "</td>";
                            $html .= "<td>" . $answer . "</td>";
                            $html .= "</tr>";
                            if (
                                !(empty($category)) && !(empty($question)) && !(empty($question_type))
                                && !(empty($option_a)) && !(empty($option_b)) && !(empty($option_c))
                                && !(empty($option_d)) && !(empty($answer))
                            ) {
                                $query = "INSERT INTO question (`category`, `question`, `question_type`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) 
                                values('" . $category . "','" . $question . "','" . $question_type . "','" . $option_a . "','" . $option_b . "', '" . $option_c . "', '" . $option_d . "', '" . $answer . "')";
                                $link->query($query);
                            }
                        }
                        $html .= "</table>";
                        $html .= "</div></div></div></div></div></div>";
                        echo $html;
                        echo '<a href="questions.php" class="btn btn-primary">View all Questions<a>';
                        echo "<script>alert('Data inserted in Database')</script>";
                        unlink($file);
                    } else {
                        echo '<div class="alert alert-danger alert-dismissable fade show" role="alert">File not uploaded!</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger alert-dismissable fade show" role="alert">Please Upload excel sheet.</div>';
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissable fade show" role="alert">Please upload excel file.</div>';
            }
        } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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