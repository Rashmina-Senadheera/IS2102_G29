var stars = document.querySelectorAll(".star-rating a");
var star_wrapper = document.querySelector(".star-rating");
stars.forEach((star,starIndex) =>{
    
    star.addEventListener('click', ()=>{
        star_wrapper.classList.add("disabled");
        stars.forEach((otherStar, otherIndex) => {
            if(otherIndex <= starIndex){
                otherStar.classList.add("active");
            }
            
        });
        $data = `${starIndex+1}`;
        
    });
});

const form = document.querySelector(".feedback_form"),
submitBtn = document.querySelector(".srcButton");


form.onsubmit = (e)=>{
    e.preventDefault();
}

submitBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest(); //XML object
    xhr.open("POST", "php/Feedbackend.php", true);
    
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "Success"){
                    // form.reset();
                    location.replace("Feedback.php");
                    
                }else{
                    
                    
                }
            }
        }
    }
    //sending form data to php 
    let formData = new FormData(form);
    formData.append('rate', $data);
    xhr.send(formData);

}
