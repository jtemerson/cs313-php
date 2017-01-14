function clickyAlert(){
  window.alert ("You clicked the button!");
}
function changeColor(){
  var color = document.getElementById("colorValue").value;
  var div = document.getElementById("div1");
  console.log(color);

  div.style.backgroundColor = color;
}
