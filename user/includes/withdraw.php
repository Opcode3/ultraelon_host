<!-- <ul class="pages">   
    <li>
        <div class="cardHead">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            <span>Withdrawal</span>
        </div>
        <div class="cardBody">
            <div class="amountRemain">
                <span class="subTitle">Redrawable Capital</span>
                <h3>$0.00</h3>
            </div>

            <div class="transaction" style="display: none;">
                <span class="subTitle">Withdrawal History</span>
                <ul class="listCover">
                    <?php
                        for($i = 0; $i < 10; $i++){
                    ?>
                    <li>
                        <div>
                            <div class="icon">
                                <img src="./assets/icons/eth.svg" alt="etherum">
                            </div>
                            <label>
                                <h5>Bitcoin</h5>
                                <span>20th-Sept-2022</span>
                            </label>
                        </div>
                        <div>
                            <span>$4,045.00</span>
                            <label class="status">Pending</label>
                        </div>

                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
            <div class="empty">
                <img src="./assets/icons/empty.svg" alt="empty referral" />
                <p>You haven't made any redrawal yet</p>
            </div>
        </div>

    </li>
</ul> -->

<div class="withdrawals">
    <h2>Available Withdrawals</h2>
    <div class="outCard">
        <h3 class="outCardTitle"> Earnings </h3>

        <div class="cardGroup">
            <div class="card">
                <span class="title">Investment</span>
                <span class="amount">$0</span>
                <span class="link" data-amount="0" id="modalInvestTrigger" >Click to withdraw fund</span>
            </div>

            <div class="card">
                <span class="title">Ultra token</span>
                <span class="amount">$7</span>
                <span class="link" data-amount="7" id="modalUltraTrigger">Click to withdraw fund</span>
            </div>

            <div class="card">
                <span class="title">Referral Bonus</span>
                <span class="amount">$20</span>
                <span class="link" data-amount="20" id="modalReferralTrigger">Click to withdraw fund</span>
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
                        <th>Date Applied</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6"> <label>No withdrawal has been made yet!</label> </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>