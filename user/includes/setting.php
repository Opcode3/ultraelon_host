<?php
require_once("../vendor/autoload.php");
use app\controller\UserController;
use app\requests\UserUpdateRequest;

    $bitcoin = $GLOBALS["bitcoin"];
    $bnb = $GLOBALS["bnb"];
    $usdt = $GLOBALS["usdt"];
    $eth = $GLOBALS["eth"];
    $ultra = $GLOBALS["ultra"];
    $slug  = $GLOBALS["slug"]; 

    if(isset($_POST["btnSettingUpload"])){

        $bitcoin = $_POST["bitcoin"];
        $email = $_POST["email"];
        $eth = $_POST["eth"];
        $ultra = $_POST["ultra"];
        $bnb = $_POST["bnb"];
        $usdt = $_POST["usdt"];
        $oldPassword = $_POST["oldPassword"];
        $newPassword = $_POST["newPassword"];
        $confirmPassword = $_POST["confirmPassword"];

        $updateUser = array(
            "email_address" =>  $email, "bitcoin"=> $bitcoin, "eth"=> $eth, 
            "ultra"=> $ultra, "bnb"=> $bnb, "usdt"=> $usdt,
            "password"=> $newPassword, "slug"=> $slug
        );    

        $userController = new UserController();
        $formStatus = false;

        if(empty($_POST["newPassword"])){   
            $updateUser["password"] = "";
            $formStatus = true;
        }else{
            if($_POST["newPassword"] == $_POST["confirmPassword"]){
                if(password_verify($_POST["oldPassword"], $GLOBALS["passwordHash"])){
                    $formStatus = true;
                }else echo "<script> alert('Incorrect old password!'); </script>";
            }else echo "<script> alert('Your pass confirmation is incorrect. try another password!'); </script>";
        }

        if($formStatus){
            $response = json_decode($userController->editUserAccount(new UserUpdateRequest($updateUser)), true);
            
            if(is_array($response["message"])){
                $newUserDetail = $response["message"];
                $_SESSION["userDetails"]["user_username"] = $response["message"]["user_username"];
                $_SESSION["userDetails"]["user_id"] = $response["message"]["user_id"];
                $_SESSION["userDetails"]["user_email"] = $response["message"]["user_email"];
                $_SESSION["userDetails"]["user_password"] = $response["message"]["user_password"];
                $_SESSION["userDetails"]["user_slug"] = $response["message"]["user_slug"];
                $_SESSION["userDetails"]["createdAt"] = $response["message"]["createdAt"];
                $_SESSION["userDetails"]["updatedAt"] = $response["message"]["updatedAt"];
                $_SESSION["userDetails"]["user_bitcoin"] = $response["message"]["user_bitcoin"];
                $_SESSION["userDetails"]["user_eth"] = $response["message"]["user_eth"];
                $_SESSION["userDetails"]["user_bnb"] = $response["message"]["user_bnb"];
                $_SESSION["userDetails"]["user_ultra"] = $response["message"]["user_ultra"];
                $_SESSION["userDetails"]["user_usdt"] = $response["message"]["user_usdt"];
                // var_dump($newUserDetail);
                echo "<script> alert('Your account update is successful!'); </script>";
            }else{
                if(is_string($response["message"])){
                    echo "<script> alert('".$response["status_code"]."'); </script>";
                }
            }
        }
    }
?>
<div class="setting"> 
    <h2>Account Settings</h2>
    <div class="card">
        <form method="post" class="setting">
            <div class="items">
                <div class="subTitle">Information Settings</div>
                <div class="item">
                    <div class="item_name">
                    <span>Account Username: </span>
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