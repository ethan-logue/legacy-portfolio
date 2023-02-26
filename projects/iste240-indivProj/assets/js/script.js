// Professor John-Paul Takats, ISTE-240, 2205 - Ethan Logue
// Project 1, 2/26/2023

function showBox() {
    var otherRadio = document.getElementById("other");
    var otherBox = document.getElementById("otherBox");
    var otherLabel = document.getElementById("otherLabel");

    if (otherRadio.checked) {
        if (otherLabel.innerHTML == 'Other:') {
            // Stops it from adding an additional ':'
        } else {
            otherLabel.innerHTML += ':'
            otherBox.style.display = 'block';
        }
    }
    if (!otherRadio.checked) {
        otherLabel.innerHTML = 'Other'
        otherBox.style.display = 'none';
    }
}