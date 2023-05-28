<?php
    // Read the variables sent via POST from our API
    $sessionId   = $_POST["sessionId"];
    $serviceCode = $_POST["serviceCode"];
    $phoneNumber = $_POST["phoneNumber"];
    $text        = $_POST["text"];

    include($_SERVER['DOCUMENT_ROOT']."/connectdb.php");

    // Database interaction with USSD
    $sql = "SELECT * FROM `phone` WHERE phone_number = '".$phoneNumber."' ";
    // // $resultSet = mysqli_query($conn, $sql);
    // // $isValidlogin = mysqli_num_rows($resultSet);
    // if ($isValidlogin =< 0) {
    //     // add to database
    //     $sql_insert = "INSERT INTO `phone` (`phone_number`, `airtime`, `data`, `voice_bundles`, `sms`) VALUES ('".$phoneNumber."', '0', '0', '0', '0')";
    // }

    // $userDetails = mysqli_fetch_assoc($resultSet);

    // Variables used in the USSD
    // $phone = $userDetails['phone_number'];
    // $airtime = $userDetails['airtime'];
    // $data = $userDetails['data'];
    // $voice = $userDetails['voice_bundles'];
    // $sms = $userDetails['sms'];

    if ($text == "") {
        // This is the first request.
        $response  = "CON 1. Balances \n";
        $response .= "2. Buy Bundles \n";
        $response .= "3. Airtime Advance \n";
        $response .= "4. M-Pesa \n";
        $response .= "5. NXL LVL(Youth)\n";
        $response .= "6. Just 4 U \n";
        $response .= "7. Self Service \n";
        $response .= "8. Entertanment \n";
        $response .= "9. Customer Preferences \n";
        $response .= "10. Mega Jackpot \n";

    } elseif ($text == "1") {
        // Balances
        $response = "CON 1. Summary \n";
        $response .= "2. Detailed \n";

    } elseif ($text =="1*1") {
        // Summary include database queries to get the right amount
        $response = "END Airtime is M$airtime.00; Data is $data.00Mb; Voice is $voice Minutes 0 Sec; SMS $sms \n";

    } elseif ($text == "1*2") {
        // Detailed
        // Send a summary to your phone
        $response = "END Detailed balances will be sent to you shortly via SMS \n";
        // Include function that sends text messages

    } elseif ($text == "2") {
        // Buy Bundles
        $response = "CON 1. Buy For Myself \n";
        $response .= "2. Buy For Others \n ";

    } elseif ($text == "2*1") {
        // Buy Bundles for Myself
        $response = "CON  0. Hot Deals \n";
        $response .= "1. Voice Bundles \n";
        $response .= "2. Data Bundles \n";
        $response .= "3. Roaming Bundles \n";
        $response .= "4. Sms Bundles \n";

    } elseif ($text == "2*1*0") {

        // H O T    D E A L S
        $response = "CON  1. More Deals \n";

    } elseif ($text == "2*1*0*1") {
        // Sample deals offered by vodacom
        $response = "CON  1. 3.5 GB valid for 7days at M85.00 Hot Deals \n";
        $response .= "2. 26 VCL to VCL mins valid for 1hrs at M2.00 \n";
        $response .= "3. 45MB valid for 1hrs at M0.90 \n";

    } elseif ($text == "2*1*0*1*1") {
        // Cannot buy this is for testing purpose try buying voice, data, or Sms bundles
        $response = "END Cannot buy this is for testing purpose try buying voice, data, or Sms bundles. \n";

    } elseif ($text == "2*1*0*1*2") {
        // Cannot buy this is for testing purpose try buying voice, data, or Sms bundles
        $response = "END Cannot buy this is for testing purpose try buying voice, data, or Sms bundles. \n";

    } elseif ($text == "2*1*0*1*3") {
        // Cannot buy this is for testing purpose try buying voice, data, or Sms bundles
        $response = "END Cannot buy this is for testing purpose try buying voice, data, or Sms bundles. \n";

    } elseif ($text == "2*1*1") {

        // V O I C E    B U N D L E S
        // Calling Bundles
        $response = "CON  1. Daily Calling Bundles \n";
        $response .= "2. Weekly Calling Bundles \n";
        $response .= "3. Monthly Calling Bundles \n";

    } elseif ($text == "2*1*1*1") {
        // Daily Calling Bundles
        $response = "CON  0. J4U calling bundles 26 VCL to VCL mins valid for 1hrs at M2.00 \n";
        $response .= "1. M2 for 4 All Net Minutes \n";
        $response .= "2. M3 for 7 All Net Minutes \n";
        $response .= "3. M5 for 12 All Net Minutes \n";
        $response .= "5. Next \n";

    } elseif ($text == "2*1*1*1*0") {
        // Confirm option 0
        $response = "CON You have requested J4U calling bundles 26 VCL to VCL mins valid for 1hrs at M2.00 ";
        $response .= "1. Confirm \n ";
        $response .= "0. Back \n ";

    } elseif ($text == "2*1*1*1*0*1") {
        // Confirmed option 0
        if ($airtime < 2) {
            // Disallow buying
            $response = "END Insuficient funds please recharge your account.";
        }
        // $buying_airtime = $airtime - 2;
        // $sql_buying_airtime = "UPDATE `phone` SET `airtime` = '$bought_bundles' WHERE `phone`.`phone_number` = '".$phoneNumber."' ";
        // $bought_bundles = $voice + 26;
        // $sql_buy = "UPDATE `phone` SET `voice_bundles` = '$bought_bundles' WHERE `phone`.`phone_number` = '".$phoneNumber."' ";
        $response = "END You have bought J4U calling bundles 26 VCL to VCL mins valid for 1hrs at M2.00";

    } elseif ($text == "2*1*1*1*1") {
        // Confirm option 1
        $response = "You have requested M2 for 4 All Net Minutes valid until 00:00 to buy ";
        $response .= "1. Confirm \n ";
        $response .= "0. Back \n ";

    } elseif ($text == "2*1*1*1*1*1") {
        // Confirmed option 1
        if ($airtime < 2) {
            // Disallow buying
            $response = "END Insuficient funds please recharge your account.";
        }
        // $buying_airtime = $airtime - 2;
        // $sql_buying_airtime = "UPDATE `phone` SET `airtime` = '$bought_bundles' WHERE `phone`.`phone_number` = '".$phoneNumber."' ";
        // $bought_bundles = $voice + 4;
        // $sql_buy = "UPDATE `phone` SET `voice_bundles` = '$bought_bundles' WHERE `phone`.`phone_number` = '".$phoneNumber."' ";
        $response = "END You have bought M2 for 4 All Net Minutes valid until 00:00";

    } elseif ($text == "2*1*1*1*2") {
        // Confirm option 2
        $response = "CON You have requested M3 for 7 All Net Minutes valid until 00:00 to buy ";
        $response .= "1. Confirm \n ";
        $response .= "0. Back \n ";

    } elseif ($text == "2*1*1*1*2*1") {
        // Confirmed option 2
        if ($airtime < 3) {
            // Disallow buying
            $response = "END Insuficient funds please recharge your account.";
        }
        // $buying_airtime = $airtime - 3;
        // $sql_buying_airtime = "UPDATE `phone` SET `airtime` = '$bought_bundles' WHERE `phone`.`phone_number` = '".$phoneNumber."' ";
        // $bought_bundles = $voice + 7;
        // $sql_buy = "UPDATE `phone` SET `voice_bundles` = '$bought_bundles' WHERE `phone`.`phone_number` = '".$phoneNumber."' ";
        $response = "END You have bought M3 for 7 All Net Minutes valid until 00:00";

    } elseif ($text == "2*1*1*1*3") {
        // Confirm option 3
        $response = "CON You have requested M5 for 12 All Net Minutes valid until 00:00 to buy ";
        $response .= "1. Confirm \n ";
        $response .= "0. Back \n ";

    } elseif ($text == "2*1*1*1*3*1") {
        // Confirmed option 3
        if ($airtime < 5) {
            // Disallow buying
            $response = "END Insuficient funds please recharge your account.";
        }
        // $buying_airtime = $airtime - 5;
        // $sql_buying_airtime = "UPDATE `phone` SET `airtime` = '$bought_bundles' WHERE `phone`.`phone_number` = '".$phoneNumber."' ";
        // $bought_bundles = $voice + 12;
        // $sql_buy = "UPDATE `phone` SET `voice_bundles` = '$bought_bundles' WHERE `phone`.`phone_number` = '".$phoneNumber."' ";
        $response = "END You have bought M5 for 12 All Net Minutes valid until 00:00";

    } elseif ($text == "2*1*1*1*5") {
        // Confirm option 5
        // Next Page
        $response .= "1. M7 for 14 All Net Minutes \n";
        $response .= "2. M10 for 20 All Net Minutes \n";
        $response .= "3. M12 for 25 All Net Minutes \n";

    } elseif ($text == "2*1*1*1*5*1") {
        // Cannot buy here functionality already exist on the first page
        $response = "END Cannot buy, just use the first 3 options. \n";

    } elseif ($text == "2*1*1*1*5*2") {
        // Cannot buy here functionality already exist on the first page
        $response = "END Cannot buy, just use the first 3 options. \n";

    } elseif ($text == "2*1*1*1*5*3") {
        // Cannot buy here functionality already exist on the first page
        $response = "END Cannot buy, just use the first 3 options. \n";

    } elseif ($text == "2*1*1*2") {
        // Weekly Calling Bundles
        $response = "END Cannot buy weekly bundles try daily, functionality is the same. \n";

    } elseif ($text == "2*1*1*3") {
        // Weekly Calling Bundles
        $response = "END Cannot buy monthly bundles try daily, functionality is the same. \n";
        
    } elseif ($text == "2*1*2") {
        // D A T A    B U N D L E S
        /* Functionality is still the same as buying voice bundles but this will update the data part of the table
        while still taking the needed amount of airtime. So implementation will be redundancy.
        */
        $response = "END Cannot data bundles try voice bundles, functionality is the same. \n";

    } elseif ($text == "2*1*3") {
        // R O A M I N G    B U N D L E S
        /* Functionality is still the same as buying voice bundles but this will update the roaming part of the table
        while still taking the needed amount of airtime. So implementation will be redundancy.
        */
        $response = "END Cannot roaming bundles try voice bundles, functionality is the same. \n";

    } elseif ($text == "2*1*4") {
        // S M S    B U N D L E S
        /* Functionality is still the same as buying voice bundles but this will update the SMS part of the table
        while still taking the needed amount of airtime. So implementation will be redundancy.
        */
        $response = "END Cannot SMS bundles try voice bundles, functionality is the same. \n";

    } elseif ($text == "2*2") {
        // Buy bundles For Others
        /* This functionality cannot be tested on the africa's talking platform so implementation will not be here
        But for reference this will check if the provided phone number exist within the phone numbers table and 
        the necessary column of the table will be updated with the chosen bundles bought.
        */
        $response = "END Cannot buy bundles for others buy for yourself, functionality is the same. \n";
    }

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;

