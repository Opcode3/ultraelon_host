<?php

    $withdrawController = $GLOBALS["withdrawController"];
    $response = json_decode($withdrawController->getAllPaidWithdraws(), true);
    // var_dump($response);
?>
<div class="subMenu">
    <span>
        <a href="./withdrawal.php?page=1">Pending</a>
        <a class="active" href="./withdrawal.php?page=0">Paid</a>
    </span>
</div>
<div class="subContent" id="withdraw">
    <div class="overflowTable">
        <table>
            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Username</th>
                    <th>Account Wallet</th>
                    <th>Account Type</th>
                    <th>Amount</th>
                    <th>Account Address</th>
                    <th>Date Created</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    if(is_array($response["message"]) && count($response["message"]) > 0){
                        foreach($response["message"] as $key => $withdraw){
                            ?>
                            <tr>
                                <td><?php echo ($key + 1); ?></td>
                                <td><?php echo ucfirst($withdraw["user_username"]); ?></td>
                                <td><?php echo "$".number_format($withdraw[$withdraw["withdraw_from"]], 2); ?></td>
                                <td><?php echo ucfirst($withdraw["withdraw_account_type"]); ?></td>
                                <td><?php echo "$".number_format($withdraw["withdraw_amount"], 2); ?></td>
                                <td><?php echo $withdraw["withdraw_address"]; ?></td>
                                <td><?php echo date("D, d-M-Y", strtotime($withdraw["createdAt"]));?></td>                    
                                <td> <span data-id="<?php echo (int) $withdraw["withdraw_id"]; ?>" class="paid btnWithdrawPaid">Paid</span> </td>
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <tr> <td colspan="8">Ooooops! No investor has applied for any withdraw plan.</td> </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>