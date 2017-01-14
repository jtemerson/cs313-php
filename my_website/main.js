function babyFace(){
  var response = "Now that\'s just mean! Try again.";
  var faceResponse = document.getElementById("faceResponse");
  faceResponse.setAttribute("class", "alert alert-warning");
  faceResponse.innerHTML = response;
}

function beardedFace(){
  var response = "You know beauty when you see it!";
  var faceResponse = document.getElementById("faceResponse");
  faceResponse.setAttribute("class", "alert alert-success");
  faceResponse.innerHTML = response;
}

function terroristFace(){
  var response = "You\'re creepy. I\'m gonna call the cops now.";
  var faceResponse = document.getElementById("faceResponse");
  faceResponse.setAttribute("class", "alert alert-danger");
  faceResponse.innerHTML = response;
}
