function show_form(){
    const form = document.getElementById("add-form");
    const blur = document.getElementById("blur_bg");
    form.style.opacity ='1';
    form.style.zIndex = '2';
    blur.style.opacity ='1';
    blur.style.zIndex = '1';
    
}
function hide_form(){
    var form = document.getElementById("add-form");
    var blur = document.getElementById("blur_bg");
    form.style.opacity ='-1';
    form.style.zIndex = '-1';
    blur.style.opacity ='-1';
    blur.style.zIndex = '-1';
    
}