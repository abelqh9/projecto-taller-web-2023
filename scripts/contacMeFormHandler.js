import { sendAnEmail } from "./sendAnEmail.js";

export function contacMeFormHandler(e){
    e.preventDefault();

    if (e.target.querySelector('p')) {
        e.target.querySelector('p').remove();
    }

    const $contacMeForm__loaderDiv = document.createElement('div');
    $contacMeForm__loaderDiv.classList.add('contact-me-form__loader-div');
    $contacMeForm__loaderDiv.innerHTML = `
        <img src='./assets/three-dots.svg' alt='loading'/>
    `;

    e.target.prepend($contacMeForm__loaderDiv);

    sendAnEmail('abelqh9@gmail.com', {
        name: e.target.name.value,
        email: e.target.email.value,
        message:  e.target.message.value,
    }).then(data => {
        const $messageP = document.createElement('p');
        $messageP.classList.add('contact-me-form__message-p_success');
        $messageP.innerText = 'Email sent, I will reply as soon as possible :)';
        e.target.prepend($messageP);
    }).catch(err => {
        console.error('error', err);
        const $messageP = document.createElement('p');
        $messageP.classList.add('contact-me-form__message-p_error');
        $messageP.innerText = 'Sorry, something went wrong :(';
        e.target.prepend($messageP);
    }).finally(() => {
        $contacMeForm__loaderDiv.remove();
        e.target.reset();
    })
}