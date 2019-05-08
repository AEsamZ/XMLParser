<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$employees=  simplexml_load_file('employees.xml') or die("failed");
if(isset($_GET['action'])){            
    $name=$_GET['name'];
    $index=0;
    $i=0;
    foreach ($employees->employee as $emp){
        if($emp->name==$_GET['name']){
            $index=$i;
            break;
        }
        $i++;
    }
     unset($employees->employee[$index]);
    file_put_contents('employees.xml', $employees->asXML());
    header('location:index.php');
}
?>
<?php  $employees=  simplexml_load_file('employees.xml') or die("failed"); ?>
<html>
    <head>
    <style>
#employees {font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  
}

#employees td, #employees th {
  border: 1px solid #ddd;
  padding: 8px;
}

#employees tr:nth-child(even){background-color: #f2f2f2;}

#employees tr:hover {background-color: #ddd;}

#employees th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
    </style></head>
    <body>
        <table id="employees">
    <tr>
        <th>name</th>
        <th>phone</th>
        <th>address</th>
        <th>email</th>
        <th>option</th>
    </tr>
    <?php foreach ($employees->employee as $emp){ ?>
    <tr>
        <td><?php echo $emp->name;?></td>
        <td><?php echo $emp->phones->phone;?></td>
        <td><?php echo $emp->addresses->address->city;?></td>
        <td><?php echo $emp->e_mail;?></td>
        <td><a href="updateemp.php?name=<?php echo $emp->name; ?>">update</a> or 
            <a href="index.php?action=delete&name=<?php echo $emp->name; ?>">delete</a></td>
    </tr>
    <?php } ?>
</table>
<br>
<a href="addemp.php">add new employee </a>
<br>
    </body>
</html>
