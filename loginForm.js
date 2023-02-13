var lgn = document.getElementById('login');
var regtr = document.getElementById('register');
var btn = document.getElementById('btn');

function register(){
    lgn.style.left = '-400px';
    regtr.style.left = '50px';
    btn.style.left = '110px';
}

function login(){
    lgn.style.left = '50px';
    regtr.style.left = '450px';
    btn.style.left = '0px'
}