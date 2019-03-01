function setupTimer(timeID,dateID) {
    let today = new Date();
    setClock(today,timeID);
    setDate(today,dateID);
    setTimeout('setupTimer("'+timeID+'","'+dateID+'");','500');
}

function setClock(date,time_id) {
    let h = date.getHours();
    let m = date.getMinutes();
    let s = date.getSeconds();
    h = checkTime(h);
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById(time_id).innerHTML =
        h + ":" + m + ":" + s;
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
function setDate(date,date_id) {
    let year = date.getFullYear();
    let d = date.getDate();
    let result = '' + getDay(date) + ', ' + formatNumericalDay(d) + '-' + getMonth(date) + '-' + year;
    document.getElementById(date_id).innerHTML = result;
}
function getMonth(date) {
    const MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August",
        "September", "October", "November", "December"];
    return MONTHS[date.getMonth()];
}
function getDay(date) {
    const DAYS = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    return DAYS[date.getDay()];
}
function formatNumericalDay(day) {
    if(day === 1 || day === 21 || day === 31) return day+'th';
    else if(day === 2 || day === 22 ) return day+'nd';
    else if(day === 3 || day === 23 ) return day+'rd';
    else return day+'th';
}
