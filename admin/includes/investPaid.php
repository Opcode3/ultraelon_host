<?php

use app\helper\GetLockedCapital;
use app\helper\TimeFormatter;

    $investmentController = $GLOBALS["investmentController"];
    $response = json_decode($investmentController->getAllPaidInvestment(), true);
    // var_dump($response);
?>
<div class="subMenu">
    <span>
        <a href="./investment.php?page=2">Pending</a>
        <a class="active" href="./investment.php?page=0">Paid</a>
        <a href="./investment.php?page=1">Closed</a>
    </span>
</div>
<div class="subContent">
    <div class="overflowTable">
        <table>
            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Username</th>
                    <th>Plan</th>
                    <th>Depositors address</th>
                    <th>Payment Type</th>
                    <th>Amount</th>
                    <th>Days Covered</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(is_array($response["message"]) && count($response["message"]) > 0){
                        foreach($response["message"] as $key => $investment){
                            ?>
                            <tr>
                                <td><?php echo ($key + 1); ?></td>
                                <td><?php echo ucfirst($investment["user_username"]); ?></td>
                                <td><?php echo ucfirst($investment["invest_plan"]); ?></td>
                                <td><?php echo $investment["invest_depositor_address"]; ?></td>
                                <td><?php echo ucfirst($investment["invest_depositor_account_type"]); ?></td>
                                <td><?php echo "$".number_format($investment["invest_amount"], 2); ?></td>
                                <td><?php echo TimeFormatter::getDaysDiff($investment["createdAt"]);?></td>                    
                                <td> <span data-profit="<?php echo GetLockedCapital::getPaymentFromInvestment((int) $investment["invest_amount"], strtolower($investment["invest_plan"]), $investment["createdAt"]); ?>" data-user="<?php echo (int) $investment["invest_user_id"]; ?>" data-id="<?php echo (int) $investment["invest_id"]; ?>"  class="paid btnInvestmentPaid">Paid</span> </td>
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <tr> <td colspan="8">Ooooops! No investor has paid his/her investment capital as specified by the chosen investment plan.</td> </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>