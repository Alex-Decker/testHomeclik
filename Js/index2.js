var modalBtn= document.querySelector('.modal-btn');
var modalBg = document.querySelector('.modal-bg');
var modalclose = document.querySelector('.annuler-modal');

modalBtn.addEventListener('click',function () {
    modalBg.classList.add('bg-active');
})
modalclose.addEventListener('click',function () {
    modalBg.classList.remove('bg-active');
})
