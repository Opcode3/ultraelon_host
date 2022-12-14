<?php

require_once("../vendor/autoload.php");
use app\controller\ReferralController;

    $user_id = $GLOBALS["user_id"];
    $referralController = new ReferralController();

    $callReferrals = json_decode($referralController->getReferralsById((int) $user_id), true);
    $referrals = $callReferrals["message"];
    // var_dump($referrals);
    // var_dump($GLOBALS[]);

    $referralLink = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"]."/register.php?a=".$GLOBALS["slug"];
?>
<div class="referral">
    <h2>Referrals</h2>
    <div class="outCard">
        <!-- <h3 class="outCardTitle"> Our Investment plans </h3> -->

        <div class="referGroup">
            <div class="referImage">
                <img src="./assets/referral.jpg" alt="refer image banner" />
            </div>
            <div class="referInfo">
                <h4 class="outCardTitle">Earn by referring an investor</h4>
                <p>Share your <a style="display: inline; text-decoration:underline; color:blue;" href="<?php echo $referralLink; ?>" target="_blank">referral link</a> to earn commissions on every investor that uses your link!</p>

                <label for="copyLink" class="referLink">
                    <!-- <p id="linkToCopy"><php echo $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"]."/projects/ultra/register.php?a=".$GLOBALS["slug"]; ?></p> -->
                    <p id="linkToCopy"><?php echo $referralLink; ?></p>
                    <span id="copyLink">Copy Link</span>
                </label>

            </div>
        </div>
    </div>
    <div class="outCard">
        <h3 class="outCardTitle"> Referred Users </h3>
        <div class="overflowCard">
            <table>
                <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Date Reg.</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    if(count($referrals) > 0){
                            foreach ($referrals as $key => $referral) {
                ?>
                                <tr>
                                    <td><?php echo ($key + 1); ?></td>
                                    <td><?php echo $referral["user_username"]; ?></td>
                                    <td><?php echo $referral["user_email"]; ?></td>
                                    <td>
                                        <?php 
                                            $date = date_create($referral["createdAt"]);
                                            echo date_format($date, "D, d-M-Y");
                                        ?>
                                    </td>
                                    <!-- <td>Sun, 29th-June-2022</td> -->
                                    <td> 
                                        <?php
                                            $status = (int) $referral["referral_status"];

                                            if($status == 2){
                                                echo '<span class="settled">settled</span>';
                                            }else if($status == 1){
                                                echo '<span class="paid">paid</span>';
                                            }else{
                                                echo '<span class="pending">pending</span>';
                                            }
                                        ?>
                                            
                                    </td>
                                </tr>
                    <?php
                            }
                        }else{
                    ?>
                    <tr>
                        <td colspan="5"> No investor has used your referral code.</td>
                    </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>