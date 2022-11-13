<?php
    require_once("../vendor/autoload.php");
    use app\controller\WithdrawController;

    $walletROI = (int) $GLOBALS["walletROI"];
    $walletUltra = (int) $GLOBALS["walletUltra"];
    $walletReferral = (int) $GLOBALS["walletReferral"];
    $user_id = (int) $GLOBALS["user_id"];

    $withdrawController = new WithdrawController();
    if($user_id > 0){
        $myWithdrawList = json_decode($withdrawController->getAllWithdrawsByUserId($user_id), true);
        // var_dump($myWithdrawList);
    }

    echo "User ID $user_id";
?>
<div class="withdrawals">
    <h2>Available Withdrawals</h2>
    <div class="outCard">
        <h3 class="outCardTitle"> Earnings </h3>

        <div class="cardGroup">
            <div class="card">
                <span class="title">Investment</span>
                <span class="amount"><?php echo "$".$walletROI; ?></span>
                <span class="link" data-amount="<?php echo $walletROI; ?>" id="modalInvestTrigger" >Click to withdraw fund</span>
            </div>

            <div class="card">
                <span class="title">Ultra token</span>
                <span class="amount"><?php echo "$".$walletUltra; ?></span>
                <span class="link" data-amount="<?php echo $walletUltra; ?>" id="modalUltraTrigger">Click to withdraw fund</span>
            </div>

            <div class="card">
                <span class="title">Referral Bonus</span>
                <span class="amount"><?php echo "$".$walletReferral; ?></span>
                <span class="link" data-amount="<?php echo $walletReferral; ?>" id="modalReferralTrigger">Click to withdraw fund</span>
            </div>
        </div>
    </div>
    <div class="outCard">
        <h3 class="outCardTitle"> Withdrawal History </h3>
        <div class="overflowCard">
            <table>
                <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Wallet Type</th>
                        <th>Wallet Address</th>
                        <th>Amount</th>
                        <th>Withdraw From</th>
                        <th>Date Applied</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      if($myWithdrawList["status_code"] == 200 && count($myWithdrawList["message"]) > 0) {
                        foreach ($myWithdrawList["message"] as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo ($key + 1); ?></td>
                        <td><?php echo $value["withdraw_account_type"]; ?></td>
                        <td><?php echo $value["withdraw_address"]; ?></td>
                        <td><?php echo $value["withdraw_amount"]; ?></td>
                        <td>
                            <?php 
                                $walletFrom = $value["withdraw_from"];
                                if($walletFrom == "wallet_referral"){
                                    echo "Referral Earning";
                                }else if($walletFrom == "wallet_invest"){
                                    echo "Investment Earning";
                                }else if($walletFrom == "wallet_ultra"){
                                    echo "Ultra token Earning";
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                $date = date_create($value["createdAt"]);
                                echo date_format($date, "D, d-M-Y");
                            ?>
                        </td>
                        <td>
                            <?php
                                $status = (int) $value["withdraw_status"];

                                if($status == 1){
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
                        <tr><td colspan="7"> <label>No withdrawal has been made yet!</label> </td></tr>
                    <?php
                      }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>