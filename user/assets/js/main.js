const modalCancelBtn = document.querySelector("#modalCancelBtn");
const modal = document.querySelector("#modal");
const modelSubtitle = document.querySelector("#modelSubtitle");

const modalInvestTrigger = document.querySelector("#modalInvestTrigger");
const modalUltraTrigger = document.querySelector("#modalUltraTrigger");
const modalReferralTrigger = document.querySelector("#modalReferralTrigger");


const classicInvestTrigger = document.querySelector("#classicInvestTrigger");
const premiumInvestTrigger = document.querySelector("#premiumInvestTrigger");
const proInvestTrigger = document.querySelector("#proInvestTrigger");

const modalWithdraw = document.querySelector("#modalWithdraw");
const modalInvest = document.querySelector("#modalInvest");


// referrals
const copyLink = document.querySelector("#copyLink");

if(copyLink){
    const copyFrom = document.querySelector("#linkToCopy");
    copyLink.addEventListener("click", () => copyClickedText(copyFrom));
}


// wallet address

const walletFrame = document.querySelector("#walletFrame");

if(walletFrame){
    const pWallet = walletFrame.querySelectorAll(".item p");
    // console.log(pWallet)
    for (let p = 0; p < pWallet.length; p++) {
        pWallet[p].addEventListener("click", () => copyClickedText(pWallet[p]));
    }
    // copyLink.addEventListener("click", () => copyClickedText("#linkToCopy"));
}






// withdrawals
if(modalInvestTrigger){
    modalInvestTrigger.addEventListener("click", () => showWithdrawal(0, modalInvestTrigger))
    modalUltraTrigger.addEventListener("click", () => showWithdrawal(1, modalUltraTrigger))
    modalReferralTrigger.addEventListener("click", () => showWithdrawal(2, modalReferralTrigger))
}



// investment
if(premiumInvestTrigger){
    classicInvestTrigger.addEventListener("click", () => showInvestment(3))
    premiumInvestTrigger.addEventListener("click", () => showInvestment(4))
    proInvestTrigger.addEventListener("click", () => showInvestment(5))
}

modalCancelBtn.addEventListener("click", () => modal.classList.add("hideModal"));


function showWithdrawal(index, ele){
    const redrawableAmount = ele.getAttribute("data-amount");
    if(redrawableAmount >= 10){
        modelSubtitle.innerHTML = `Withdrawing from ${ index == 0 ? "Investment" : index == 1 ? "Ultra token" : "Referral Bonus"} Earnings`;
        modalWithdraw.classList.add("showInnerModel");
        modalInvest.classList.remove("showInnerModel");
        modal.classList.remove("hideModal");
    }else{

        if(redrawableAmount == 0){
            alert("Ooooooops!, Your available withdrawals balance is zero")
        }else{
            alert("Your available withdrawals balance is below the withdrawing limit")
        }
    }
    console.log();
}

function showInvestment(index){
    modelSubtitle.innerHTML = `Making payment for ${ index == 3 ? "Classic" : index == 4 ? "Premium" : "Pro"} Investment Plan`;
    modalInvest.classList.add("showInnerModel");
    modalWithdraw.classList.remove("showInnerModel");
    modal.classList.remove("hideModal");
}

// copyText
function copyClickedText(element){
    const copyText = element.innerHTML;
    navigator.clipboard.writeText(copyText);
    alert("Text copied");

}

// hideModal