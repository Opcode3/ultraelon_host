<?php
    $bitcoin = $GLOBALS["bitcoin"];
    $bnb = $GLOBALS["bnb"];
    $usdt = $GLOBALS["usdt"];
    $eth = $GLOBALS["eth"];
    $ultra = $GLOBALS["ultra"];


    // if(isset($_POST["btnSettingUpload"])){

    //     if(empty($_POST["newPassword"])){
    //         echo "Not setting password";
    //     }else{
    //         if($_POST["newPassword"] == $_POST["confirmPassword"]){

    //             if(password_verify($_POST["oldPassword"], $GLOBALS["passwordHash"])){
    //                 echo "continue";
    //             }else echo "<script> alert('Incorrect old password!'); </script>";
    //         }else echo "<script> alert('Your pass confirmation is incorrect. try another password!'); </script>";
    //     }
    // }
?>
<div class="setting"> 
    <h2>Account Settings</h2>
    <div class="card">
        <form method="post" class="setting">
            <div class="items">
                <div class="subTitle">Information Settings</div>
                <div class="item">
                    <div class="item_name">
                        <span>Account Name: </span>
                    </div>
                    <div class="item_value">
                        <span> <?php echo ucfirst($GLOBALS["username"]); ?> </span>
                    </div>
                </div>
                <div class="item">
                    <div class="item_name">
                        <span>Registration Date: </span>
                    </div>
                    <div class="item_value">
                        <span> <?php
                            $date = date_create($GLOBALS["createdAt"]);

                            echo date_format($date, "M-d-Y h:i:s a");
                            ?> </span>
                    </div>
                </div>

                <div class="item">
                    <div class="item_name">
                        <span>Email Address: </span>
                    </div>
                    <div class="item_value">
                        <input type="email" name="email" value="<?php echo ucfirst($GLOBALS["email"]); ?>">
                    </div>
                </div>
            </div>
            <div class="items">
                <div class="subTitle">Payment Address Settings</div>
                <div class="item">
                    <div class="item_name">
                        <span>Your Bitcoin Address: </span>
                    </div>
                    <div class="item_value">
                        <input type="text" value="<?php echo is_null($bitcoin) ? "" : $bitcoin; ?>" name="bitcoin" placeholder="Enter your bitcoin wallet address here">
                    </div>
                </div>
                <div class="item">
                    <div class="item_name">
                        <span>Your Ethereum Address: </span>
                    </div>
                    <div class="item_value">
                        <input type="text" value="<?php echo is_null($eth) ? "" : $eth; ?>" name="eth" placeholder="Enter your ethereum wallet address here">
                    </div>
                </div>
                <div class="item">
                    <div class="item_name">
                        <span>Your Ultra token Address: </span>
                    </div>
                    <div class="item_value">
                        <input type="text" name="ultra" value="<?php echo is_null($ultra) ? "" : $ultra; ?>" placeholder="Enter your ultra token address here">
                    </div>
                </div>
                <div class="item">
                    <div class="item_name">
                        <span>Your BNB Account ID: </span>
                    </div>
                    <div class="item_value">
                        <input type="text" name="bnb" value="<?php echo is_null($bnb) ? "" : $bnb; ?>" placeholder="Enter your bnb wallet address here">
                    </div>
                </div>

                <div class="item">
                    <div class="item_name">
                        <span>Your USDT Account Address: </span>
                    </div>
                    <div class="item_value">
                        <input type="text" name="usdt" value="<?php echo is_null($usdt) ? "" : $usdt; ?>" placeholder="Enter your usdt address here">
                    </div>
                </div>

            </div>
            <div class="items">
                <div class="subTitle">Password Settings</div>
                
                <div class="item">
                    <div class="item_name">
                        <span>Old Password: </span>
                    </div>
                    <div class="item_value">
                        <input type="password" name="oldPassword" >
                    </div>
                </div>

                <div class="item">
                    <div class="item_name">
                        <span>New Password: </span>
                    </div>
                    <div class="item_value">
                        <input type="password" name="newPassword" >
                    </div>
                </div>

                <div class="item">
                    <div class="item_name">
                        <span>Retype new Password: </span>
                    </div>
                    <div class="item_value">
                        <input type="password" name="confirmPassword" >
                    </div>
                </div>
            </div>
            <button type="submit" name="btnSettingUpload">Change Account Data</button>
        </form>
    </div>
</div>