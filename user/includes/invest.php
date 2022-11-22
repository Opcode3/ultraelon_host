<?php
    require_once("../vendor/autoload.php");

use app\controller\InvestmentController;
use app\helper\AddWalletFund;
use app\helper\TimeFormatter;

    $user_id = (int) $GLOBALS["user_id"];

    $investmentController = new InvestmentController();

    if($user_id > 0){
        $myInvestment = json_decode($investmentController->getAllInvestmentByUserId($user_id), true);
    }
?>
<div class="investment">
    <h2>Your Investment</h2>
    <div class="outCard">
        <h3 class="outCardTitle"> 
            Our Investment plans 
            <small>Kindly make an investment by selecting your prefered Plan</small>
        </h3>

        <div class="cardGroup">
            <div class="investCard">
                <span class="title">Classic Plan</span>
                <div class="pricing">
                    <span class="minimum">$50</span>
                    <span class="maximum">$500</span>
                </div>
                <p>8% and 2% ultra token after 24hrs</p>
                <span class="link" id="classicInvestTrigger">Click to invest</span>
            </div>

            <div class="investCard">
                <span class="title">Premium Plan</span>
                <div class="pricing">
                    <span class="minimum">$1000</span>
                    <span class="maximum">$5000</span>
                </div>
                <p>20% and 10% Ultra token after 24hrs</p>
                <span class="link" id="premiumInvestTrigger">Click to invest</span>
            </div>

            <div class="investCard">
                <span class="title">Pro (Whales Investors)</span>
                <p>
                    The Ultra token is sponsoring sports teams, building hospitals ,schools,financing big casinos 
                    and building a bigger game community . You too can be a shareholder.
                </p>
                <span class="link" id="proInvestTrigger">Click to invest</span>
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
                        <!-- <th>Elapse Date</th> -->
                        <th>Day(s) Covered</th>
                        <!-- <th>Duration</th> -->
                        <th>Total ROI</th>
                        <th>Total Ultra</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td>Classic</td>
                        <td>$100.00</td>
                        <td>2-11-2023</td>
                        <td>20-11-2023</td>
                        <td>11 days</td>
                        <td>$160.00</td>
                        <td>29 ultra token</td>
                        <td> <span class="pending">pending</span> </td>
                    </tr>
                    <tr>
                        <td>Classic</td>
                        <td>$100.00</td>
                        <td>2-11-2023</td>
                        <td>20-11-2023</td>
                        <td>11 days</td>
                        <td>$160.00</td>
                        <td>29 ultra token</td>
                        <td> <span class="paid">Paid</span> </td>
                    </tr>
                    <tr>
                        <td>Classic</td>
                        <td>$100.00</td>
                        <td>2-11-2023</td>
                        <td>20-11-2023</td>
                        <td>11 days</td>
                        <td>$160.00</td>
                        <td>29 ultra token</td>
                        <td> <span class="pending">pending</span> </td>
                    </tr> -->

                    <?php
                      if($myInvestment["status_code"] == 200 && count($myInvestment["message"]) > 0) {
                        foreach ($myInvestment["message"] as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo ucfirst($value["invest_plan"]); ?></td>
                            <td><?php echo "$".$value["invest_amount"]; ?></td>
                            <td><?php  echo date_format(date_create($value["createdAt"]), "D, d-M-Y");?></td>
                            <!-- <td>20-11-2023</td> -->
                            <td><?php  echo TimeFormatter::getDaysDiff($value["createdAt"]);?></td>
                            <td><?php echo $value["invest_status"] == 0 ? "$0.00" : "$".number_format(AddWalletFund::getInvestmentROI(floatval($value["invest_amount"]), strtolower($value["invest_plan"]), $value["createdAt"]), 2); ?></td>
                            <td><?php echo $value["invest_status"] == 0 ? "0.00" : number_format(AddWalletFund::getUltraProfit(floatval($value["invest_amount"]), strtolower($value["invest_plan"]), $value["createdAt"]), 2) ?> ultra token</td>
                            
                            <td> 
                                <?php
                                    if($value["invest_status"] == 1){
                                        echo '<span class="paid">Investing</span>';
                                    }else if($value["invest_status"] == 2){
                                        echo '<span class="settled">ROI Paid</span>';
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
</div>