<?php
$employees=  simplexml_load_file('employees.xml') or die ('failed');
if(isset($_POST['Save'])){   
    foreach ($employees->employee as $emp){
        if($emp->name ==$_GET['name']){
            $emp->name=$_POST['name'];
            $emp->addresses->address->city=$_POST['city'];
            $emp->phones->phone=$_POST['phone'];
            $emp->e_mail=$_POST['email'];            
            break;
        }        
    }
    file_put_contents('employees.xml', $employees->asXML());
    header('location:index.php');
}
foreach ($employees->employee as $emp){
    if($emp->name==$_GET['name']){        
        $name=$emp->name;
        $city=$emp->addresses->address->city;
        $email=$emp->e_mail;
        $phone=$emp->phones->phone;
        break;
    }
}
?>
<a href="index.php">Home</a>
<form method="post">
    <table font-family:>
        <tr>
            <td>Name</td>
            <td><input type="text" value="<?php echo $name; ?>" name="name"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" value="<?php echo $phone; ?>" name="phone"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" value="<?php echo $city; ?>" name="city"></td>
        </tr>   
        <tr>
            <td>Email</td>
            <td><input type="email" value="<?php echo $email; ?>" name="email"></td>
        </tr>
        <td><input type="submit" value="Save" name="Save"></td>
    </table>
</form>