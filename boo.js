// This is the JavaScript code for the login form
var eyeOpen=document.querySelector('.eye-open')
var eyeClose=document.querySelector('.eye-close')
var input=document.querySelector('#pass')
eyeOpen.addEventListener('click',function(){
    eyeOpen.classList.add('hidden')
    eyeClose.classList.remove('hidden')
    input.setAttribute('type','password')
})
eyeClose.addEventListener('click',function(){
    eyeOpen.classList.remove('hidden')
    eyeClose.classList.add('hidden')
    input.setAttribute('type','text')
})