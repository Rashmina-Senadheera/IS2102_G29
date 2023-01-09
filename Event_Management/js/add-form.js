const form = document.querySelector(".add"),
submitBtn = document.querySelector(".submit-form"),
errorText = document.querySelector(".error-text");


form.onsubmit = (e)=>{
    e.preventDefault();
}

submitBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest(); //XML object
    xhr.open("POST", "../admin/passdata.php", true);
    
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "Success"){
                    hide_form();
                    form.reset();
                    errorText.style.display = "none";
                }else{
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


