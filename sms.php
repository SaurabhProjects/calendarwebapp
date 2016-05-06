<?php include 'dbconnect.php' ?>


<?php
   ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require 'class-Clockwork.php';
    $apikey="8eff80e497eb2b5855fe14419c812d9bba604eed";
    $clockwork = new Clockwork($apikey);

    $date = date("n/j/Y");
    $time = date("H:i");
    $mod_Time = strtotime($time."+ 10 minutes");
    $newTime = date("H:i",$mod_Time);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    $sql = "SELECT * FROM event WHERE eventDate='$date' AND eventTime ='$newTime'" ;
    
    $query = mysqli_query($conn,$sql) or die(mysqli_error());
    $count = mysqli_num_rows($query);
    echo"$sql";
    echo"$count";
  
    if ($count >= 1)
    {
            while($row = mysqli_fetch_array($query))
            {
                    $ID = $row["id"];
                    $schedule_title = $row["title"];
                    $schedule_description = $row["detail"];
                    $eventDate = $row["eventDate"];
                    $evenTime = $row["eventTime"];
                    $userId = $row["user_id"];

                    $sms = 'Hi your current scheudle, schedule title:' .$schedule_title.', Schudle description:' .$schedule_description.', event date:'.$eventDate.', event time:'.$evenTime.'.';

                     $sendSMS = true;
            }
             if($sendSMS)
                    {  
                        $users = "SELECT * FROM users WHERE smsconfirm ='1' AND id ='$userId'" ;
                        $queryUsers = mysqli_query($conn,$users) or die(mysqli_error());
                        $userCount = mysqli_num_rows($queryUsers);
                        

                         if ($userCount >= 1)
                            {
                                while($rowu = mysqli_fetch_array($queryUsers))
                                {

                                     $message = array (
                                                        'to' => $rowu['phoneno'],
                                                        'message'=> $sms

                                                        );
                                     $done = $clockwork -> send ($message);
                                       }   
                            }
                    }

    }

?>

