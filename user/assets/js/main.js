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
const modalInvestPro = document.querySelector("#modalInvestPro");


// a globale variable to monitor investment type:
let investmentType = -1;


const modalAlertCloseBtn = document.querySelector("#modalAlertCloseBtn");
const notifier = document.querySelector(".modalNotifier");

const api_url =  (location.protocol == 'http:') ? "http://127.0.0.1/projects/ultra/api/v1/" : "https://127.0.0.1/projects/ultra/api/v1/" ; 
// const api_url =  (location.protocol !== 'https:') ? "http://ultraelon.giembs.com/api/v1/" : "https://ultraelon.giembs.com/api/v1/" ; 

// referrals
const copyLink = document.querySelector("#copyLink");

if(copyLink){
    const copyText = document.querySelector("#linkToCopy").innerHTML;
    copyLink.addEventListener("click", function(){
        navigator.clipboard.writeText(copyText);
        console.log(copyText)
        alert("Text copied");
    });
}
// wallet address
const walletFrame = document.querySelector("#walletFrame");

if(walletFrame){
    const pWallet = walletFrame.querySelectorAll(".item p");
    // console.log(pWallet)
    for (let p = 0; p < pWallet.length; p++) {
        pWallet[p].addEventListener("click", function(){
            navigator.clipboard.writeText(this.innerHTML);
            console.log(this.innerHTML)
            alert("Text copied");
        });
    }
}

// withdrawals
if(modalInvestTrigger){    
    modalInvestTrigger.addEventListener("click", () => showWithdrawal(0, modalInvestTrigger))
    modalUltraTrigger.addEventListener("click", () => showWithdrawal(1, modalUltraTrigger))
    modalReferralTrigger.addEventListener("click", () => showWithdrawal(2, modalReferralTrigger))
}


// work on investment deposit
const depositShow = document.querySelector("#depositShow");
const depositForm = document.querySelector("#depositForm");
const proInvestmentShow = document.querySelector("#proInvestmentShow");
if(depositShow){
    depositShow.querySelector("button").addEventListener("click", e => {
        depositShow.style.display = "none";
        depositForm.style.display = "block";
        proInvestmentShow.style.display = "none";
        console.log("Na here")
    })
}

if(depositForm){
    depositForm.addEventListener("submit", function(e){
        e.preventDefault();
        const depositors_amount = el_value(this, "#depositors_amount");
        const depositors_address = el_value(this, "#depositors_address");
        const account_type = el_value(this, "#account_type");
        const depositors_plan = investmentType == 3 ? "classic" : 
                                   investmentType == 4 ? "premium" : "pro";
        if(investmentType != 5){        
            const min = depositors_plan == "classic" ? 5 : 500;
            const max = depositors_plan == "classic" ? 500 : 3000;
            if(depositors_amount >= min && depositors_amount <= max){
                const investmentPayload = JSON.stringify({
                    amount: depositors_amount, address: depositors_address,
                    plan: depositors_plan, type: account_type, from: "invest_1"
                });
                // console.log(investmentPayload);
                make_call( async () => {
                    const response = await postRequest(`${api_url}investment.php`, investmentPayload);
                    console.log(response);
                    if(response.status_code == 201){
                        startNotifier(response.message, "success");
                        setTimeout(()=>{ window.location.reload()}, 2000);
                    }else{
                        startNotifier(response.message)
                    }
                    console.log("Stop loading api!!!")
                });
                // startNotifier("Make Investment!"+investmentType, "success");
            }else{
                startNotifier("Your depositing amount is either above or below your selected investment plan!")
            }
        }
    })
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

        console.log("Jesus is Lord!")
        modelSubtitle.innerHTML = `Withdrawing from ${ index == 0 ? "Investment" : index == 1 ? "Ultra token" : "Referral Bonus"} Earnings`;
        modelSubtitle.setAttribute("data-from", index == 0 ? "invest" : index == 1 ? "ultra" : "referral");
        
        modalWithdraw.classList.add("showInnerModel");
        // modalInvest.classList.remove("showInnerModel");
        modalInvestPro.classList.remove("showInnerModel");
        

        modal.classList.remove("hideModal");
    }else{

        if(redrawableAmount == 0){
            alert("Ooooooops!, Your available withdrawals balance is zero")
        }else{
            alert("Your available withdrawals balance is below the withdrawing limit")
        }
    }
}

function showInvestment(index){
    if(index != 5){
        modelSubtitle.innerHTML = `Making payment for ${ index == 3 ? "Classic" : index == 4 ? "Premium" : "Pro"} Investment Plan`;
        modalInvest.classList.add("showInnerModel");
        // modalWithdraw.classList.remove("showInnerModel");
        modalInvestPro.classList.remove("showInnerModel")
        modal.classList.remove("hideModal");
        depositForm.style.display = "none";
        depositShow.style.display = "block";
        proInvestmentShow.style.display = "none";
    }else{
        modelSubtitle.innerHTML = `Welcome message from Mr. Nicolas Gilot`;
        modalInvest.classList.remove("showInnerModel");
        // modalWithdraw.classList.remove("showInnerModel");
        modalInvestPro.classList.add("showInnerModel")
        modal.classList.remove("hideModal");
        depositForm.style.display = "none";
        depositShow.style.display = "none";
        proInvestmentShow.style.display = "block";

    }
    investmentType = index;
}

// withdrawFormHandler
const withdrawForm = document.querySelector("#withdrawForm");

if(withdrawForm){
    withdrawForm.addEventListener("submit", function(e){
        e.preventDefault();
        console.log("Start loading api!!!")
        const type = el_value(withdrawForm, "#withdraw_address");
        const jwt_token = el_value(withdrawForm,"#jwt_token");
        const withdraw_amount = el_value(withdrawForm, "#withdraw_amount");
        const withdraw_from = modelSubtitle.getAttribute("data-from");
        // continue HERE
        const withdraw_data = JSON.stringify({type, jwt: jwt_token, amount: withdraw_amount, from: withdraw_from});

        // console.log(withdraw_data);

        make_call( async () => {
            const response = await postRequest(`${api_url}withdraw.php`, withdraw_data);
            
            if(response.status_code == 201){
                // modal.classList.add("hideModal")
                // window.location.reload();
                startNotifier(response.message, "success");
                setTimeout(()=>{ window.location.reload()}, 4100);
            }else{
                startNotifier(response.message)
            }
            // if(data.status_code == 200 && data.message == "true"){
            // }
        });
        // console.log(`Type: ${type}, JWT: ${jwt_token}, Amount: ${withdraw_amount}`)
    });
}


/// Default reuse component
// modal alert functionality



function startNotifier(message, type = "error"){
    if(type == "success"){
        notifier.classList.add("success");
        console.log(message)
    }else{
        notifier.classList.add("error");
    }
    notifier.querySelector("p").innerHTML = message;
    setTimeout(() => stopNotifier(), 6000); 
}

function stopNotifier(){
    notifier.classList.remove("error");
    notifier.classList.remove("success");
}
if(notifier){
    modalAlertCloseBtn.addEventListener("click", e => { stopNotifier()})
}


function make_call(callback){
    callback();
}

const el_value = (parent, pointer) => parent.querySelector(pointer).value;

async function postRequest(url, request_data = [], headers = {'Content-Type': 'application/json'}){
    try {
        const response = await fetch(url, {method: 'POST', headers: headers, body: request_data});
        // console.log(response.text())
        return await response.json();
    } catch (error) {
        // console.error("Unable to connect to server", error)
        console.log("Here");
        return { message: 'unable to 55 connect to server.'}
    }
}