const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

const toggleNavMobile = () => {
    $('.soft-menu').classList.toggle('open')
    $('.soft-menu__list').classList.toggle('open')
}

$('.soft-menu__list').onclick = (e) => {
    e.stopPropagation()
}

$('.scroll-to-top').onclick = () => {
    window.scrollTo({
        top: 100,
        left: 100,
        behavior: 'smooth'
    });
}

// loading animation
window.addEventListener('load', (event) => {
  $('.loading').style.display = "none"
});

// SLIDER

var swiper = new Swiper(".swiper-partner", {
    slidesPerView: 4,
    spaceBetween: 10,
    // auto
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        // when window width is >= 480px
        120: {
        slidesPerView: 1,
        spaceBetween: 2
        },
        // when window width is >= 640px
        740: {
        slidesPerView: 3,
        spaceBetween: 15
        },
        1023: {
        slidesPerView: 4,
        spaceBetween: 4
        }
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});


var swiper = new Swiper(".swiper-feedback", {
    slidesPerView: 3,
    spaceBetween: 10,
    // auto
    autoplay: {
        delay: 1500,
        disableOnInteraction: false,
    },
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        // when window width is >= 480px
        120: {
        slidesPerView: 1,
        spaceBetween: 2
        },
        // when window width is >= 640px
       // when window width is >= 640px
        740: {
        slidesPerView: 2,
        spaceBetween: 6
        },
        1023: {
        slidesPerView: 4,
        spaceBetween: 6
        }
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var swiper = new Swiper(".swiper-event", {
    slidesPerView: 3,
    spaceBetween: 10,
    // auto
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        // when window width is >= 480px
        120: {
            slidesPerView: 1,
            spaceBetween: 6
        },
        // when window width is >= 640px
        // when window width is >= 640px
        740: {
            slidesPerView: 2,
            spaceBetween: 6
        },
        1023: {
            slidesPerView: 2,
            spaceBetween: 6
        }
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

function animateNumber(finalNumber, duration = 5000, startNumber = 0, callback) {
    let currentNumber = startNumber
    const interval = window.setInterval(updateNumber, 17)

    function updateNumber() {
        if (currentNumber >= finalNumber) {
            clearInterval(interval)
        } else {
            let inc = Math.ceil(finalNumber / (duration / 17))
            if (currentNumber + inc > finalNumber) {
                currentNumber = finalNumber
                clearInterval(interval)
            } else {
                currentNumber += inc
            }
            callback(currentNumber)
        }
    }
}

let animationStatus = false;

document.addEventListener('scroll', function() {
    if (document.getElementById("number")) {
        if (document.getElementById("number").getBoundingClientRect().top < screen.height / 2 && !animationStatus) {
            animationStatus = true

            animateNumber(1500000, 2000, 0, function (number) {
                const formattedNumber = number.toLocaleString()
                document.getElementById('users-count').innerText = formattedNumber + '+';
            })

            animateNumber(5000, 2000, 0, function (number) {
                const formattedNumber = number.toLocaleString()
                document.getElementById('ctv-count').innerText = formattedNumber + '+';
            })

            animateNumber(270, 2000, 0, function (number) {
                const formattedNumber = number.toLocaleString()
                document.getElementById('partner-count').innerText = formattedNumber + '+';
            })

            animateNumber(9, 7000, 0, function (number) {
                const formattedNumber = number.toLocaleString()
                document.getElementById('office-count').innerText = formattedNumber + '+';
            })
        }
    }
})

const handleRegisterOnMobile = () => {
    toggleNavMobile()
}

window.addEventListener("load", function(){
    // loading animation
    document.querySelector('#loading').style.display = "none"
    
    // handle show modal
    var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
        keyboard: false
    })

    document.querySelector(".modal-close-button").onclick = () => {
        myModal.hide();
    }

    document.querySelector("#registerMobile").onclick = () => {
        toggleNavMobile()
        myModal.show();
    }

    //setTimeout(function() {
    //    myModal.show();
    //},5000)
})