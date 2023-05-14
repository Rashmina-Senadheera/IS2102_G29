let stars = document.querySelectorAll(".star-rating a");
var star_wrapper = document.querySelector(".star-rating");
var rate = document.querySelector("#rate");
stars.forEach((star,starIndex) =>{
    
    star.addEventListener('click', ()=>{
        star_wrapper.classList.add("disabled");
        stars.forEach((otherStar, otherIndex) => {
            if(otherIndex <= starIndex){
                otherStar.classList.add("active");
            }
            
        });
        $data = `${starIndex+1}`;
        rate.value = $data;
    });
});

