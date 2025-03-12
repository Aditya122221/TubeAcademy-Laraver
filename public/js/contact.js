var contacting = document.querySelector(".contacting")
var reachUs = document.querySelector(".reachUs")
var formBox = document.querySelector(".formBox")
var reachBox = document.querySelector(".reachBox")

function showContacting() {
    contacting.style.background = "#edecec"
    reachUs.style.background = "white"
    formBox.style.display = "flex"
    reachBox.style.display = "none"
}

function showReachBox() {
    reachUs.style.background = "#edecec"
    contacting.style.background = "white"
    formBox.style.display = "none"
    reachBox.style.display = "flex"
}
//Code Up
