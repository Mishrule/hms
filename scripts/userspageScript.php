<?php
include_once('../dbconfiguration.php');

$output = '';
if (isset($_POST["view"])) {
    $viewSQL = "SELECT * FROM useraccount";
    $viewResult = mysqli_query($conn, $viewSQL);

    $output .= '
        <table class="table table-responsive table-hover">
            <thead>
                <th>No:</th>
                <th>Username</th>
                <th>Password</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Controls</th>
            </thead>
    ';
    $num_row = mysqli_num_rows($viewResult);
    if ($num_row > 0) {
        $num = 1;
        while ($row = mysqli_fetch_array($viewResult)) {
            $output .= '
                <tr>
                    <td>' . $num . '</td>
                    <td>' . $row["username"] . '</td>
                    <td>' . $row["pass"] . '</td>
                    <td>' . $row["question"] . '</td>
                    <td>' . $row["answer"] . '</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm update" id="' . $row["username"] . '" name="' . $row["username"] . '" value="' . $row["username"] . '" data-toggle="modal" data-target="#userModel">Update</button>

                        <button type="button" class="btn btn-danger btn-sm del" id="' . $row["username"] . '" name="' . $row["username"] . '" value="' . $row["username"] . '">Delete</button>
                    </td>
                </tr>
            ';
            $num++;
        }
    } else {
        $output .= '<tr>
            <td>Sorry No User Found</td>
        </tr>';
    }

    $output .= '</table>';
    echo $output;
}

//====================================== SET VALUES TO TABLE

if (isset($_POST["id"])) {
    $idOutput = array();
    $idUser = mysqli_real_escape_string($conn, $_POST["id"]);
    $idSql = "SELECT * FROM useraccount WHERE username ='$idUser'";
    $idResult = mysqli_query($conn, $idSql);
    while ($rows = mysqli_fetch_array($idResult)) {
        $idOutput['username'] = $rows["username"];
        $idOutput['pass'] = $rows["pass"];
        $idOutput['question'] = $rows["question"];
        $idOutput['ans'] = $rows["answer"];
    }
    echo json_encode($idOutput);
}

//================================== UPDATE
if (isset($_POST["save"])) {
    $upName = mysqli_real_escape_string($conn, $_POST["upName"]);
    $upPass = mysqli_real_escape_string($conn, $_POST["upPass"]);
    $upQuestion = mysqli_real_escape_string($conn, $_POST["upQuestion"]);
    $upAnswer = mysqli_real_escape_string($conn, $_POST["upSecurity"]);

    $upSql = "UPDATE useraccount SET pass='$upPass', question='upQuestion', answer='$upAnswer' WHERE username='$upName'";
    $upResult = mysqli_query($conn, $upSql);

    if ($upResult) {
        echo 'User Info Updated Successfully';
    } else {
        echo 'Oops Something went wrong Try again';
    }
}

//================================= DELETE
if (isset($_POST["del"])) {
    $del = $_POST["del"];

    $delSQL = "DELETE FROM useraccount WHERE username='$del'";
    $delResult = mysqli_query($conn, $delSQL);

    if ($delResult) {
        echo "USER DELETED SUCCESSFULLY";
    } else {
        echo "Fail to delete Try Again";
    }
}
?>