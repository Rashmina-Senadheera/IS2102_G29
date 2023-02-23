const form = document.querySelector(".typing-area"),
chatBox = document.querySelector(".chat-box"),
inputField = document.querySelector(".input-field"),
sendBtn = document.querySelector(".send_btn"),
incoming_id = document.querySelector(".incoming_id").value.trim(),
no_msg = document.querySelector(".no_message");


form.onsubmit = (e)=>{
    e.preventDefault();
}
sendBtn.onclick = ()=> {
    // alert("hello");
    let xhr = new XMLHttpRequest(); //XML object
    xhr.open("POST", "../chat/php/insert-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = " ";
                scrollToBottom();
            }
        }
    }
    //sending form data to php 
    let formData = new FormData(form);
    xhr.send(formData);

}


function showDetails(id) {
    var evt_id = id.getAttribute("data-id");
    var evt_name = id.getAttribute("data-name");
    document.getElementById("incoming_id").value= evt_id;
    document.getElementById("name").innerHTML = evt_name;
    getData();
    
}
if(incoming_id != null && incoming_id!=undefined && incoming_id != ""){
    getData();
}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

function getData(){
    setInterval(()=> {
        let xhr = new XMLHttpRequest(); //XML object
            
            xhr.open("POST", "../chat/php/get-chat.php", true);
            xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        chatBox.innerHTML = data;
                        if(!chatBox.classList.contains("active")){
                            scrollToBottom();
                        }
                        // if(data == "thawama_na"){
                        //     alert(data);
                        // }
                        
                    }
                }
            }
            let formData = new FormData(form);
            xhr.send(formData);
    }, 500);
}

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}


        
        


