function initDateAndTime() {
    setDate();
    setTime();
}

function setDate() {
    var userDate = new Date();
    var formattedDate = new String();
    var year = userDate.getFullYear().toString();
    var month = placeZeroInBeginning((userDate.getMonth() + 1).toString());
    var day = placeZeroInBeginning(userDate.getDate().toString());
    document.getElementsByName("date")[0].value = year + "-" + month + "-" + day;
}

function setTime() {
    var userDate = new Date();
    var formattedTime = new String();
    var hours = placeZeroInBeginning((userDate.getHours()).toString());
    var minutes = placeZeroInBeginning((userDate.getMinutes()).toString());
    document.getElementsByName("time")[0].value = hours + ":" + minutes;
}

function checkDate() {
    pattern = /^(\d{4})-(\d{2})-(\d{2})$/;
    dateEntered = document.getElementsByName("date")[0].value;
    if (pattern.test(dateEntered)) {
        splitDate = dateEntered.split("-");
        year = parseInt(removeZeroFromBeginning(splitDate[0]));
        month = parseInt(removeZeroFromBeginning(splitDate[1]));
        day = parseInt(removeZeroFromBeginning(splitDate[2]));
        if (year < 1 || month < 1 || month > 12 || day < 1 || day > 31) {
            alert("Została wprowadzona nieprawidłowa data. Zostanie wpisana aktualna data.");
            setDate();
        }
    }
    else {
        alert("Data została wpisana w nieprawidłowym formacie! Zostanie wpisana aktualna data.");
        setDate();
    }
}

function checkTime() {
    pattern = /^(\d{2}):(\d{2})$/;
    timeEntered = document.getElementsByName("time")[0].value;
    if (pattern.test(timeEntered)) {
        splitTime = timeEntered.split(":");
        hours = parseInt(removeZeroFromBeginning(splitTime[0]));
        minutes = parseInt(removeZeroFromBeginning(splitTime[1]));
        if (hours < 0 || hours > 23 || minutes < 0 || minutes > 59) {
            alert("Została wprowadzona nieprawidłowa godzina. Zostanie wpisana aktualna godzina.");
            setTime();
        }
    }
    else {
        alert("Godzina została wpisana w nieprawidłowym formacie! Zostanie wpisana aktualna godzina.");
        setTime();
    }
}

//hour or minute 6:3 becomes 06:03, or date 2014-7-13 becomes 2014-07-13
function placeZeroInBeginning(stringToBeChecked) {
    if (stringToBeChecked.length == 1)
        return "0" + stringToBeChecked;
    else
        return stringToBeChecked;
}

//Revers placeZeroInBeginning(stringToBeChecked)
function removeZeroFromBeginning(stringToBeChecked) {
    if (stringToBeChecked.length > 1 && stringToBeChecked.charAt(0) == 0) {
        return stringToBeChecked.slice(1);
    }
    else
        return stringToBeChecked;
}
var counter = 1;

function addNewFileInputElement() {
    var newElement = document.createElement("input");
    newElement.setAttribute("type", "file");
    newElement.setAttribute("name", "plik"+counter);
	counter++;
    var divAttachments = document.getElementById("addAttachmentButtons");
    divAttachments.appendChild(newElement);
    divAttachments.appendChild(document.createElement("br"));
}
