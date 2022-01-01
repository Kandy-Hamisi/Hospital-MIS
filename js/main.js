const adminBtn = document.getElementById("adminbtn");
const doctorBtn = document.getElementById("docbtn");
const nurseBtn = document.getElementById("nursebtn");
const patientBtn = document.getElementById("patientbtn");
const card = document.querySelectorAll(".mycard");

adminBtn.onclick = () => {
    location.href = "admin/login.php";
}

doctorBtn.onclick = () => {
    location.href = "doctor/login.php";
}

nurseBtn.onclick = () => {
    location.href = "nurse/login.php";
}

patientBtn.onclick = () => {
    location.href = "patient/login.php";
}

let adjustCard = false;

card.forEach((el) =>{
    el.onmouseover = () => {
        el.classList.add("scaler");
    }
    el.onmouseout = () => {
        el.classList.remove("scaler");
    }
})