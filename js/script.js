let searchBtn = document.querySelector('#search-btn');
let searchBar = document.querySelector('.search-bar-container');
let formBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form-container');
let formClose = document.querySelector('#form-close');
let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let videoBtn = document.querySelectorAll('.vid-btn');


window.onscroll = () => {
    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
}

menu.addEventListener('click', () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});

searchBtn.addEventListener('click', () => {
    searchBtn.classList.toggle('fa-times');
    searchBar.classList.toggle('active');
});

formBtn.addEventListener('click', () => {
    loginForm.classList.add('active');
});

formClose.addEventListener('click', () => {
    loginForm.classList.remove('active');
});

videoBtn.forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelector('.controls .active').classList.remove('active');
        btn.classList.add('active');
        let src = btn.getAttribute('data-src');
        document.querySelector('#video-slider').src = src;
    });
});

var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    breakpoints: {
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});

function sendEmail() {
    Email.send({
            Host: "smtp.elasticemail.com",
            Username: "udanidias18@gmail.com",
            Password: "0F8393980377CA621D654B54422D9E55A625",
            To: 'udanimd@gmail.com',
            From: document.getElementById("cemail").value,
            Subject: "Contact Form Enquiry",
            Body: "Name: " + document.getElementById("cname").value +
                "<br> Email: " + document.getElementById("cemail").value +
                "<br> Contact Number: " + document.getElementById("cphone").value +
                "<br> Subject: " + document.getElementById("csubject").value +
                "<br> Message: " + document.getElementById("cmessage").value

        })
        .then(
            message => alert("Thank You For Your Message...! We Will Get Back To You.")
        );
}