// import { contacMeFormHandler } from "./contacMeFormHandler.js";
// import { getProjectsUl } from "./getProjectsUl.js";
// import { getTechnologiesUl } from "./getTechnologiesUl.js";
import { setAnOberserver } from "./setAnOberserver.js";

const d = document;
// const API_URL = 'https://abelquezada-website-api.herokuapp.com';

// --------------------

const $allObservableSections = d.querySelectorAll('section[data-scroll-spy]');

setAnOberserver($allObservableSections, section => {
    const $h2InsideSection = section.querySelector('h2');
    $h2InsideSection.classList.add('secundary-section__h2_visible');
})

// --------------------

// const $technologiesMoreExperienceLoader = d.querySelector('[data-technologies-more-experience-loader]');

// getTechnologiesUl(API_URL + '/technologies/mostExperience').then($ul =>{
//     $technologiesMoreExperienceLoader.replaceWith($ul)
// })

// // --------------------

// const $technologiesLessExperienceLoader = d.querySelector('[data-technologies-less-experience-loader]');

// getTechnologiesUl(API_URL + '/technologies/lessExperience').then($ul =>{
//     $technologiesLessExperienceLoader.replaceWith($ul)
// })

// // --------------------

// const $projectsLoader = d.querySelector('[data-projects-loader]');

// getProjectsUl(API_URL + '/projects').then($ul => {
//     $projectsLoader.replaceWith($ul);
// })

// // --------------------

// const $contactMeForm = d.querySelector('form[data-contact-me-form]');

// $contactMeForm.addEventListener('submit', contacMeFormHandler);