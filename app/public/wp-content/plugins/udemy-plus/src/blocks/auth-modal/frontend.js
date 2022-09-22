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

    const tabs = document.querySelectorAll('.tabs a')
    const signinForm = document.querySelector('#signin-tab')
    const signupForm = document.querySelector('#signup-tab')

    tabs.forEach((tab) => {
        tab.addEventListener('click', e => {
            e.preventDefault()
            tabs.forEach(currentTab => {
                currentTab.classList.remove('active-tab')
            })
            e.currentTarget.classList.add('active-tab')

            const activeTab = e.currentTarget.getAttribute('href')

            if (activeTab === '#signin-tab') {
                signinForm.style.display = 'block'
                signupForm.style.display = 'none'
            } else {
                signinForm.style.display = 'none'
                signupForm.style.display = 'block'
            }
        })
    })

    signupForm.addEventListener('submit', event => {
        event.preventDefault()

        const signupFieldset = signupForm.querySelector('fieldset')

        //Grabbing onto the HTML attribute tag...
        signupFieldset.setAttribute('disabled', true)

        const signupStatus = signupForm.querySelector('#signup-status')

        signupStatus.innerHTML = `
         <div class="modal-status modal-status-info"> Please wait! We are creating your account. </div>
        `


    })

})