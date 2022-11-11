<form id="withdrawForm" method="post">
    <div class="formControl">
        <select name="" required id="withdraw_address">
            <option value="">Select preferred wallet</option>
            <option value="bitcoin">Bitcoin address</option>
            <option value="eth">Etheruem address</option>
            <option value="ultra">Utra token address</option>
            <option value="bnb">BNB address</option>
            <option value="usdt">USDT address</option>
        </select>
    </div>
    <div class="formControl">
        <input type="hidden" id="jwt_token" value="<?php echo password_hash("JesusIsLordOfGlory", PASSWORD_BCRYPT); ?>">
        <input type="number" min="10" required id="withdraw_amount" placeholder="Amount">
    </div>
    <div class="formControl">
        <button>Withdraw</button>
    </div>
    <div class="modalNotifier">
        <svg id="modalAlertCloseBtn" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        <p></p>
    </div>
</form>