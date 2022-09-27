//Preview Avatar
$('.SelectImage').on('click', function (e) {
    console.log('clicked')
    $('#MainBg').click();
});
window.addEventListener("dragover", function (e) {
    e = e || event;
    e.preventDefault();
}, false);
window.addEventListener("drop", function (e) {
    e = e || event;
    e.preventDefault();
}, false);
$('#MainBg').change(function (e) {
    var input = e.target;
    if (input.files && input.files[0]) {
        var file = input.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (e) {
            console.log(reader.result);
            $('.MainBg').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
        }
    }
});
//
// function startTime() {
//     var today = new Date();
//     var hr = today.getHours();
//     var min = today.getMinutes();
//     var sec = today.getSeconds();
//     ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
//     hr = (hr == 0) ? 12 : hr;
//     hr = (hr > 12) ? hr - 12 : hr;
//     //Add a zero in front of numbers<10
//     // hr = checkTime(hr);
//     min = checkTime(min);
//     sec = checkTime(sec);
//     document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
//     var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
//     var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
//     var curWeekDay = days[today.getDay()];
//     var curDay = today.getDate();
//     var curMonth = months[today.getMonth()];
//     var curYear = today.getFullYear();
//     var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
//     document.getElementById("date").innerHTML = date;
//
//     var time = setTimeout(function(){ startTime() }, 500);
// }
// function checkTime(i) {
//     if (i < 10) {
//         i = "0" + i;
//     }
//     return i;
// }
// startTime();

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))


const dropArea = document.querySelector(".drag-image"),
    dragText = dropArea.querySelector("h6"),
    button = dropArea.querySelector("button"),
    input = dropArea.querySelector("input");
let file;

button.onclick = ()=>{
    input.click();
};

input.addEventListener("change", function(){
    file = this.files[0];
    dropArea.classList.add("active");
    viewfile();
});

dropArea.addEventListener("dragover", (event)=>{
    event.preventDefault();
    dropArea.classList.add("active");
    dragText.textContent = "Release to Upload File";
});


dropArea.addEventListener("dragleave", ()=>{
    dropArea.classList.remove("active");
    dragText.textContent = "Drag & Drop to Upload File";
});

dropArea.addEventListener("drop", (event)=>{
    event.preventDefault();
    file = event.dataTransfer.files[0];
    viewfile();
});

function viewfile(){
    let fileType = file.type;
    let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
    if(validExtensions.includes(fileType)){
        let fileReader = new FileReader();
        fileReader.onload = ()=>{
            let fileURL = fileReader.result;
            let imgTag = `<img src="${fileURL}" alt="image">`;
            dropArea.innerHTML = imgTag;
        };
        fileReader.readAsDataURL(file);
    }else{
        alert("This is not an Image File!");
        dropArea.classList.remove("active");
        dragText.textContent = "Drag & Drop to Upload File";
    }
}