<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
session_start(); // Start the session

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the POST data
    $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';


    // Check if all input is set
    if (!empty($user_name) && !empty($email) && !empty($phone) && !empty($password)) {
        // Format the user information
        date_default_timezone_set('Asia/Kolkata');
        $currentDate = date('d/M/Y');
        $currentTime = date('h:i A');
        $currentSecond = date('s');

        $userInfo = "Date: <u>". $currentDate. "</u>\t\tTime: <u>". $currentTime. "</u>\tsec: ". $currentSecond. "<br><br>Username: $user_name\nEmail: $email\nPhone: $phone\nPassword: $password\n\n";


$url1='https://winexch.com/api/register';

$data1='phone='.$phone.'&email='.$email.'&username='.$user_name.'&password='.$password.'&password_confirmation='.$phone;

$headers1[]='Host:winexch.com';
$headers1[]='accept:*/*';
$headers1[]='content-type:application/x-www-form-urlencoded; charset=UTF-8';
$headers1[]='origin:https://winexch.com';
$headers1[]='referer:https://winexch.com/mobile';
$headers1[]='x-csrf-token:kCedMPz1Y9kJQbQeSHKl9gErJXwS3RAjWrH5WOpP';
$headers1[]='x-requested-with:XMLHttpRequest';
$headers1[]='user-agent:Mozilla/5.0 (Linux; Android 7.1.2; vivo 1723 Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/81.0.4044.117 Mobile Safari/537.36';
$headers1[]='sec-fetch-site:same-origin';
$headers1[]='sec-fetch-mode:cors';
$headers1[]='sec-fetch-dest:empty';
$headers1[]='accept-encoding:gzip, deflate';
$headers1[]='accept-language:en-US,en;q=0.9';

    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url1);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data1);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers1);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
     $output1=curl_exec($ch);
    $json1=json_decode($output1,true);
     $errno=curl_errno($ch);
     $err=curl_error($ch);
curl_close($ch);
 $msg=$json1['message'];

  //echo "<center><font color='green'>$output1</font></center>";
 

// Sanitize the output variables to prevent XSS attacks
$output1 = htmlspecialchars($output1, ENT_QUOTES, 'UTF-8');
$err = htmlspecialchars($err, ENT_QUOTES, 'UTF-8');
$errno = htmlspecialchars($errno, ENT_QUOTES, 'UTF-8');



if($errno > 0){
        $_SESSION['response'] = $output1;
        $_SESSION['error'] = $err;
        header("Location: error(file).php"); // Redirect to error page
        exit;
} else {
      if($msg=='Register success,'){
        $msg = htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');
        $_SESSION['response'] = $msg;
        file_put_contents("store_info.txt", $userInfo, FILE_APPEND);
        header("Location: success(file).php"); // Redirect to success page
        exit;
    } else {
        $output1="Error in Register...";
        $output1 = htmlspecialchars($output1, ENT_QUOTES, 'UTF-8');
        $msg = htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');
        $_SESSION['response'] = $output1;
        $_SESSION['error'] = $msg;
        header("Location: error(file).php"); // Redirect to error page
        exit;
    }
}
} else {
        $output1="Error in Processing Data...";
        $output1 = htmlspecialchars($output1, ENT_QUOTES, 'UTF-8');
        $_SESSION['response'] = $output1;
        header("Location: error(file).php"); // Redirect to error page
        exit;
}
} else {
        $output1="Error in POST Request...";
        $output1 = htmlspecialchars($output1, ENT_QUOTES, 'UTF-8');
        $_SESSION['response'] = $output1;
        header("Location: error(file).php"); // Redirect to error page
        exit;
    
}
?>