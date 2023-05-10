// venue 

var venueBtns = document.querySelectorAll(".venue-radiobtns label");
var contents = document.querySelectorAll(".venue_img .img ");
var venueNeeded = document.querySelectorAll(".venue .radio-btns label");
var venueInputbox = document.querySelectorAll(".venue .input_box");
var selectedOption = document.getElementsByName('venue');
//var selectedOption = $("input:radio[name=venue]:checked").val();



showVenue(0,'#ff0000');
function venue_check(Index){
    
    
    venueNeeded.forEach(function(node){
        node.classList.remove('needed');
    });
    venueInputbox.forEach(function(node){
        node.style.display="none";
        
    });
    if(Index == 0){       
        venueNeeded[Index].classList.add('needed');
        venueInputbox[Index].style.display="flex";
        venue_error.style.display = "none";

        // venueInputbox[Index].classList.add('show');

        
        v = selectedOption[Index].value;
        console.log(v);

    }
    else if(Index ==1){       

        venueNeeded[Index].classList.add('needed');  
        venue_error.style.display = "none";

        v = selectedOption[Index].value;
        console.log(v);

    }
    
    
}
function showVenue(panelIndex){
    venueBtns.forEach(function(node){
        // node.style.color="";
        node.style.backgroundColor="";
    });
    // venueBtns[panelIndex].style.color=colorCode;
    venueBtns[panelIndex].style.backgroundColor='#D0AFF4';

    contents.forEach(function(node){
        node.style.display="none";
    });
    contents[panelIndex].style.display="block";
    
    

}

// Food and Beverages
var foodNeeded = document.querySelectorAll(".food_bev .radio-btns label");
var foodInfo = document.querySelector(".food_bev .food_info");
var selectedOption1 = document.getElementsByName('food');

function food_check(Index){
    
    
    foodNeeded.forEach(function(node){
        node.classList.remove('needed');
    });
    if(Index == 0){       

        foodNeeded[0].classList.add('needed');
        foodInfo.style.display="block";
        food_error.style.display = "none";
        // venueInputbox[Index].classList.add('show');
        v = selectedOption1[Index].value;
        console.log(v);

    }
    else if(Index ==1){       

        foodNeeded[1].classList.add('needed');  
        foodInfo.style.display="none";  
        food_error.style.display = "none";

        v = selectedOption1[Index].value;
        console.log(v);

    }
    
    
}

// sound and lighting

var s_l_Needed = document.querySelectorAll(".s_l .radio-btns label");
var s_l_Info = document.querySelector(".sound_light .s_l_info");
var selectedOption2 = document.getElementsByName('s_l');


function s_l_check(Index){
    
    
    s_l_Needed.forEach(function(node){
        node.classList.remove('needed');
    });
    if(Index == 0){       

        s_l_Needed[0].classList.add('needed');
        s_l_Info.style.display="flex";
        s_l_error.style.display = "none";

        // venueInputbox[Index].classList.add('show');
        v = selectedOption2[Index].value;
        console.log(v);

    }
    else if(Index == 1){       

        s_l_Needed[1].classList.add('needed');  
        s_l_Info.style.display="none";
        s_l_error.style.display = "none";

        v = selectedOption2[Index].value;
        console.log(v);
      
        sound_check(1);
        light_check(1);
        s_Needed.forEach(function(node){
            node.classList.remove('needed');
        });
        l_Needed.forEach(function(node){
            node.classList.remove('needed');
        });
        clearRadioButtons(selectedOption3);
        clearRadioButtons(selectedOption4);

    }
    
    
}
//sound 
var s_Needed = document.querySelectorAll(".sound .radio-btns label");
var s_Info = document.querySelector(".s_l_info .sound .input_box");
var selectedOption3 = document.getElementsByName('sound');

function sound_check(Index){
    
    
    s_Needed.forEach(function(node){
        node.classList.remove('needed');
    });
    if(Index == 0){       

        s_Needed[0].classList.add('needed');
        s_Info.style.display="flex";
        // venueInputbox[Index].classList.add('show');
        v = selectedOption3[Index].value;
        console.log(v);

    }
    else if(Index == 1){       

        s_Needed[1].classList.add('needed');  
        s_Info.style.display="none";      
        v = selectedOption3[Index].value;
        console.log(v);
        

    }
    
    
}
//lighting
var l_Needed = document.querySelectorAll(".light .radio-btns label");
var l_Info = document.querySelector(".s_l_info .light .input_box");
var selectedOption4 = document.getElementsByName('light');

function light_check(Index){
    
    
    l_Needed.forEach(function(node){
        node.classList.remove('needed');
    });
    if(Index == 0){       

        l_Needed[0].classList.add('needed');
        l_Info.style.display="flex";
        // venueInputbox[Index].classList.add('show');
        v = selectedOption4[Index].value;
        console.log(v);

    }
    else if(Index ==1){       

        l_Needed[1].classList.add('needed');  
        l_Info.style.display="none";      
        v = selectedOption4[Index].value;
        console.log(v);

    }
    
    
}


//photo and video
var p_v_Needed = document.querySelectorAll(".photo_video .radio-btns label");
var p_v_Info = document.querySelector(".photo_video .p_v_info");
var selectedOption5 = document.getElementsByName('pv');

function p_v_check(Index){
    
    
    p_v_Needed.forEach(function(node){
        node.classList.remove('needed');
    });
    if(Index == 0){       

        p_v_Needed[0].classList.add('needed');
        p_v_Info.style.display="flex";
        p_v_error.style.display = "none";

        // venueInputbox[Index].classList.add('show');
        v = selectedOption5[Index].value;
        console.log(v);

    }
    else if(Index ==1){       

        p_v_Needed[1].classList.add('needed');  
        p_v_Info.style.display="none";
        p_v_error.style.display = "none";
        
        v = selectedOption5[Index].value;
        console.log(v);

        photo_check(1);
        video_check(1);
        p_Needed.forEach(function(node){
            node.classList.remove('needed');
        });
        v_Needed.forEach(function(node){
            node.classList.remove('needed');
        });
        clearRadioButtons(selectedOption6);
        clearRadioButtons(selectedOption7);

    }
    
    
}
//photo
var p_Needed = document.querySelectorAll(".photo .radio-btns label");
var p_Info = document.querySelector(".photo .input_box");
var selectedOption6 = document.getElementsByName('photo');

function photo_check(Index){
    
    
    p_Needed.forEach(function(node){
        node.classList.remove('needed');
    });
    if(Index == 0){       

        p_Needed[0].classList.add('needed');
        p_Info.style.display="flex";
        // venueInputbox[Index].classList.add('show');
        v = selectedOption6[Index].value;
        console.log(v);

    }
    else if(Index ==1){       

        p_Needed[1].classList.add('needed');  
        p_Info.style.display="none";      
        v = selectedOption6[Index].value;
        console.log(v);

    }
    
    
}

//video
var v_Needed = document.querySelectorAll(".video .radio-btns label");
var v_Info = document.querySelector(".video .input_box");
var selectedOption7 = document.getElementsByName('video');

function video_check(Index){
    
    
    v_Needed.forEach(function(node){
        node.classList.remove('needed');
    });
    if(Index == 0){       

        v_Needed[0].classList.add('needed');
        v_Info.style.display="flex";
        // venueInputbox[Index].classList.add('show');
        v = selectedOption7[Index].value;
        console.log(v);

    }
    else if(Index ==1){       

        v_Needed[1].classList.add('needed');  
        v_Info.style.display="none";      
        v = selectedOption7[Index].value;
        console.log(v);

    }
    
    
}






// clear radio checked
function clearRadioButtons(array){
    for (var i=0; i<array.length; i++){
        var radioButton = array[i];
        radioButton.checked = false;
    }
}

const quote_form = document.querySelector(".quote_form"),
submit_btn = document.querySelector(".btn-submit"),
error_txt = document.querySelectorAll(".error_txt"),
fields_error = document.querySelector(".fields_error"),
event_type_error = document.querySelector(".event_type_error"),
no_pax_error = document.querySelector(".no_pax_error"),
theme_error = document.querySelector(".theme_error"),
date_error = document.querySelector(".date_error"),
budget_error = document.querySelector(".budget_error"),
min_budget_error = document.querySelector(".min_budget_error"),
time_error = document.querySelector(".time_error"),
from_date_error = document.querySelector(".from_date_error"),
to_date_error = document.querySelector(".to_date_error"),
indoor_remarks_error = document.querySelector(".indoor_remarks_error"),
outdoor_remarks_error = document.querySelector(".outdoor_remarks_error"),
venue_type_error = document.querySelector(".venue_type_error"),
venue_error = document.querySelector(".venue_error"),
food_error = document.querySelector(".food_error"),
food_remarks_error = document.querySelector(".food_remarks_error"),
s_l_error = document.querySelector(".s_l_error"),
s_l_remarks_error = document.querySelector(".s_l_remarks_error"),
p_v_remarks_error = document.querySelector(".p_v_remarks_error"),
p_v_error = document.querySelector(".p_v_error"),
success = document.querySelector(".success");

var data;
var dataArr;
var error;



quote_form.onsubmit = (e)=>{
    e.preventDefault();
}

submit_btn.onclick = ()=>{
    let xhr = new XMLHttpRequest(); //XML object
    xhr.open("POST", "../customer/php/quotation_data.php", true);
    
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                data = xhr.response;
                dataArr = data.split(" ");

                if(dataArr.includes("success")){
                        // alert("Success");
                        quote_form.reset();
                        error_txt.style.display = "none";
                        success.style.display = "block";

                        //venue
                        venueNeeded.forEach(function(node){
                            node.classList.remove('needed');
                        });
                        venueInputbox.style.display="none"


                        foodNeeded.forEach(function(node){
                            node.classList.remove('needed');
                        });
                        
                        foodInfo.style.display="none";


                        s_l_Needed.forEach(function(node){
                            node.classList.remove('needed');
                        });
                        s_l_Info.style.display="none";

                        p_v_Needed.forEach(function(node){
                            node.classList.remove('needed');
                        });
                        p_v_Info.style.display="none";

                    }
                else{
                    
                    //event type
                    if(dataArr.includes("event_type_error")){
                        event_type_error.style.display = "block";
                    }
                    else{
                        event_type_error.style.display = "none";
                    }

                    //no. of participants
                    if(dataArr.includes("no_pax_error")){
                        no_pax_error.style.display = "block";
                    }
                    else{
                        no_pax_error.style.display = "none";
                    }

                    //theme
                    if(dataArr.includes("theme_error")){
                        theme_error.style.display = "block";
                    }
                    else{
                        theme_error.style.display = "none";
                    }

                    //date
                    if(dataArr.includes("date_error")){
                        date_error.style.display = "block";
                    }
                    else{
                        date_error.style.display = "none";
                    }

                    //from and to date
                    if(dataArr.includes("from_date_error")){
                        from_date_error.style.display = "block";
                    }
                    else{
                        from_date_error.style.display = "none";
                        

                    }

                    //to date
                    if(dataArr.includes("to_date_error")){
                        to_date_error.style.display = "block";
                    }
                    else{
                        to_date_error.style.display = "none";
                        
                    }

                    //budget
                    if(dataArr.includes("budget_error")){
                        budget_error.style.display = "block";
                    }
                    else{
                        budget_error.style.display = "none";
                        if(dataArr.includes("min_budget_error")){
                            min_budget_error.style.display = "block";
                        }
                        else{
                            min_budget_error.style.display = "none";
                        }
                    }


                    //time
                    if(dataArr.includes("time_error")){
                        time_error.style.display = "block";
                    }
                    else{
                        time_error.style.display = "none";
                    }
                    

                    //venue
                    if(dataArr.includes("venue_error")){
                        venue_error.style.display = "block";

                    }
                    else{
                        venue_error.style.display = "none";

                    }

                    if(dataArr.includes("venue_type_error")){
                        venue_type_error.style.display = "block";

                    }
                    else{
                        venue_type_error.style.display = "none";

                    }

                    //indoor
                    if(dataArr.includes("indoor_remarks_error")){
                        indoor_remarks_error.style.display = "block";
                        // alert(data);
                    }
                    else{
                        indoor_remarks_error.style.display = "none";
                        // alert(data);
                    }

                    //outdoor
                    if(dataArr.includes("outdoor_remarks_error")){
                        outdoor_remarks_error.style.display = "block";
                        // alert(data);
                    }
                    else{
                        outdoor_remarks_error.style.display = "none";
                        // alert(data);
                    }
                    if(dataArr.includes("good")){
                        // outdoor_remarks_error.style.display = "block";
                        // alert(data);
                    }
                    else{
                        // outdoor_remarks_error.style.display = "none";
                        // alert(data);
                    }
                    
                    //food
                    if(dataArr.includes("food_error")){
                        food_error.style.display = "block";
                    }
                    else{
                        food_error.style.display = "none";
                    }
                    //food_remarks
                    if(dataArr.includes("food_remarks_error")){
                        food_remarks_error.style.display = "block";
                    }
                    else{
                        food_remarks_error.style.display = "none";
                    }
                    //sound and light
                    if(dataArr.includes("s_l_error")){
                        s_l_error.style.display = "block";
                    }
                    else{
                        s_l_error.style.display = "none";
                    }
                    // sound and light remarks
                    if(dataArr.includes("s_l_remarks_error")){
                        s_l_remarks_error.style.display = "block";
                        
                    }
                    else{
                        s_l_remarks_error.style.display = "none";
                    }

                    //photo and video 
                    if(dataArr.includes("p_v_error")){
                        p_v_error.style.display = "block";
                        
                    }
                    else{
                        p_v_error.style.display = "none";
                        alert(data);
                    }

                    //photo and video remarks
                    if(dataArr.includes("p_v_remarks_error")){
                        p_v_remarks_error.style.display = "block";
                        
                    }
                    else{
                        p_v_remarks_error.style.display = "none";
                    }

                    
                    
                    
                    
                    
                    
                    
                }
                


                

                
            }
        }
    }
    //sending form data to php 
    let formData = new FormData(quote_form);
    xhr.send(formData);

}


                                        