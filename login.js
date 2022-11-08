$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
 });


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


function setButtonCondition(){
    if(emailValidity && nameValidity){
        document.getElementById("submitButton").disabled=false;
        document.getElementById("submitButton").style.background = '#ff0157';

    } else{
        document.getElementById("submitButton").disabled=true;
        document.getElementById("submitButton").style.background = 'silver';
    }
}


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