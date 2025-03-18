document.addEventListener("DOMContentLoaded", function () {
    let selectedSubject = "";
    let selectedTeacher = "";

    function filterVideos() {
        const videos = document.querySelectorAll(".cards");

        videos.forEach(video => {
            let videoSubject = video.getAttribute("data-subject");
            let videoTeacher = video.getAttribute("data-teacher");

            let subjectMatch = selectedSubject === "" || videoSubject === selectedSubject;
            let teacherMatch = selectedTeacher === "" || videoTeacher === selectedTeacher;

            if (subjectMatch && teacherMatch) {
                video.style.display = "flex";
            } else {
                video.style.display = "none";
            }
        });
    }

    function handleFilterClick(event, filterType) {
        let buttons = document.querySelectorAll(`.filt[data-${filterType}]`);
        buttons.forEach(btn => btn.classList.remove("selected"));

        if (event.target.getAttribute(`data-${filterType}`)) {
            event.target.classList.add("selected");
        }

        if (filterType === "subject") {
            selectedSubject = event.target.getAttribute("data-subject") || "";
        } else if (filterType === "teacher") {
            selectedTeacher = event.target.getAttribute("data-teacher") || "";
        }

        filterVideos();
    }

    document.querySelectorAll(".filt[data-subject]").forEach(button => {
        button.addEventListener("click", function (event) {
            handleFilterClick(event, "subject");
        });
    });

    document.querySelectorAll(".filt[data-teacher]").forEach(button => {
        button.addEventListener("click", function (event) {
            handleFilterClick(event, "teacher");
        });
    });

    document.getElementById("resetFilter").addEventListener("click", function () {
        selectedSubject = "";
        selectedTeacher = "";

        document.querySelectorAll(".filt").forEach(btn => btn.classList.remove("selected"));
        filterVideos();
    });
    document.getElementById("resetFilterr").addEventListener("click", function () {
        selectedSubject = "";
        selectedTeacher = "";

        document.querySelectorAll(".filt").forEach(btn => btn.classList.remove("selected"));
        filterVideos();
    });
});
