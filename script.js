const createFormBtn = selector("#createForm");
const newFieldForm = selector('form[name="addField"]');
const demoForm = selector('form[name="demoForm"]');
const connectToPhp = selector("#sendToPhp");
let currentQueryString = "";
connectToPhp.onclick = function(){
    const formName = selector("#formName").value;
    location.href = `http://localhost/SurveyMaker/newForm.php?${currentQueryString}&formName=${formName}`;
}
createFormBtn.onclick = function(){
    const formDeclare = selector("#formDeclare");
    createFormBtn.classList.toggle("hidden")
    formDeclare.classList.toggle("hidden")
}
newFieldForm.onsubmit = function(e){
    e.preventDefault();
    const newFieldName = newFieldForm.newFieldName.value;
    const newFieldLabel = newFieldForm.newFieldLabel.value;
    addToDemoForm(newFieldName,newFieldLabel);
    newFieldForm.reset();
    if(currentQueryString==""){
        currentQueryString = `fields[]=${newFieldName}&labels[]=${newFieldLabel}`
    }else{
    currentQueryString += `&fields[]=${newFieldName}&labels[]=${newFieldLabel}`
}
}
function addToDemoForm(newFieldName,newFieldLabel){
    const label = document.createElement("label");
    label.for = newFieldName;
    label.innerText = newFieldLabel;
    const input = document.createElement("input");
    input.name = newFieldName;
    const br = document.createElement("br");
    demoForm.appendChild(label)
    demoForm.innerHTML += "<br>"
    demoForm.appendChild(input)
    demoForm.innerHTML += "<br>"
}
function selectorAll(selectString){
    return document.querySelectorAll(selectString);
}
function selector(selectString){
    return selectorAll(selectString)[0];
}