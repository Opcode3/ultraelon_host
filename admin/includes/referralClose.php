<?php

    $referralController = $GLOBALS["referralController"];

    $response = json_decode($referralController->getAllClosedReferrals(), true);

    // var_dump($response);
?>
<div class="subMenu">
    <span>
        <a href="./referral.php?page=2">Pending</a>
        <a href="./referral.php?page=0">Paid</a>
        <a class="active" href="./referral.php?page=1">Settled</a>
    </span>
</div>
<div class="subContent" id="referrals">
    <div class="overflowTable">
        <table>
            <thead>
                <tr>
                    <th>Sn</th>
                    <th>ReferredBy</th>
                    <th>New User</th>
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
                                <td><?php echo "$".number_format(3, 2); ?></td>
                                <td><?php echo date("D, d-M-Y", strtotime($referral["createdAt"]));?></td>                    
                                <td> <span class="closed btnReferralClosed">Settled</span> </td>
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <tr> <td colspan="6">Ooooops! We don't currently have any referral we have paid...</td> </tr>
                        <?php
                    }
                ?>
                
            </tbody>
        </table>
    </div>
</div>