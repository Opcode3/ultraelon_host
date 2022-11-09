<?php

use app\controller\ReferralController;

    $user_id = $GLOBALS["user_id"];
    require_once("../vendor/autoload.php");
    $referralController = new ReferralController();

    $callReferrals = json_decode($referralController->getReferralsById((int) $user_id), true);
    $referrals = $callReferrals["message"];


    // var_dump($GLOBALS[]);
?>
<ul class="pages">  
    <li>
        <div class="cardHead">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            <span>Referral Program</span>
        </div>
        <div class="desc">
            <p>Share your referral link to earn commissions on every investor that uses your link!</p>
        </div>
        <div class="cardBody">
            <?php
                if(count($referrals) > 0){
            ?>
            <div class="referral">
                <div class="table_cover">
                    <table>
                        <thead>
                            <th>Sn</th>
                            <!-- <th>Username</th> -->
                            <th>Email</th>
                            <th>Date Reg.</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            <?php

                                foreach ($referrals as $key => $referral) {
                                    ?>
                                    <tr>
                                        <td><?php echo ($key + 1); ?></td>
                                        <td><?php echo $referral["user_email"]; ?></td>
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
                                                    echo '<label class="settled">settled</label>';
                                                }else if($status == 1){
                                                    echo '<label class="paid">paid</label>';
                                                }else{
                                                    echo '<label class="pending">pending</label>';
                                                }
                                            ?>
                                             
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
                }else{
            ?>
            <div class="empty">
                <img src="./assets/icons/empty.svg" alt="empty referral" />
                <p>No referrals yet</p>
                <div class="copyCover">
                    <p>http://localhost/projects/ultraelon/in/admin/v1/</p>
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </li>
</ul>