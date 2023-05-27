<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
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

} else if ($text == "1") {
    // Balances
    $response = "CON 1. Summary \n";
    $response .= "2. Detailed \n";

} else if ($text == "2") {
    // Buy Bundles
    $response = "CON 1. Buy For Myself \n";
    $response .= "2. Buy For Others \n ";

} else if ($text =="3") {
    // Airtime Advances
    $response = "CON  Airtime Advance. Select amount up to M5 \n";
    $response .= "1. Airtime \n";
    $response .= "2. Bundles \n";
    $response .= "3. Balance \n";
    $response .= "4. Historical Advances \n";
    $response .= "5. Secs \n";
    $response .= "Ts n Cs \n";

    if ($text == "3*1") {
        // Airtime Advance
        $response = "CON Airtime Advance. Select amount up to M5 \n";
        $response .= "1. M3 \n ";
        $response .= "2. M5 \n ";
        $response .= "0. Back \n ";

        if ($text == "3*1*1") {
            // First Choice
            $response = "CON You have requested for a M3 Airtime Advance. M3 allong with a service fee of M1 will be deducted from your next recharge. T&Cs apply. \n";
            $response .= "1. Confirm \n ";
            $response .= "0. Back \n ";

            if ($text == "3*1*1*1") {
                // Confirm Advance
                //Run Sql query for increasing balance and set a trigger to wait for next recharge and take what is due

            } elseif ($text == "3*1*1*0") {
                // Go back
                $text = "3*1*1";
            }
        } else if ($text == "3*1*2") {
            // First Choice
            $response = "CON You have requested for a M5 Airtime Advance. M5 allong with a service fee of M1 will be deducted from your next recharge. T&Cs apply. \n";
            $response .= "1. Confirm \n ";
            $response .= "0. Back \n ";

            if ($text == "3*1*1*1") {
                // Confirm Advance
                //Run Sql query for increasing balance and set a trigger to wait for next recharge and take what is due

            } elseif ($text == "3*1*1*0") {
                // Go back
                $text = "3*1*2";
            }
        }


    } else if ($text == "3*2") {
        // Bundles Advance
        $response = "CON Bundle Advance. Select a bundle advance up to M5 \n";
        $response .= "1. Voice Bundles \n ";
        $response .= "2. Data Bundles \n ";
        $response .= "0. Back \n ";

        if ($text == "3*2*1") {
            //Voice bundles
            $response = "CON Daily Voice Bundles. Select: \n";
            $response .= "1. M3 for 7 All Net Minutes \n ";
            $response .= "2. M5 for 12 All Net Minutes \n ";
            $response .= "0. Back \n ";

            if ($text == "3*2*1*1") {
                // M3 Voice bundles
                $response = "CON You have requested for a M3 for 7 All Net Minutes valid until 00:00. M3 allong with a service fee of M1 will be deducted from your next recharge. T&Cs apply. \n";
                $response .= "1. Confirm \n ";
                $response .= "0. Back \n ";

                if ($text == "3*2*1*1*1") {
                    // Confirm
                    $response = "END Only test with the the airtime advance as functionaity is almost the same with this part \n";
                }

            } else if ($text == "3*2*1*1") {
                // M5 Voice Bundles 
                $response = "END Only test with the M3 bundles as the process from now is the same. \n";
            }
        }

    } else if ($text == "3*3") {
        // Balance
        $response = "CON You do not have an outstanding Airtime Advance.";
        $response .= "0. Back \n ";

    } else if ($text == "3*4") {
        // Historical Advances
        // An SMS that will send an SMS
        $response = "END Your request is being processed. You will recieve SMS notification shortly.";

    } else if ($text == "3*5") {
        // Ses
        $response = "END Your request is being processed. You will recieve SMS notification shortly.";

    } else if ($text == "3*6") {
        // Ts n Cs
        $response = "END Visit www.google.com for mor info";
    }

} else if ($text =="4") {
    // Functionality Covered in Ecocash Clone not here
    $response = "END  0. Same Functionality Covered in Ecocash Clone not here \n";

}else if ($text =="5") {
    // Next Level 
    $response = "CON  1. Social Promotion \n";
    $response .= "2. Voice Bundles \n";
    $response .= "3. Data Bunldes \n";
    $response .= "4. SMS Bundles \n";
    $response .= "5. Social Bundles \n";
    $response .= "6. Balances \n";
    $response .= "Ts n Cs \n";

    if ($text =="5*1") {
        // All functionalinty of buying is the same
        $response = "END Only test with the the airtime advance as functionaity is almost the same with this part \n";
    } else if ($text =="5*2") {
        # code...
        $response = "END Only test with the the airtime advance as functionaity is almost the same with this part \n";

    } else if ($text =="5*3") {
        # code...
        $response = "END Only test with the the airtime advance as functionaity is almost the same with this part \n";

    } else if ($text =="5*4") {
        # code...
        $response = "END Only test with the the airtime advance as functionaity is almost the same with this part \n";

    } else if ($text =="5*4") {
        # code...
        $response = "END Only test with the the airtime advance as functionaity is almost the same with this part \n";

    } else if ($text =="5*5") {
        # code...
        $response = "END Only test with the the airtime advance as functionaity is almost the same with this part \n";

    } else if ($text =="5*6") {
        # code...
        $response = "END Only test with the the airtime advance as functionaity is almost the same with this part \n";
    }
    
}else if ($text =="6") {
    // Just 4 U
    $response = "CON  Just4U Menu \n";
    $response .= "0. Litlabolane \n";
    $response .= "1. J4U Voice \n";
    $response .= "2. J4U Data \n";
    $response .= "3. VodaTargets Social Bundles \n";
    $response .= "4. Bundle Upsize \n";
    $response .= "5. Just4 your town \n";
    $response .= "6. Balances \n";
    $response = "END Only test with the the airtime advance as functionaity is almost the same with this part \n";
    
}else if ($text =="7") {
    // Self Services
    $response = "CON  Welcome to Self Services \n";
    $response .= "1. Airtime charging \n";
    $response .= "2. SMS'a molebe \n";
    $response .= "3. ICCID  \n";
    
}else if ($text =="8") {
    // Entertanment
    $response = "CON  1. Welcome Tones \n";
    $response .= "2. Football \n";
    $response .= "3. Instavoices \n";
    $response .= "4. Meg My Day \n";
    $response .= "5. Vodacom Tickets \n";
    
}else if ($text =="9") {
    // Customer Preferences
    $response = "CON  Customer preferences allow you to personalize your Vodacom attributes \n";
    $response .= "1. OOB DATA Usage \n";
    $response .= "2. OOB SMS Usage\n";
    
}else if ($text =="10" /* Missing Condition For Second time usage */) {
    // Mega Jackpot
    if ($count == 0) {
        // first time using this part
        $response = "CON  Welcome to Mega Jackpot! Participate and win millions \n";
        $response .= "1. Sesotho \n";
        $response .= "2. English \n";

    } else {
        // Second or third time visitors
        $response = "CON  Mega Jackpot!\n";
        $response .= "1. Subscribe and PLAY \n";
        $response .= "2. Play Once \n";
        $response .= "3. Bundles \n";
        $response .= "4. Ticket Packages \n";
        $response .= "5. Account \n";

    }  
    
} else if($text == "1*1") { 
    // Summary Of Balances 
    $response .= "END Airtime is M1.52; Data is 0.00Mb; Voice is 0 Minutes 0 Sec; SMS 0 Buy \n";

} else if ($text == "1*2") {
    // Send a summary to your phone
    $response = "END Detailed balances will be sent to you shortly via SMS \n";
    // Include function that sends text messages

} else if ($text == "2*1") {
    //Buy bundles for self
    $response = "CON  0. Hot Deals \n";
    $response .= "1. Voice Bundles \n";
    $response .= "2. Data Bundles \n";
    $response .= "3. Roaming Bundles \n";
    $response .= "4. Sms Bundles \n";

} else if ($text == "2*1*0") {
    //
    $response = "CON  1. More Deals \n";

} elseif ($text == "2*1*0*1") {
    // Sample deals offered by vodacom
    $response = "CON  1. 3.5 GB valid for 7days at M85.00 Hot Deals \n";
    $response .= "2. 26 VCL to VCL mins valid for 1hrs at M2.00 \n";
    $response .= "3. 45MB valid for 1hrs at M0.90 \n";

} elseif ($text == "2*1*1") {
    // Calling Bundles
    $response = "CON  1. Daily Calling Bundles \n";
    $response .= "2. Weekly Calling Bundles \n";
    $response .= "3. Monthly Calling Bundles \n";

} else if ($text == "2*1*1*1") {
    // Daily Calling Bundles
    $response = "CON  0. J4U calling bundles 26 VCL to VCL mins valid for 1hrs at M2.00 \n";
    $response .= "1. M2 for 4 All Net Minutes \n";
    $response .= "2. M3 for 7 All Net Minutes \n";
    $response .= "3. M5 for 12 All Net Minutes \n";

    // Implement the next page
    if ($text == "2*1*1*1*5") {
        // Nex Page
        $response .= "1. M7 for 14 All Net Minutes \n";
        $response .= "2. M10 for 20 All Net Minutes \n";
        $response .= "3. M12 for 25 All Net Minutes \n";
    }

} else if ($text == "2*2") {
    // Buy bundles for others
    $response = "CON  Enter number? \n";

    // sql query to check if phone number exist in our database

    if ($text == $exisiting_phone) {
        // If the phone is within our database
        $response = "CON  0. Hot Deals \n";
        $response .= "1. Airtime Transfer \n";
        $response .= "2. Voice Bundles \n";
        $response .= "3. Data Bundles \n";
        $response .= "4. Roaming Bundles \n";
        $response .= "5. Sms Bundles \n";

        // Difference now from other functionality is the SQL queries will update values in two different rows for the number being bought for and the buying phone
        if ($text == "0") {
            // First Selection
            $response = "CON  1. More Deals \n";

            if ($text == "0*1") {
                // Sample deals offered by vodacom
                $response = "CON  1. 3.5 GB valid for 7days at M85.00 Hot Deals \n";
                $response .= "2. 26 VCL to VCL mins valid for 1hrs at M2.00 \n";
                $response .= "3. 45MB valid for 1hrs at M0.90 \n";

                if ($text == "0*1*1") {
                    // Buy sample deal for another phone
                    $response = "CON You have requested 3.5 GB valid for 7days at M85.00 to buy for ";
                    $response .= "1. Confirm \n ";
                    $response .= "0. Back \n ";
                }
            }

        } elseif ($text == "1") {
            # code...
            $response = "END Only test with the Hot Deals bundles as the process from now is the same.";

        }elseif ($text == "2") {
            # code...
            $response = "END Only test with the Hot Deals bundles as the process from now is the same.";

        }elseif ($text == "3") {
            # code...
            $response = "END Only test with the Hot Deals bundles as the process from now is the same.";

        }elseif ($text == "4") {
            # code...
            $response = "END Only test with the Hot Deals bundles as the process from now is the same.";

        } elseif ($text == "5") {
            # code...
            $response = "END Only test with the Hot Deals bundles as the process from now is the same.";
        }
    }

} 


// Echo the response back to the API
header('Content-type: text/plain');
echo $response;

