<? 
/**
 * Copyright (C) 2018 Jesus MARTÍN ABAD - Universidad Internacional de la Rioja
 * Curso de Adaptación a Grado en Ingeniería Informática

 * This program is free software: you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License as published by the Free
 * Software Foundation, either version 3 of the License, or (at your option) any
 * later version.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */
?>


<?php
$conn = mysqli_connect("localhost","notas","notas","notas");
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
    
    
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $name = "";
                if(isset($Row[0])) {
                    $name = mysqli_real_escape_string($conn,$Row[0]);
                }
                
                $description = "";
                if(isset($Row[1])) {
                    $description = mysqli_real_escape_string($conn,$Row[1]);
                }

                 $num = "";
                if(isset($Row[1])) {
                    $num = mysqli_real_escape_string($conn,$Row[2]);
                }

                 $cod_user = "";
                if(isset($Row[1])) {
                    $cod_user = mysqli_real_escape_string($conn,$Row[3]);
                }

                 $cod_subject = "";
                if(isset($Row[1])) {
                    $cod_subject = mysqli_real_escape_string($conn,$Row[4]);
                }

                 $distance = "";
                if(isset($Row[1])) {
                    $distance = mysqli_real_escape_string($conn,$Row[5]);
                }

                 $presence = "";
                if(isset($Row[1])) {
                    $presence = mysqli_real_escape_string($conn,$Row[6]);
                }


                
                if (!empty($name) || !empty($description)) {
                    $query = "insert into marks(cod_course,sec,num,cod_user,cod_subject,distance,presence) values('".$name."','".$description."','".$num."','".$cod_user."','".$cod_subject."','".$distance."','".$presence."'  )";

                 
                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}
?>

<!DOCTYPE html>
<html>    
<head>
<style>    
body {
	font-family: Arial;
	width: 550px;
}

.outer-container {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	padding: 40px 20px;
	border-radius: 2px;
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
    border-radius: 2px;
	color: #f0f0f0;
	cursor: pointer;
    padding: 5px 20px;
    font-size:0.9em;
}

.tutorial-table {
    margin-top: 40px;
    font-size: 0.8em;
	border-collapse: collapse;
	width: 100%;
}

.tutorial-table th {
    background: #f0f0f0;
    border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

.tutorial-table td {
    background: #FFF;
	border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

#response {
    padding: 10px;
    margin-top: 10px;
    border-radius: 2px;
    display:none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}

.content, #actions-sidebar {

    margin-bottom: -99999px;
    padding-bottom: 99999px;

}
#actions-sidebar {

    background: #fafafa;

}

.large-3 {

    width: 25%;

}




</style>
</head>

<body style="margin: 0 auto;">


<div class="users view large-9 medium-8 columns content">
    
    <div class="outer-container">
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Seleccionar fichero
                    </label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Cargar</button>
        
            </div>
        
        </form>
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         
<?php
    $sqlSelect = "SELECT * FROM MARKS";
    $result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0)
{
?>
        
    <table class='tutorial-table'>
        <thead>
            <tr>
                <th>Curso</th>
                <th>Seccion</th>
                <th>Numero</th>
                <th>DNI</th>
                <th>Asignatura</th>
                <th>Distancia</th>
                <th>Presencia</th>

            </tr>
        </thead>
<?php
    while ($row = mysqli_fetch_array($result)) {
?>                  
        <tbody>
        <tr>
            <td><?php  echo $row['cod_course']; ?></td>
            <td><?php  echo $row['sec']; ?></td>
             <td><?php  echo $row['num']; ?></td>
              <td><?php  echo $row['cod_user']; ?></td>
               <td><?php  echo $row['cod_subject']; ?></td>
                <td><?php  echo $row['distance']; ?></td>
                 <td><?php  echo $row['presence']; ?></td>
        </tr>
<?php
    }
?>
        </tbody>
    </table>
<?php 
} 
?>
</div>
</body>
</html>