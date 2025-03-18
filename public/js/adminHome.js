document.addEventListener("DOMContentLoaded", function() {
    const teacherRadio = document.getElementById("teacher");
    const studentRadio = document.getElementById("student");
    const queryRadio = document.getElementById("query");

    const teacherSection = document.querySelector(".teacher");
    const studentSection = document.querySelector(".student");
    const querySection = document.querySelector(".query");

    function updateVisibility() {
        teacherSection.classList.add("hidden");
        studentSection.classList.add("hidden");
        querySection.classList.add("hidden");

        if (teacherRadio.checked) {
            teacherSection.classList.remove("hidden");
        } else if (studentRadio.checked) {
            studentSection.classList.remove("hidden");
        } else if (queryRadio.checked) {
            querySection.classList.remove("hidden");
        }
    }

    teacherRadio.addEventListener("change", updateVisibility);
    studentRadio.addEventListener("change", updateVisibility);
    queryRadio.addEventListener("change", updateVisibility);
});
