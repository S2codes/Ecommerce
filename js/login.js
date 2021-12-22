// Toggle eye start

// login system eye 
var pass = document.getElementById('pwd');
var eyebtn = document.getElementById('eyebtn');


eyebtn.addEventListener('click', () => {
    toggleEye(eyebtn, pass);
});

// registration system eye 
var rpass = document.getElementById('rpass');
// var rpass = document.getElementsByClassName('regpass');

var reyebtn = document.getElementById('Reyebtn1');

var rcpass = document.getElementById('rcpass');
var rceyebtn = document.getElementById('RCeyebtn2');

// registration pass 
reyebtn.addEventListener('click', () => {
    toggleEye(reyebtn, rpass);
});
// registration Confirmed pass 
rceyebtn.addEventListener('click', () => {
    toggleEye(rceyebtn, rcpass);
});


// eyebtn.addEventListener('click',toggleEye());

function toggleEye(eye, pass) {
    if (pass.type == 'password') {
        pass.type = 'text';
        eye.classList.add("fa-eye-slash");
        eye.classList.remove("fa-eye");
    } else {
        pass.type = 'password';
        eye.classList.add("fa-eye");
        eye.classList.remove("fa-eye-slash");
    }

}

// Toggle eye start End 
























// function toggleEye () {
//     if (pass.type == 'password') {
//         pass.type = 'text';
//         this.classList.add("fa-eye-slash");
//         this.classList.remove("fa-eye");
//     }else{
//         pass.type = 'password';
//         this.classList.add("fa-eye");
//         this.classList.remove("fa-eye-slash");
//     }