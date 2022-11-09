const modalCancelBtn = document.querySelector("#modalCancelBtn");
const modal = document.querySelector("#modal");

const modalInvestTrigger = document.querySelector("#modalInvestTrigger");
const modalUltraTrigger = document.querySelector("#modalUltraTrigger");
const modalReferralTrigger = document.querySelector("#modalReferralTrigger");




modalInvestTrigger.addEventListener("click", () => showWithdrawal(0))
modalCancelBtn.addEventListener("click", () => {
    // alert("Jesus"); 
    modal.classList.add("hideModal");

})


function showWithdrawal(index){

    modal.classList.remove("hideModal");
}

// 

// hideModal