<?php

    $investmentController = $GLOBALS["investmentController"];
    $response = json_decode($investmentController->getAllPendingInvestment(), true);
    // var_dump($response);
?>
<div class="subMenu">
    <span>
        <a class="active" href="./investment.php?page=2">Pending</a>
        <a href="./investment.php?page=0">Paid</a>
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
                    <th>Date</th>
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
                                <td><?php echo date("D, d-M-Y", strtotime($investment["createdAt"]));?></td>                    
                                <td> <span data-id="<?php echo (int) $investment["invest_id"]; ?>"  class="pending btnInvestmentPending">Pending</span> </td>
                            </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <tr> <td colspan="8">Ooooops! No investor has applied for any investment plan.</td> </tr>
                        <?php
                    }
                ?>
                <!-- <tr>
                    <td>1</td>
                    <td>Classic</td>
                    <td>Classic</td>
                    <td>Classic</td>
                    <td>Classic</td>
                    <td>$46,300.00</td>
                    <td><?php echo date("D d-m-Y") ?></td>
                    <td> <span data-id="1"  class="pending btnInvestmentPending">Pending</span> </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Premium</td>
                    <td>Premium</td>
                    <td>Premium</td>
                    <td>Premium</td>
                    <td>$46,300.00</td>
                    <td><?php echo date("D d-m-Y") ?></td>
                    <td> <span  data-id="2" class="pending btnInvestmentPending">Pending</span> </td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>