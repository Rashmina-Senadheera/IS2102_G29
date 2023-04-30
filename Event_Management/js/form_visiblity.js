const add_form = document.getElementById("add-form"),
blur = document.getElementById("blur_bg");
//form = document.getElementById(".add");

const closeBtn = document.querySelector(".close"),
addBtn = document.querySelector(".add-btn");




addBtn.onclick=()=>{
    show_form();
}

closeBtn.onclick=()=>{
    hide_form();
    form.reset();
    errorText.style.display ="none";
    
}





function show_form(){

    add_form.style.opacity ='1';
    add_form.style.zIndex = '2';
    blur.style.opacity ='1';
    blur.style.zIndex = '1';
    
    
}
function hide_form(){
    add_form.style.opacity ='-1';
    add_form.style.zIndex = '-1';
    blur.style.opacity ='-1';
    blur.style.zIndex = '-1';
   
    
}