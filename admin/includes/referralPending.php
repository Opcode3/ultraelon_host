<?php

    $referralController = $GLOBALS["referralController"];

    $response = json_decode($referralController->getAllPendingReferrals(), true);

    // var_dump($response);

?>
<div class="subMenu">
    <span>
        <a class="active" href="./referral.php?page=2">Pending</a>
        <a href="./referral.php?page=0">Paid</a>
        <a href="./referral.php?page=1">Settled</a>
    </span>
</div>
<div class="subContent" id="referrals">
    <div class="overflowTable">
        <table>
            <thead>
                <tr>
                    <th>Sn</th>
                    <!-- <th>Plan</th> -->
                    <th>ReferredBy</th>
                    <th>New User</th>
                    <!-- <th>Amount</th> -->
                    <th>Bonus</th>
                    <th>Date Created</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(is_array($response["message"]) && count($response["message"]) > 0){
                        foreach($response["message"] as $key => $referral){
                            ?>
                            <tr>
                                <td><?php echo ($key + 1); ?></td>
                                <td><?php echo ucfirst($referral["referredBy"]); ?></td>
                                <td><?php echo ucfirst($referral["referralUser"]); ?></td>
                                <td><?php echo "$".number_format(0, 2); ?></td>
                                <td><?php echo date("D, d-M-Y", strtotime($referral["createdAt"]));?></td>                    
                                <td> <span class="pending btnReferralPending">Pending</span> </td>
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <tr> <td colspan="6">Ooooops! We don't currently have a pending referral...</td> </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>