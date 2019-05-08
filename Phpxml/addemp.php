<?php
if(isset($_POST['Save'])){
    $employees=  simplexml_load_file('employees.xml') or die('failed to load');
    $emp=$employees->addChild('employee');
    $name=$emp->addChild('name',$_POST['name']);
    $phones=$emp->addChild('phones');
    $addresses=$emp->addChild('addresses');   
    $phon=$phones->addChild('phone',$_POST['phone']);
    $addr=$addresses->addChild('address');
    $city=$addr->addChild('city',$_POST['city']);
    $email=$emp->addChild('e_mail',$_POST['email']);
    file_put_contents('employees.xml', $employees->asXML());
    header('location:index.php');
}
?>
<a href="index.php">Home</a>
<form method="post">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" name="phone"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="city"></td>
        </tr>   
        <tr>
            <td>Email</td>
            <td><input type="email" name="email"></td>
        </tr>
        <td><input type="submit" value="Save" name="Save"></td>
    </table>
</form>