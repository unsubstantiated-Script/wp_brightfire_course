document.addEventListener('DOMContentLoaded', () => {
    //Selecting all the component buttons that are related
    const openModalBtn = document.querySelectorAll('.open-modal')
    //Selecting the modal
    const modalEl = document.querySelector('.wp-block-udemy-plus-auth-modal')

    const modalCloseEl = document.querySelectorAll('.modal-overlay, .modal-btn-close')

    openModalBtn.forEach((event) => {
        event.addEventListener('click', e => {
            e.preventDefault()
            //Adding a CSS class to show modal
            modalEl.classList.add('modal-show')
        })
    })


    modalCloseEl.forEach((event) => {
        event.addEventListener('click', e => {
            e.preventDefault()
            //Adding a CSS class to show modal
            modalEl.classList.remove('modal-show')
        })
    })
})