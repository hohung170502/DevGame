var btnOpen = document.querySelector('.login')
var btnOpens = document.querySelector('.register')
var modal = document.querySelector('.modal')
var iconClose = document.querySelector('.close-modal')
var onlyLogin = document.querySelector('.only-login')

function toggleModal(){
    modal.classList.toggle('hide')
}

btnOpen.addEventListener('click', toggleModal)
btnOpens.addEventListener('click', toggleModal)
iconClose.addEventListener('click', toggleModal)
modal.addEventListener('click', function(e) {
    if(e.target == e.currentTarget) {
        toggleModal()
    }
})