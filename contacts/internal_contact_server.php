<?php
// initializing variables
$name = "";
$email= "";
$phone="";
$function="";
$description="";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'crosspoints');

// new contact
if (isset($_POST['submit'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $function = mysqli_real_escape_string($db, $_POST['function']);
    $description = mysqli_real_escape_string($db, $_POST['description']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($name)) { array_push($errors, "Naam is verplicht"); }
    if (empty($email)) { array_push($errors, "Email is verplicht"); }
    if (empty($phone)) { array_push($errors, "Telefoonnummer is verplicht"); }
    if (empty($function)) { array_push($errors, "Functie is verplicht"); }


    // first check the database to make sure
    // a contact does not already exist with the same name
    $user_check_query = "SELECT * FROM internal_contacts WHERE name ='$name' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if ($user){
        array(array_push($errors,"Contactpersoon bestaat al"));
    }

    // Finally, make appointment if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO internal_contacts (name, email, phone, function, description) 
  			  VALUES('$name', '$email', '$phone','$function', '$description')";
        mysqli_query($db, $query);
        header('location: internal_contacts.php');
    }
}

