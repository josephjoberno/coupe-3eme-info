 //----------------------------------------- STICKY ANIMATION SUR LE HEADER ------------------------------------------------------

        window.addEventListener('scroll',function(){
            var header = document.querySelector('header');
            if(!(window.innerWidth==991)){
                header.classList.toggle('sticky',window.scrollY)
            }
            else{
                header.classList.toggle('newSticky',window.scrollY)
            }

            if(window.innerHeight==195){
                header.style.boxShadow="none";
            }
            console.log(window.innerHeight);
        })
        

//-------------------------------------- ANIMATION SUR LE TOGGLE ET LA BARRE DE NAVIGATION ----------------------------------------

        const navigation = document.querySelector('.navigation');
        const menutoggle = document.querySelector('.toggle');
        menutoggle.onclick = function(){
            menutoggle.classList.toggle('active');
            navigation.classList.toggle('active');
        }

//-------------------------------------------- ANIMATION DES SLIDES ---------------------------------------------------------------
        const slides = document.querySelectorAll('.slides');
        const prev = document.querySelector('.prev');
        const next = document.querySelector('.next');

        i = 0;

        function ActiveSlide(n){
            for(slide of slides)
            slide.classList.remove('active');
            slides[n].classList.add('active');
        }

//----------------------------- PREVIOUS BUTTON ---------------------------------------------------------------------------------

        prev.addEventListener('click',function(){
            if(i == slides.length - 1){
                i = 0 ;
                ActiveSlide(i);
            }
            else {
                i++;
                ActiveSlide(i);
            }

        })


//------------------------------------------------------------- NEXT BUTTON -----------------------------------------------------

        next.addEventListener('click',function(){
            if(i == slides.length - 1){
                i = 0 ;
                ActiveSlide(i);
            }
            else {
                i++;
                ActiveSlide(i);
            }

        })



// ------------------------------------------ POPUP ANIMATION ------------------------------------------------------------------

let log = document.querySelector('.log')
let popup = document.querySelector('.popup')
let close = document.querySelector('.close')
log.onclick = function () {
  popup.classList.add('active')
}
close.onclick = function () {
  popup.classList.remove('active')
}


// ------------------------------------------ LOGIN ANG REGISTER ANIMATION --------------------------------------------------------

var card = document.getElementById('card')

function openRegister () {
  card.style.transform = 'rotateY(-180deg)'
}

function openLogin () {
  card.style.transform = 'rotateY(0deg)'
}