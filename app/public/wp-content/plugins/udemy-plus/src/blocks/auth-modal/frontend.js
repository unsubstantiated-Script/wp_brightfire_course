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

    //Giving the form asynchronus functionality

    signupForm.addEventListener('submit', async event => {
        event.preventDefault()

        const signupFieldset = signupForm.querySelector('fieldset')

        //Grabbing onto the HTML attribute tag...
        signupFieldset.setAttribute('disabled', true)

        const signupStatus = signupForm.querySelector('#signup-status')

        signupStatus.innerHTML = `
         <div class="modal-status modal-status-info"> Please wait! We are creating your account. </div>
        `

        const formData = {
            username: signupForm.querySelector('#su-name').value,
            email: signupForm.querySelector('#su-email').value,
            password: signupForm.querySelector('#su-password').value,
        }

        const response = await fetch(up_auth_rest.signup, {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify(formData)
        })

        const responseJSON = await response.json()

        if (responseJSON.status === 2) {
            signupStatus.innerHTML = `
            <div class="modal-status modal-status-success"> Success! Your account has been created. </div>
            `
            location.reload()
        } else {
            signupFieldset.removeAttribute('disabled')
            signupStatus.innerHTML = `
            <div class="modal-status modal-status-danger"> Unable to create account. Please try again later. </div>
            `
        }


    })

    signinForm.addEventListener('submit', async event => {
        event.preventDefault()

        const signinFieldset = signinForm.querySelector('fieldset')
        const signinStatus = signinForm.querySelector('#signin-status')

        //Grabbing onto the HTML attribute tag...
        signinFieldset.setAttribute('disabled', true)


        signinStatus.innerHTML = `
         <div class="modal-status modal-status-info"> Please wait! We are logging you in. </div>
        `

        const formData = {
            user_login: signinForm.querySelector('#si-email').value,
            password: signinForm.querySelector('#si-password').value
        }

        const response = await fetch(up_auth_rest.signin, {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify(formData)
        })

        const responseJSON = await response.json()

        if (responseJSON.status === 2) {
            signinForm.status = `
            <div class="modal-status modal-status-success"> Success! You are now logged in. </div>
            `
            location.reload()
        } else {
            signinFieldset.removeAttribute('disabled')
            signinStatus.innerHTML = `
            <div class="modal-status modal-status-danger"> Invalid credentials. Please try again later. </div>
            `
        }


    })

})