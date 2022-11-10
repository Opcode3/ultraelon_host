const frmRegister = document.querySelector("#frmRegister");
const frmLogin = document.querySelector("#frmLogin");
const btnSubmit = document.querySelector("#submit");
if(frmRegister){ frmRegister.addEventListener("submit", registerHandler);}
if(frmLogin){ frmLogin.addEventListener("submit", loginHandler);}

//const api_url = "http://192.168.43.19/projects/ultraelon/in/api/v1/"; //"https://testing.crownnation.org/api/";
const api_url =  (location.protocol == 'http:') ? "http://127.0.0.1/projects/ultra/api/v1/" : "https://127.0.0.1/projects/ultra/api/v1/" ; 
// const api_url =  (location.protocol !== 'https:') ? "http://ultraelon.giembs.com/api/v1/" : "https://ultraelon.giembs.com/api/v1/" ; 

console.log(api_url);
// form handler function
function registerHandler(e){
    e.preventDefault();
    startLoader();
    const parentEle = this;
    const username = el_value(this,"#username");
    const email = el_value(this,"#email");
    const password = el_value(this,"#password");
    const referredBy = el_value(this,"#referredBy");

    const form_data = {username: username, email: email, password: password, 
                            referredBy: referredBy, type: "register"}

                        console.log(form_data);
    make_call( async () => {
        const data = await postRequest(`${api_url}auth.php`, JSON.stringify(form_data));
        if(data.status_code == 201){
            notify(parentEle, data.message, "success");
        }else{
            notify(parentEle, data.message);
        }
        console.log(data);
        stopLoader()

    });
}


function loginHandler(e){
    e.preventDefault();
    startLoader();
    const parentEle = this;
    const username = el_value(parentEle,"#username");
    const password = el_value(parentEle,"#password");

    const form_data = {username: username, password: password, type: "auth"}
    // console.log(form_data)

    make_call( async () => {
        const data = await postRequest(`${api_url}auth.php`, JSON.stringify(form_data));
        if(data.status_code == 200 && data.message == "true"){
            notify(parentEle, "Redirecting you to your dashboard...", "success");
            setTimeout(()=>{ window.location.href = "./user" }, 3000);
            // setTimeout(()=>{ window.location.href = "./v1" }, 3000);
        }else{
            stopLoader()
            notify(parentEle, data.message);
        }
        // console.log(data)
    });
}


function make_call(callback){
    callback();
}

function startLoader(){
    btnSubmit.querySelector("#in-mtext").style.display = "none";
    btnSubmit.querySelector("#in-spinner").style.display = "block";
}

function stopLoader(){
    btnSubmit.querySelector("#in-mtext").style.display = "block";
    btnSubmit.querySelector("#in-spinner").style.display = "none";
}

function notify(ele, message, type = "error"){
    const notifyContainer = ele.querySelector("#notify");
    notifyContainer.innerHTML = "";
    notifyContainer.appendChild(manageAlert(message, type))
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

function manageAlert(information, type = "error"){
    const alert = document.createElement("div");
    const alert_type  = type == "success" ? "uk-alert-success" : "uk-alert-danger";
    alert.setAttribute("class", alert_type);
    alert.setAttribute("uk-alert", "");
    const alertClose = document.createElement("a");
    alertClose.setAttribute("class", "uk-alert-close");
    alertClose.setAttribute("uk-close", "");
    const message = document.createElement("p");
    message.innerHTML = information;

    alert.appendChild(alertClose)
    alert.appendChild(message)
    return alert;
}