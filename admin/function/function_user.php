<?php
function active_user($data)
{
    global $conn;
    $username = $data['username'];

    mysqli_query($conn, "UPDATE tbl_user SET status='Active' WHERE username='$username'");
    return mysqli_affected_rows($conn);
}

function hapus_user($data)
{
    global $conn;
    $username = $data['username'];
    $image_profile = $data['image_profile'];
    unlink("../asset/img/$image_profile");
    mysqli_query($conn, "DELETE FROM tbl_user WHERE username='$username'");
    return mysqli_affected_rows($conn);
}

?>