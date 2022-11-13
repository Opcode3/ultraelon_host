<?php
    require_once("../vendor/autoload.php");
    use app\controller\InvestmentController;
use app\controller\ReferralController;
use app\helper\GetLockedCapital;

    $user_id = (int) $GLOBALS["user_id"];
    $investmentController = new InvestmentController();
    $referralController = new ReferralController();
    $lockedInvestment = 0;
    $lockedUltra = 0;
    $lockedReferral = 0;

    if($user_id > 0){
        $myInvestment = json_decode($investmentController->getAllInvestmentByUserId($user_id), true);
        $myreferrals = json_decode($referralController->getReferralsById($user_id), true);

        if(count($myInvestment["message"]) > 0)
            $lockedInvestment = GetLockedCapital::investment($myInvestment["message"]);

        if(count($myInvestment["message"]) > 0)
            $lockedUltra = GetLockedCapital::ultra($myInvestment["message"]);

        if(count($myreferrals["message"]) > 0)
            $lockedReferral = GetLockedCapital::referral($myreferrals["message"]);
        
    }
?>
<div class="dashboard">
    <h2>Dashboard</h2>
    <div class="outCard">
        <h3 class="outCardTitle"> Locked Savings </h3>

        <div class="cardGroup">
            <div class="card">
                <span class="title">Investment</span>
                <span class="amount"><?php echo "$".$lockedInvestment; ?></span>
                <!-- <span class="link">Click to withdraw fund</span> -->
            </div>

            <div class="card">
                <span class="title">Ultra token</span>
                <span class="amount"><?php echo "$".$lockedUltra; ?></span>
                <!-- <span class="link">Click to withdraw fund</span> -->
            </div>

            <div class="card">
                <span class="title">Referral Bonus</span>
                <span class="amount"><?php echo "$".$lockedReferral; ?></span>
                <!-- <span class="link">Click to withdraw fund</span> -->
            </div>
        </div>
    </div>
    <div class="outCard">
        <h3 class="outCardTitle"> Investment History </h3>
        <div class="overflowCard">
            <table>
                <thead>
                    <tr>
                        <th>Package</th>
                        <th>Capital</th>
                        <th>Start Date</th>
                        <th>Duration</th>
                        <th>Total ROI</th>
                        <th>Total Ultra</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      if($myInvestment["status_code"] == 200 && count($myInvestment["message"]) > 0) {
                        foreach ($myInvestment["message"] as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo ucfirst($value["invest_plan"]); ?></td>
                            <td><?php echo "$".$value["invest_amount"]; ?></td>
                            <td><?php  echo date_format(date_create($value["createdAt"]), "D, d-M-Y");?></td>
                            <!-- <td>20-11-2023</td> -->
                            <td>1 day (24 Hours)</td>
                            <td>$160.00</td>
                            <td>29 ultra token</td>
                            <td>
                                <?php
                                    if($value["invest_status"] == 1){
                                        echo '<span class="paid">Paid</span>';
                                    }else{
                                        echo '<span class="pending">Pending</span>';
                                    }
                                ?> 
                            </td>
                        </tr>
                    <?php
                        }
                      }else{
                    ?>
                        <tr>
                            <td colspan="8">No investment has been recorded for this account!</td>
                        </tr>
                    <?php
                      }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="outCard">
        <h3 class="outCardTitle"> Statistics </h3>
        <div class="card">
            <iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=light&cnt=6&pref_coin_id=1505&graph=yes" width="100%" height="409px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe>
        </div>
    </div>
</div>