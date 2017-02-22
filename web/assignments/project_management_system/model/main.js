function checklist(){
  var input = document.createElement("input");
  var att_type = document.createAttribute("type");
  att_type.value = "text";
  input.setAttributeNode(att_type);
  var att_name = document.createAttribute("name");
  att_name.value = "checklist_item[]";
  input.setAttributeNode(att_name);
  var att_class = document.createAttribute("class");
  att_class.value = "form-control";
  input.setAttributeNode(att_class);
  var att_onchange = document.createAttribute("onchange");
  att_onchange.value = "checklist();";
  input.setAttributeNode(att_onchange);

  var li = document.createElement("li");
  li.appendChild(input);
  var checklist = document.getElementById("checklist");
  checklist.appendChild(li);

}
