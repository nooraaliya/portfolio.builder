var ajax = new XMLHttpRequest();
var method = "GET";
var url = "php/update.php";
var asynchronous = true;

ajax.open(method, url, asynchronous);
ajax.send();

ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(this.responseText);
        updateProfile(data);
    }
};

function updateProfile(data) {
    document.getElementById('greet').textContent = 'Hello, ' + data.username;
    document.getElementById('name').value = data.name;
    document.getElementById('age').value = data.age;
    document.getElementById('contact').value = data.contactnumber;
    document.getElementById('dob').value = data.dob;
}

var editBtn = document.getElementById("editBtn");
var updateBtn = document.getElementById("updateBtn");

function enableEdit() {
    document.getElementById('name').removeAttribute("readonly");
    document.getElementById('age').removeAttribute("readonly");
    document.getElementById('contact').removeAttribute("readonly");
    document.getElementById('dob').removeAttribute("readonly");
    editBtn.style.display = "none";
    updateBtn.style.display = "block";
}

editBtn.addEventListener("click", enableEdit);
