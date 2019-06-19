<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

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
