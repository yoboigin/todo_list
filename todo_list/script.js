document.querySelectorAll('.navbar a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const targetId = this.getAttribute('href');

        if (!targetId.startsWith("#")) {
            return;
        }
        e.preventDefault();
        const targetSection = document.querySelector(targetId);
        if (targetSection) {
            window.scrollTo({
                top: targetSection.offsetTop - 50,
                behavior: "smooth"
            });
        } else {
            console.warn("Section not found: " + targetId);
        }
    });
});
