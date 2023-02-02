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
        // venueInputbox[Index].classList.add('show');

        
        v = selectedOption[Index].value;
        console.log(v);

    }
    else if(Index ==1){       

        venueNeeded[Index].classList.add('needed');        
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
        // venueInputbox[Index].classList.add('show');
        v = selectedOption1[Index].value;
        console.log(v);

    }
    else if(Index ==1){       

        foodNeeded[1].classList.add('needed');  
        foodInfo.style.display="none";      
        v = selectedOption1[Index].value;
        console.log(v);

    }
    
    
}

// sound and lighting

var s_l_Needed = document.querySelectorAll(".s_l .radio-btns label");
var s_l_Info = document.querySelector(".sound_light .s_l_info");
var selectedOption2 = document.getElementsByName('s&l');


function s_l_check(Index){
    
    
    s_l_Needed.forEach(function(node){
        node.classList.remove('needed');
    });
    if(Index == 0){       

        s_l_Needed[0].classList.add('needed');
        s_l_Info.style.display="flex";
        // venueInputbox[Index].classList.add('show');
        v = selectedOption2[Index].value;
        console.log(v);

    }
    else if(Index == 1){       

        s_l_Needed[1].classList.add('needed');  
        s_l_Info.style.display="none";
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
        // venueInputbox[Index].classList.add('show');
        v = selectedOption5[Index].value;
        console.log(v);

    }
    else if(Index ==1){       

        p_v_Needed[1].classList.add('needed');  
        p_v_Info.style.display="none";      
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