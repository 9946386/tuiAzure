const d = new Date();
document.getElementById("todaysDate").innerHTML = d.toDateString();

// document.addEventListener("DOMContentLoaded", function(){
//     window.addEventListener('scroll', function() {
//         if (window.scrollY > 370) {
//           document.getElementById('navbar_top').classList.add('fixed-top');
//           // add padding top to show content behind navbar
//           navbar_height = document.querySelector('.navbar').offsetHeight;
//           document.body.style.paddingTop = navbar_height + 'px';
//         } else {
//           document.getElementById('navbar_top').classList.remove('fixed-top');
//            // remove padding top from body
//           document.body.style.paddingTop = '0';
//         } 
//     });
//   });

var height = $('header').height();

$(window).scroll(function (){
    if($(this).scrollTop() > 370){
        $('.navbar').addClass('fixed');
    }else{
        $('.navbar').removeClass('fixed');
    }
});


