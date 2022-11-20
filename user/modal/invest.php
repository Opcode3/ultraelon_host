<div id="depositShow">
    <p>
        Kindly choose your payment mode, by clicking on the address of 
        your preferred payment type.
    </p>

    <div id="walletFrame">
        <div class="item">
            <span>Bitcoin Deposit Address</span>
            <p>bc1q96mj8zeuy3yfxeykldfxqah8jqmum2lycne7cg</p>
        </div>
        <div class="item">
            <span>Ethereum Deposit Address</span>
            <p>0xE43A77c87E31CabC3c52Faf8D53eBBbbb7ABf90b</p>
        </div>
        <div class="item">
            <span>BNB Beacon Chain Deposit Address</span>
            <p>bnb1z88vch99e307wkdfper7rhecz3krag7vqfjmge</p>
        </div>
        <div class="item">
            <span>BNB Smart Chain Deposit Address</span>
            <p>0xE43A77c87E31CabC3c52Faf8D53eBBbbb7ABf90b</p>
        </div>
        <div class="item">
            <span>USDT Deposit Address</span>
            <p>0xE43A77c87E31CabC3c52Faf8D53eBBbbb7ABf90b</p>
        </div>
    </div>
    <p class="know">Make payment to any of the above addresses and click continue below.</p>
    <button>Continue</button>
</div>
<form id="depositForm" action="" method="post">
    <p>Please, ensure every field is correctly filled with their appropriate details.</p>
    <div class="formControl">
        <input type="number" required name="amount" id="depositors_amount" placeholder="Enter amount deposited">
    </div>

    <div class="formControl">
        <input type="text" name="address" required id="depositors_address" placeholder="Enter depositors address">
    </div>

    <div class="formControl">
        <select id="account_type" required>
            <option value="">Select a depositor account type</option>
            <option value="Bitcoin">Bitcoin</option>
            <option value="Ethereum">Ethereum</option>
            <option value="BNB">BNB</option>
            <option value="USDT">USDT</option>
        </select>
    </div>

    <div class="formControl">
        <button>Proceed</button>
    </div>
    <div class="modalNotifier">
        <svg id="modalAlertCloseBtn" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        <p></p>
    </div>
</form>