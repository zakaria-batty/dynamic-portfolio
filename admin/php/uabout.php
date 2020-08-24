<?php
include('../../include/db.php');
if (isset($_POST['save'])) {
    $heading = mysqli_real_escape_string($db, $_POST['ptitle']);
    $subheading = mysqli_real_escape_string($db, $_POST['psubtitle']);
    $shortdesc = mysqli_real_escape_string($db, $_POST['shortdesc']);
    $longdesc = mysqli_real_escape_string($db, $_POST['longdesc']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $website = mysqli_real_escape_string($db, $_POST['website']);
    $query = "UPDATE aboutus_setup SET ";
    $query .= "shortdesc='$shortdesc',";
    $query .= "heading='$heading',";
    $query .= "subheading='$subheading',";
    $query .= "dob='$dob',";
    $query .= "website='$website',";
    $query .= "longdesc='$longdesc' WHERE 1";
    echo $query;
    $queryrun = mysqli_query($db, $query);
    if ($queryrun) {
        header("location:../?editabout=true&msg=updated");
    }
}

if (isset($_POST['save'])) {
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $Age = mysqli_real_escape_string($db, $_POST['age']);
    $website = mysqli_real_escape_string($db, $_POST['website']);
    $Degree = mysqli_real_escape_string($db, $_POST['Degree']);
    $Phone = mysqli_real_escape_string($db, $_POST['Phone']);
    $Email = mysqli_real_escape_string($db, $_POST['Email']);
    $City = mysqli_real_escape_string($db, $_POST['City']);
    $query1 = "UPDATE  userinfo SET ";
    $query1 .= "Birthday='$shortdesc',";
    $query1 .= "Age='$Age',";
    $query1 .= "Website='$website',";
    $query1 .= "Degree='$Degree',";
    $query1 .= "Phone='$Phone',";
    $query1 .= "Email='$Email',";
    $query1 .= "City='$City'";
    echo $query1;
    $queryrun1 = mysqli_query($db, $query1);
    if ($queryrun1) {
        header("location:../?editabout=true&msg=updated");
    }
}
