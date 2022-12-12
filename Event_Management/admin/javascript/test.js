const role = document.querySelector(".role").value;


body.onload = () =>{
    const varr = JSON.stringify(role);
    const xhttp1 = new XMLHttpRequest();
    
    var vars = "role="+varr;
    xhttp1.open("POST", "php/test.php",true);
    xhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp1.onreadystatechange = function() {
        if(xhttp1.readyState == 4 && xhttp1.status == 200){
            myOnj
            var return_data = xhttp1.response;
            console.log(return_data);

        }
    }

    
    xhttp1.send(vars);
}
const dbParam = JSON.stringify({"limit":5});
const xmlhttp = new XMLHttpRequest();
xmlhttp.onload = function() {
  myObj = JSON.parse(this.responseText);
  let text = "";
  for (let x in myObj) {
    text += myObj[x].name + "<br>";
  }
  document.getElementById("demo").innerHTML = text;
}
xmlhttp.open("POST", "json_demo_db_post.php");
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + dbParam);