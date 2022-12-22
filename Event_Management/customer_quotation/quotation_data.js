const quote_form = document.querySelector(".quote_form"),
submit_btn = document.querySelector(".btn-submit");

form.onsubmit = (e)=>{
    e.preventDefault();
}

submitBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest(); //XML object
    xhr.open("POST", "php/quotation_data.php", true);
    
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "Success"){
                    alert("Success");
                }else{
                    
                    
                }
            }
        }
    }
    //sending form data to php 
    let formData = new FormData(quote_form);
    xhr.send(formData);

}