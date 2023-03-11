<?php

function active_seller($data)
{
    global $conn;
    $username = $data['username'];

    mysqli_query($conn, "UPDATE tbl_seller SET status='Active' WHERE username='$username'");
    return mysqli_affected_rows($conn);
}

function hapus_seller($data)
{
    global $conn;
    $username = $data['username'];
    $image_profile = $data['image_profile'];
    unlink("../asset/img/$image_profile");
    mysqli_query($conn, "DELETE FROM tbl_seller WHERE username='$username'");
    return mysqli_affected_rows($conn);
}

?>