const form = document.querySelector("form"),
loginBtn = document.querySelector(".login"),
errorText = document.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}

loginBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest(); //XML object
    xhr.open("POST", "php/login.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "Success"){
                    location.href = "location_check.php";
                    form.reset();
                    
                }
                else if(data == "Null"){
                    location.href = "loginPwd.php";
                    form.reset();
                }
                else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                    
                }
            }
        }
    }
    //sending form data to php 
    let formData = new FormData(form);
    xhr.send(formData);

}