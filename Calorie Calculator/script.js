function calc(){
var age = parseInt(document.getElementById("age").value);
var height = parseInt(document.getElementById("height").value);
var weight=parseInt(document.getElementById("weight").value);
var male = document.getElementById("dot-1").checked;
var female = document.getElementById("dot-2").checked;
var result = 0;
var act = document.getElementById("SelectActive").value;

if(male){
result = 5 + (10 * weight)+(6.25 * height) - (5 * age);
}else if(female){
result= 161 + (10 * weight) + (6.25 * height) - (5 * age);
}
if(act === "Sedentary"){
result = result * 1.2;
}else if(act === "Lightly"){
    result = result * 1.375;
}else if(act === "Moderately"){
    result = result * 1.55;
}else if(act === "Active"){
    result = result * 1.725;
}else if(act === "Very"){
    result = result * 1.9;
}
alert(document.getElementById("totlCals").innerHTML=Math.round(result));
}
