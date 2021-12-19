/*==================== AJAX ====================*/

function loadDoc() {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function(){
        let data = JSON.parse(this.responseText);
        document.getElementById("aboutInfo").innerHTML = data.about;
        document.getElementById("yrExpreience").innerHTML = data.yearExperience;
        document.getElementById("jobDone").innerHTML = data.jobDone;
        document.getElementById("completed_Event").innerHTML = data.completedEvent;
    }
    xmlhttp.open("GET", "data.json", true);
    xmlhttp.send();
  }

  loadDoc();

/*==================== CHANGE BACKGROUND HEADER ====================*/
function scrollHeader(){
    const header = document.getElementById('header')
    if(this.scrollY >= 100) header.classList.add('scroll-header'); else header.classList.remove('scroll-header')
    if(this.scrollY >= 100){
        function loadDoc() {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function(){
                let data = JSON.parse(this.responseText);
                document.getElementById("rosLogo").innerHTML = data.logo;
            }
            xmlhttp.open("GET", "data.json", true);
            xmlhttp.send();
          }
        
          loadDoc();
    } else document.getElementById("rosLogo").innerHTML = "Reliable Online Studio";
}
window.addEventListener('scroll', scrollHeader)

/*==================== SWIPER DISCOVER ====================*/
let swiper = new Swiper(".discover__container", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    loop: true,
    spaceBetween: 32,
    coverflowEffect: {
        rotate: 0,
    },
})

/*==================== SCROLL REVEAL ANIMATION ====================*/
const sr = ScrollReveal({
    distance: '60px',
    duration: 2800,
    // reset: true,
})


sr.reveal(`.home__data, .home__social-link, .home__info,
           .discover__container,
           .experience__data, .experience__overlay,
           .place__card,
           .sponsor__content,
           .footer__data, .footer__rights`,{
    origin: 'top',
    interval: 100,
})

sr.reveal(`.about__data, 
           .video__description,
           .subscribe__description`,{
    origin: 'left',
})

sr.reveal(`.about__img-overlay, 
           .video__content,
           .subscribe__form`,{
    origin: 'right',
    interval: 100,
})

