
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>My First PHP</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</head>
<body>
<?php


class createTable {

  public function createTable(){
    $row = 1;
    if (($handle = fopen("FL_insurance_sample.csv", "r")) !== FALSE) {
        echo '<table border="1" class="table table-striped">';
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            if ($row == 1) {
                echo '<thead class="thead-dark"><tr>';
            }else{
                echo '<tr>';
            }

            for ($c=0; $c < $num; $c++) {
                if(empty($data[$c])) {
                   $value = "&nbsp;";
                }else{
                   $value = $data[$c];
                }
                if ($row == 1) {
                    echo '<th>'.$value.'</th>';
                }else{
                    echo '<td>'.$value.'</td>';
                }
            }
            if ($row == 1) {
                echo '</tr></thead><tbody>';
            }else{
                echo '</tr>';
            }
            $row++;
        }

        echo '</tbody></table>';
        fclose($handle);
    }

  }
}

$obj = new createTable;
$obj.createTable();

?>
  </body>
</html>
