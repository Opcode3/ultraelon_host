<?php
    require_once("../vendor/autoload.php");
    use app\controller\InvestmentController;
use app\controller\ReferralController;
use app\helper\AddWalletFund;
use app\helper\GetLockedCapital;
use app\helper\TimeFormatter;

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
                        <!-- <th>Duration</th> -->
                        <th>Day(s) Covered</th>
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
                            <td><?php echo TimeFormatter::getDaysDiff($value["createdAt"]);?></td>
                            <td><?php echo "$".number_format(AddWalletFund::getInvestmentROI(floatval($value["invest_amount"]), strtolower($value["invest_plan"]), $value["createdAt"]), 2); ?></td>
                            <td><?php echo number_format(AddWalletFund::getUltraProfit(floatval($value["invest_amount"]), strtolower($value["invest_plan"]), $value["createdAt"]), 2) ?> ultra token</td>
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
    <div class="outCard">
        <h3 class="outCardTitle">We Will Love To Here From You </h3>
        <div class="card">
            <p>We will love to communicate with your more often as you invest with us. </p>
            <p> Use the below social media links to communicate with us and get all of your questions resolved in a split of seconds.</p>
            
            <div class="socials">
                <a href="https://t.me/+KrmaZ1OgA0FkNjM0" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 240 240"><defs><linearGradient id="linear-gradient" x1="120" y1="240" x2="120" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#1d93d2"/><stop offset="1" stop-color="#38b0e3"/></linearGradient></defs><title>Telegram_logo</title><circle cx="120" cy="120" r="120" fill="url(#linear-gradient)"/><path d="M81.229,128.772l14.237,39.406s1.78,3.687,3.686,3.687,30.255-29.492,30.255-29.492l31.525-60.89L81.737,118.6Z" fill="#c8daea"/><path d="M100.106,138.878l-2.733,29.046s-1.144,8.9,7.754,0,17.415-15.763,17.415-15.763" fill="#a9c6d8"/><path d="M81.486,130.178,52.2,120.636s-3.5-1.42-2.373-4.64c.232-.664.7-1.229,2.1-2.2,6.489-4.523,120.106-45.36,120.106-45.36s3.208-1.081,5.1-.362a2.766,2.766,0,0,1,1.885,2.055,9.357,9.357,0,0,1,.254,2.585c-.009.752-.1,1.449-.169,2.542-.692,11.165-21.4,94.493-21.4,94.493s-1.239,4.876-5.678,5.043A8.13,8.13,0,0,1,146.1,172.5c-8.711-7.493-38.819-27.727-45.472-32.177a1.27,1.27,0,0,1-.546-.9c-.093-.469.417-1.05.417-1.05s52.426-46.6,53.821-51.492c.108-.379-.3-.566-.848-.4-3.482,1.281-63.844,39.4-70.506,43.607A3.21,3.21,0,0,1,81.486,130.178Z" fill="#fff"/></svg>
                    Telegram
                </a>
                <a href="https://wa.me/+2349055821481?text=Am%20an%20investor%20with%20your%20UltraElon%20Platform." target="_blank">
                    <svg viewBox="0 0 32 32" fill="#fff" class="whatsapp-ico"><path d=" M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z" fill-rule="evenodd"></path></svg>
                    WhatsApp
                </a>
            </div>
        </div>
    </div>
    <div class="outCard">
        <h3 class="outCardTitle"> Statistics </h3>
        <div class="card">
            <iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=light&cnt=6&pref_coin_id=1505&graph=yes" width="100%" height="409px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe>
        </div>
    </div>
</div>