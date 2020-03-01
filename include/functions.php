<?php require_once("include/DB.php"); ?>
<?php
function Redirect_to($New_Location)
{
    header("Location:" . $New_Location);
    exit;
}

function Password_Encryption($Password)
{
    $BlowFish_Hash_Format = "$2y$10$";
    $Salt_length = 255;
    $Salt = Generate_Salt($Salt_length);
    $Formating_Blowfish_With_Salt = $BlowFish_Hash_Format . $Salt;
    $Hash = crypt($Password, $Formating_Blowfish_With_Salt);
    return $Hash;
}
function Generate_Salt($lenght)
{
    $Unique_Random_String = md5(uniqid(mt_rand(109890, 1000000000), true));
    $Base64_String = base64_encode($Unique_Random_String);
    $Modified_Base64_String = str_replace('+', '.', $Base64_String);
    $Salt = substr($Modified_Base64_String, 0, $lenght);
    return $Salt;
}
function Password_Check($Password, $Existing_Hash)
{
    $Hash = crypt($Password, $Existing_Hash);
    if ($Hash == $Existing_Hash) {
        return true;
    } else {
        return false;
    }
}

function CheckUserNamenDB($Email)
{
    global $ConnectingDB;
    $stmt = "SELECT * FROM adm WHERE email='$Email'";
    $Result = mysqli_query($ConnectingDB, $stmt);
    if (mysqli_num_rows($Result) > 0) {
        return true;
    } else {
        return false;
    }
}

function Login_Check($Email, $Password)
{
    global $ConnectingDB;
    $stmt = "SELECT * FROM adm WHERE email='$Email'";
    //$stmt->bindValue(':userName',$UserName);
    $Execute = mysqli_query($ConnectingDB, $stmt);
    //$Result =mysqli_fetch_assoc($Execute);
    if ($Result = mysqli_fetch_assoc($Execute)) {
        if (Password_Check($Password, $Result["password"])) {
            return $Result;
        }
    } else {
        return null;
    }
}


function Login()
{
    if (isset($_SESSION["UserId"])) {
        return true;
    }
}
function Confirm_Login()
{
    if (!Login()) {
        $_SESSION["ErrorMsg"] = "Logg inn  er kreved! ";
        Redirect_to("login.php");
    }
}

function about()
{
    global $ConnectingDB;
    $stmt = "SELECT COUNT(*) FROM about";
    $stmt = mysqli_query($ConnectingDB, $stmt);
    $TotalRows = $stmt->fetch_assoc();
    $TotalPosts = array_shift($TotalRows);
    echo $TotalPosts;
}

function users()
{
    global $ConnectingDB;
    $stmt = "SELECT COUNT(*) FROM adm";
    $stmt = mysqli_query($ConnectingDB, $stmt);
    $TotalRows = $stmt->fetch_assoc();
    $TotalPosts = array_shift($TotalRows);
    echo $TotalPosts;
}

?>