function logout_check(){
    var result = confirm("Do you want to leave the site?");
    if(result==false){
        event.preventDefault();
    }
}