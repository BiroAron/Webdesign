let nameValidity = true;
let emailValidity = true;
let messageValidity = true;

(function () {
  const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

  let event = "Sep 30, 2021 00:00:00",
      countDown = new Date(event).getTime(),
      x = setInterval(function() {    

        let now = new Date().getTime(),
            distance = countDown - now;

        document.getElementById("days").innerText = Math.floor(distance / (day)),
          document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
          document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
          document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

        //do something later when date is reached
        if (distance < 0) {
          let headline = document.getElementById("headline"),
              countdown = document.getElementById("countdown"),
              content = document.getElementById("content");

          headline.innerText = "The time has come!";
          countdown.style.display = "none";
          content.style.display = "block";

          clearInterval(x);
        }
        //seconds
      }, 0)
  }());

window.addEventListener('scroll', function(){
    const header = document.querySelector('header');
    header.classList.toggle("sticky", window.scrollY>0)
});

function toggleMenu(){
    const menuToggle = document.querySelector('.menuToggle');
    const navigation = document.querySelector('.navigation');
    menuToggle.classList.toggle('active');
    navigation.classList.toggle('active');
}


function checkNameValidity(){
    const name = document.getElementById("name").value;
    nameValidity = /^([A-Z][a-z-]+)+\s([A-Z][a-z-]+)$/.test(name);
    setButtonCondition();
}

function checkEmailValidity(){
    const email = document.getElementById("email").value;
    emailValidity = /^[a-zA-Z0-9.!#$%&’+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)$/.test(email);
    setButtonCondition();
}

function checkMessageValidity(){
    const message = document.getElementById("message").value;
    messageValidity = !(/^$|\s+/.test(message));
    setButtonCondition();
}

function setButtonCondition(){
    if(messageValidity && emailValidity && nameValidity){
        document.getElementById("submitButton").disabled=false;
        document.getElementById("submitButton").style.backgroundColor = '#ff0157';

    } else{
        document.getElementById("submitButton").disabled=true;
        document.getElementById("submitButton").style.backgroundColor = 'silver';
    }
}