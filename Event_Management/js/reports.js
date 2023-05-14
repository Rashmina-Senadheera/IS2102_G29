var testDiv = document.getElementById("test"),
radioBtns = document.querySelectorAll("input[name='data']"),
// month_year = document.querySelector("input[name='month']"),
// writeData = document.getElementById("writeData"),
form = document.getElementById("dataForm"),
Chart1 = document.getElementById('myChart');

var hello;


let findselected = () => {
    let selected = document.querySelector("input[name='data']:checked").value;
    

}
const months = ['Jan','Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

const data = {
  labels: "",
  datasets: [
    
  ]
};

// config 
const config = {
  type: 'bar',
  data,
  options: {
    maintainAspectRatio: true,
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
};
    // render init block
    let myChart = new Chart(
        Chart1,
        config
    );
    




// checkBox.onclick = ()=>{
//     alert();
// }
form.onsubmit = (e)=>{
    e.preventDefault();
}
// checkBox.onclick = ()=>{
    
    
//     if(radioBtns.checked){
        
        


//     }
//     else{
//         myChart.destroy();
//         document.getElementById('imgData').value = "";
        
//     }
    



    

// }

function get_send_Data() {

    let selected = document.querySelector("input[name='data']:checked").value;
    // let selected1 = document.querySelector("input[name='month']:checked").value;
    let xhr = new XMLHttpRequest(); //XML object
    xhr.open("POST", 'php/reports.php', true);

    xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            responseData = JSON.parse(xhr.response);

            console.log(responseData);
            
            var len = responseData.length - 2;
            
            // var lenArr = myChart.data.datasets.length;
            console.log(responseData);
            myChart.data.labels.splice(0,myChart.data.labels.length);
            myChart.data.datasets.splice(0,myChart.data.datasets.length);
           
           console.log(len);
           if(selected == "month"){
            
            
            const stock2 = [];
           for(let i=0;i<len; i++){
            // console.log(responseData[i]);
            var stock = {} ;
            stock.label = responseData[len][i];
            stock.data = responseData[i];
            
            stock2.push(stock);
            
           }
           console.log(stock2);
            var monthLen = Math.max(...responseData[len+1]);


            if(myChart.data.labels < monthLen){
                for(let j=0; j< stock2.length ; j++){
                    myChart.data.datasets.push(stock2[j]);
                    
                   }
                for(let j=0; j< monthLen ; j++){
                    myChart.data.labels.push(months[j]);
                }
               }
               

               

           }else if(len == 0){
 
            for(let i=0; i<responseData[len+1].length ; i++){
                myChart.data.labels.push(responseData[len+1][i]);
            }
            var stock = {} ;
            stock.label ="" ;
            stock.data = responseData[0];
            myChart.data.datasets.push(stock);
            
            console.log( myChart.data.datasets);
            
           }

           
           myChart.destroy();
           myChart = new Chart(
            Chart1,
            config
        );
        
        // const canvas = document.getElementById('myChart');
        const image = document.getElementById('image');
        const chartImage = Chart1.toDataURL('image/png', 1);

        // console.log(chartImage);
        // image.src = chartImage;
        document.getElementById('imgData').value = chartImage;
            
           



        
        }
    }
}
let formData = new FormData(form);
xhr.send(formData);
    
}

// month_year.forEach(radioBtn =>{
//     radioBtn.addEventListener("click", alert("clicked"));
    
    
// });
// month_year.onclick = () =>{
//     selected1 = document.querySelector("input[name='month']:checked").value;
//     console.log(selected1);

// }
radioBtns.forEach(radioBtn =>{
    radioBtn.addEventListener("change", function(){

        // selected = document.querySelector("input[name='data']:checked");
        // selected1 = document.querySelector("input[name='month']:checked");

        // // console.log(selected);
        // // console.log(selected1);
        // if(selected1 == null || selected1 == ""){
        //     console.log("Please select month or year");
        // }
        // else if(selected == null || selected == ""){
        //     console.log("please select data");
        // }
        // else{
            get_send_Data();
        
        // get_send_Data();
    });
    
    
});







