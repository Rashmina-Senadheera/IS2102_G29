const details_table= document.querySelector(".details_table"),
table_body = document.querySelector(".table_body");


setInterval(()=> {
    let xhr = new XMLHttpRequest(); //XML object
    xhr.open("GET", "php/customer_details_table.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                table_body.innerHTML = data;
                
            }
        }
    }
    
    xhr.send();

}, 500);




