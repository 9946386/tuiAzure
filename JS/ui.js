const d = new Date();
document.getElementById("todaysDate").innerHTML = d.toDateString();

// var canvas = document.getElementById("signature-pad");

// function resizeCanvas() {
// var ratio = Math.max(window.devicePixelRatio || 1, 1);
// canvas.width = canvas.offsetWidth * ratio;
// canvas.height = canvas.offsetHeight * ratio;
// canvas.getContext("2d").scale(ratio, ratio);
// }
// window.onresize = resizeCanvas;
// resizeCanvas();

// var signaturePad = new SignaturePad(canvas, {
// backgroundColor: 'rgb(250,250,250)'
// });

// document.getElementById("clear").addEventListener('click', function(){
// signaturePad.clear();
// })

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

$(document).ready(function() {
  
    $(window).scroll(function () {
        //if you hard code, then use console
        //.log to determine when you want the 
        //nav bar to stick.  
        console.log($(window).scrollTop())
      if ($(window).scrollTop() > 370) {
        $('#navbar_top').addClass('navbar-fixed');
      }
      if ($(window).scrollTop() < 370) {
        $('#navbar_top').removeClass('navbar-fixed');
      }
    });
  });
