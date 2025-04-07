document.addEventListener("DOMContentLoaded", () => {

    setTimeout(() => {
        const loaderWrapper = document.getElementById("loader-wrapper");
        const mainContent = document.getElementById("main-content");
        loaderWrapper.style.display = "none";
        mainContent.style.display = "block"; 
    }, 2800); 

    const elementsToAnimate = document.querySelectorAll("header, section, footer");

    elementsToAnimate.forEach((element, index) => {
        setTimeout(() => {
            element.style.opacity = 1;
            element.style.transform = "translateY(0)";
        }, index * 300);
    });

    const menuLinks = document.querySelectorAll(".menu a");

    menuLinks.forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const target = document.querySelector(link.getAttribute("href"));
            target.scrollIntoView({ behavior: "smooth" });
        });
    });

const video = document.getElementById('videoBlock');

video.addEventListener('mouseover', function() {
    video.play();
});

video.addEventListener('mouseout', function() {
    video.pause();
});

});
