const event_planner_card = document.querySelector(".evt_planner_cards");


setInterval(()=> {
    let xhr = new XMLHttpRequest(); //XML object
    xhr.open("GET", "php/all_event_planners.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                
                    event_planner_card.innerHTML = data;
                
            }
        }
    }
    xhr.send();

}, 500);