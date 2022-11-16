const handBurger = document.querySelector("#handBurger");
const btnCloseHandBurger = document.querySelector("#btnCloseHandBurger");
const modalCancelButton = document.querySelector("#modalCancelButton");
const modalFrame = document.querySelector("#modalFrame");
const btnModelViewSupportRequest = document.querySelectorAll(".btnModelViewSupportRequest");
const btnModelViewProfile = document.querySelectorAll(".btnModelViewProfile");


//const api_url = "http://192.168.43.19/projects/ultraelon/in/api/v1/"; //"https://testing.crownnation.org/api/";
const api_url =  (location.protocol == 'http:') ? "http://127.0.0.1/projects/ultra/api/v1/" : "https://127.0.0.1/projects/ultra/api/v1/" ; 
// const api_url =  (location.protocol !== 'https:') ? "http://ultraelon.giembs.com/api/v1/" : "https://ultraelon.giembs.com/api/v1/" ; 


if(handBurger){
    handBurger.addEventListener("click", function(){
        document.querySelector("aside").classList.add("showAside");
    });
}

if(btnCloseHandBurger){
    btnCloseHandBurger.addEventListener("click", function(){
        document.querySelector("aside").classList.remove("showAside");
    });
}


// Modal Frame 
if(modalFrame){
    modalCancelButton.addEventListener("click", function(){
        modalFrame.classList.remove("showModel");
    })
}


// Modal frame for support menu
if(btnModelViewSupportRequest){
    for (let m = 0; m < btnModelViewSupportRequest.length; m++) {
        btnModelViewSupportRequest[m].addEventListener("click", function(){
            const json = this.getAttribute("data-json");
            document.querySelector("#supportContent").innerHTML = json;
            modalFrame.classList.add("showModel");
        })
    }
}


// Modal frame for profile and wallet view
if(btnModelViewProfile){
    for (let m = 0; m < btnModelViewProfile.length; m++) {
        btnModelViewProfile[m].addEventListener("click", function(){
            // console.log(`${m} was clicked!`);
            const json = this.getAttribute("data-json");
            document.querySelector("#walletContent").innerHTML = json;
            modalFrame.classList.add("showModel");

        })
    }
}





/// Listing for investment triggers

const btnInvestmentPending = document.querySelectorAll(".btnInvestmentPending");
const btnInvestmentPaid = document.querySelectorAll(".btnInvestmentPaid");
const btnInvestmentClosed = document.querySelectorAll(".btnInvestmentClosed");
// pending
if(btnInvestmentPending){
    for (let m = 0; m < btnInvestmentPending.length; m++) {
        btnInvestmentPending[m].addEventListener("click", function(){
            const userId = this.getAttribute("data-id");
            if(confirm("Hello Admin; You are about to approve payment. Hope this user has paid the investment capital as applied for; in this investment plan? ")){
                const form_data = {userId, type: "pendingInvestment"}
                make_call( async () => {
                    const data = await postRequest(`${api_url}adminInvestment.php`, JSON.stringify(form_data));
                    if(data.status_code == 200){
                        alert(data.message);
                        setTimeout(()=>{ window.location.reload()}, 100);
                    }else{
                        alert(data.message)
                    }
                    console.log(data)
                }); 
            }
        })
    }
}

// paid
if(btnInvestmentPaid){
    for (let m = 0; m < btnInvestmentPaid.length; m++) {
        btnInvestmentPaid[m].addEventListener("click", function(){
            const investId = this.getAttribute("data-id");
            const userId = this.getAttribute("data-user");
            const dataProfit = this.getAttribute("data-profit");
            if(confirm("Hello Admin; You are about to pay this user for investing on the specified investment plan. Hope this investment duration has elapsed. Your are about to remove his fund from locked savings into his wallet account. Say Okay if Yes or Cancel if No? ")){
                // alert(`User ID ${userID}`);
                const investProfit = dataProfit.split("&");
                const walletInvest = investProfit[0];
                const walletUltra = investProfit[1];
                const form_data = {investId, userId, walletInvest, walletUltra, type: "paidInvestment"}
                // console.log(form_data)
                // console.log(walletInvest)
                make_call( async () => {
                    const data = await postRequest(`${api_url}adminInvestment.php`, JSON.stringify(form_data));
                    if(data.status_code == 200){
                        alert(data.message);
                        setTimeout(()=>{ window.location.reload()}, 100);
                    }else{
                        alert(data.message)
                    }
                    console.log(data)
                }); 
            }
        })
    }
}

// closed
if(btnInvestmentClosed){
    for (let m = 0; m < btnInvestmentClosed.length; m++) {
        btnInvestmentClosed[m].addEventListener("click", function(){
            alert("Hello Admin; You have already released this users fund into his wallet account. User has been completely settled for his investment. ");
        });
    }
}


// 

// list for withdrawal trigger
const btnWithdrawPending = document.querySelectorAll(".btnWithdrawPending");
const btnWithdrawPaid = document.querySelectorAll(".btnWithdrawPaid");

if(btnWithdrawPending){
    for (let m = 0; m < btnWithdrawPending.length; m++) {
        btnWithdrawPending[m].addEventListener("click", function(){
            const userId = this.getAttribute("data-id");
            if(confirm("Hellow Admin, before clicking this button; make sure you have successfully transferred the specified withdrawal fund to the user. If you wish to proceed, click Ok, if no click Cancel.")){
                const form_data = {userId, type: "withdraw"}
                make_call( async () => {
                    const data = await postRequest(`${api_url}adminWithdraw.php`, JSON.stringify(form_data));
                    if(data.status_code == 200 && data.message == "true"){
                        alert("Paid transaction was successful. Reloading page in a second...");
                        setTimeout(()=>{ window.location.reload()}, 100);
                    }else{
                        alert(data.message)
                    }
                    console.log(data)
                });     
            }
        });        
    }
}

if(btnWithdrawPaid){
    for (let m = 0; m < btnWithdrawPaid.length; m++) {
        btnWithdrawPaid[m].addEventListener("click", function(){
            alert("Hello Admin, you have cleared this withdrawal petition.");
        });        
    }
}


//list for referral confirm payment trigger
const btnReferralPaid = document.querySelectorAll(".btnReferralPaid");
const btnReferralClosed = document.querySelectorAll(".btnReferralClosed");
const btnReferralPending = document.querySelectorAll(".btnReferralPending");

if(btnReferralPaid){
    for (let m = 0; m < btnReferralPaid.length; m++) {
        btnReferralPaid[m].addEventListener("click", function(){
            const userId = this.getAttribute("data-id");
            const referredBy = this.getAttribute("data-referred");
            if(confirm("Hello Admin, You are about to release the referral locked bonus. Are you sure you want to?")){
                const form_data = {userId, referredBy, type: "referralPay"}
                make_call( async () => {
                    const data = await postRequest(`${api_url}adminReferral.php`, JSON.stringify(form_data));
                    if(data.status_code == 200 && data.message == "true"){
                        alert("Paid transaction was successful. Reloading page in a second...");
                        setTimeout(()=>{ window.location.reload()}, 100);
                    }else{
                        alert(data.message)
                    }
                    console.log(data)
                });
            }
        });
        
    }
}

if(btnReferralClosed){
    for (let m = 0; m < btnReferralClosed.length; m++) {
        btnReferralClosed[m].addEventListener("click", function(){
            alert("Hello Admin, You have already released this referral locked bonus to the user");
        });
        
    }
}

if(btnReferralPending){
    for (let m = 0; m < btnReferralPending.length; m++) {
        btnReferralPending[m].addEventListener("click", function(){
            alert("Hello Admin, The referred investor has not paid the due investment capital.");
        });
        
    }
}






//login formHandler

const loginForm = document.querySelector("#loginForm");

if(loginForm){
    loginForm.addEventListener("submit", function(e){
        e.preventDefault();
        const username = this.querySelector("#username").value;
        const password = this.querySelector("#password").value;

        const form_data = {username: username, password: password, type: "jwtAuth"}
    // console.log(form_data)

    make_call( async () => {
        const data = await postRequest(`${api_url}adminAuth.php`, JSON.stringify(form_data));
        if(data.status_code == 200 && data.message == "true"){
            alert("Redirecting you to your dashboard...");
            setTimeout(()=>{ window.location.href = "./" }, 500);
        }else{
            alert(data.message)
        }
        console.log(data)
    });

    })
}


function make_call(callback){
    callback();
}

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