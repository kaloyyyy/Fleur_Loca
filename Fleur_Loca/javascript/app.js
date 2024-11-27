window.addEventListener('scroll', reveal);

function reveal(){
    var reveals= document.querySelectorAll('.reveal');

    for(var i =0; i< reveals.length; i++){
        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 100;

        if(revealtop < windowheight - revealpoint){
            reveals[i].classList.add('active');
        }
    }
}




const toTop = document.querySelector(".to-top");

window.addEventListener("scroll", () => {
    if (window.pageYOffset > 500) {
        toTop.classList.add("active");
    } else {
        toTop.classList.remove("active");
    }
})


