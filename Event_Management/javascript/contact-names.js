
const contact_btn = document.querySelector(".contact_btn"),
form = document.querySelector(".contact-names");

contact_btn.onclick = ()=>{
    let xhr = new XMLHttpRequest(); //XML object
    xhr.open("POST", "chat/chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                
                
                
            }
        }
    }
    //sending form data to php 
    let formData = new FormData(form);
    xhr.send(formData);

}