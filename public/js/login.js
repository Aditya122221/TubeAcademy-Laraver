function redirectToRoute() {
    // Get input values
    let regis = document.getElementById("regis").value;
    let pNumber = document.getElementById("pNumber").value;
    let frole = document.querySelector('input[name="frole"]:checked');

    // Check if all fields are filled
    if (!regis || !pNumber || !frole) {
        alert("Please fill all fields.");
        return;
    }

    // Redirect to Laravel route with parameters
    window.location.href = `{{ url('/visiting') }}/${regis}/${pNumber}/${frole.value}`;
}

function mobileViewDesign() {
    let main = document.querySelector(".main")

    if (window.innerWidth < 1000) {
        if (main) main.remove();

        document.body.style.display = "flex"
        document.body.style.minHeight = "100vh"
        document.body.style.justifyContent = "center"
        document.body.style.alignItems = "center"
        document.body.style.backgroundColor = "black"

        let mobileView = document.createElement("div")
        mobileView.className = "mobileView"
        mobileView.textContent = "We are working on different view. Please check this on PC"

        document.body.appendChild(mobileView)
    }
}
window.addEventListener("resize", mobileViewDesign);
mobileViewDesign();
