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

// // Fake get technologies --------------------

// setTimeout(() => {
    
//     let moreTechnologies = [
//         {
//             url: 'https://developer.mozilla.org/es/docs/Learn/JavaScript/First_steps/What_is_JavaScript',
//             img: 'https://seeklogo.net/wp-content/uploads/2015/07/javascript-logo-vector-download.jpg',
//             name: 'JavaScript',
//             description: 'JavaScript es un lenguaje de programación o de secuencias de comandos que te permite implementar funciones complejas en páginas web.',
//         },
//         {
//             url: 'https://developer.mozilla.org/es/docs/Learn/JavaScript/First_steps/What_is_JavaScript',
//             img: 'https://seeklogo.net/wp-content/uploads/2015/07/javascript-logo-vector-download.jpg',
//             name: 'JavaScript',
//             description: 'JavaScript es un lenguaje de programación o de secuencias de comandos que te permite implementar funciones complejas en páginas web.',
//         },
//     ]

//     let lessTechnologies = [
//         {
//             url: 'https://www.php.net/',
//             img: 'http://pngimg.com/uploads/php/php_PNG21.png',
//             name: 'PHP',
//             description: 'A popular general-purpose scripting language that is especially suited to web development.',
//         },
//         {
//             url: 'https://www.php.net/',
//             img: 'http://pngimg.com/uploads/php/php_PNG21.png',
//             name: 'PHP',
//             description: 'A popular general-purpose scripting language that is especially suited to web development.',
//         },
//     ]
    
//     const $technologiesMoreExperienceLoader = d.querySelector('[data-technologies-more-experience-loader]');
//     const $technologiesLessExperienceLoader = d.querySelector('[data-technologies-less-experience-loader]');
    
//     const $moreTechnologiesList = document.createElement('ul');
//     $moreTechnologiesList.classList.add('secundary-section__ul');
    
//     moreTechnologies.forEach(project => {
    
//         const $liElement = document.createElement('li');
//         $liElement.classList.add('project-card');
        
//         $liElement.innerHTML = `
//             <a href=${project.url} target="_blank">
//                 <img class="project-card__img" src="${project.img}" alt="${project.name}" loading="lazy"/>
//                 <div class="project-card__div">
//                     <h3 class="project-card__h3">${project.name}</h3>
//                     <p class="project-card__p">${project.description}</p>
//                     <ul class="project-card__ul"></ul>
//                 </div>
//             </a>
//         `;
    
//         $moreTechnologiesList.append($liElement);
    
//     })

//     $technologiesMoreExperienceLoader.replaceWith($moreTechnologiesList);

//     const $lessTechnologiesList = document.createElement('ul');
//     $lessTechnologiesList.classList.add('secundary-section__ul');
    
//     lessTechnologies.forEach(project => {
    
//         const $liElement = document.createElement('li');
//         $liElement.classList.add('project-card');
        
//         $liElement.innerHTML = `
//             <a href=${project.url} target="_blank">
//                 <img class="project-card__img" src="${project.img}" alt="${project.name}" loading="lazy"/>
//                 <div class="project-card__div">
//                     <h3 class="project-card__h3">${project.name}</h3>
//                     <p class="project-card__p">${project.description}</p>
//                     <ul class="project-card__ul"></ul>
//                 </div>
//             </a>
//         `;
    
//         $lessTechnologiesList.append($liElement);
    
//     })
    
//     $technologiesLessExperienceLoader.replaceWith($lessTechnologiesList);
    
// }, 2000);


// // --------------------


// // Fake get projects --------------------

// setTimeout(() => {
    
//     let projects = [
//         {
//             url: 'https://www.facebook.com/',
//             img: 'https://1.bp.blogspot.com/-iWskQxFAusI/WDXH11I9mcI/AAAAAAAAAPI/XfW0NPu1vLwng4nLtfwX0A4c7VP3hUqTQCLcB/s1600/facebook-logo.png',
//             name: 'Facebook',
//             description: 'Servicio de redes y medios sociales en línea estadounidense con sede en Menlo Park, California',
//         },
//         {
//             url: 'https://www.facebook.com/',
//             img: 'https://1.bp.blogspot.com/-iWskQxFAusI/WDXH11I9mcI/AAAAAAAAAPI/XfW0NPu1vLwng4nLtfwX0A4c7VP3hUqTQCLcB/s1600/facebook-logo.png',
//             name: 'Facebook',
//             description: 'Servicio de redes y medios sociales en línea estadounidense con sede en Menlo Park, California',
//         },
//     ]
    
//     const $projectsLoader = d.querySelector('[data-projects-loader]');
    
//     const $projectsList = document.createElement('ul');
//     $projectsList.classList.add('secundary-section__ul');
    
//     projects.forEach(project => {
    
//         const $liElement = document.createElement('li');
//         $liElement.classList.add('project-card');
        
//         $liElement.innerHTML = `
//             <a href=${project.url} target="_blank">
//                 <img class="project-card__img" src="${project.img}" alt="${project.name}" loading="lazy"/>
//                 <div class="project-card__div">
//                     <h3 class="project-card__h3">${project.name}</h3>
//                     <p class="project-card__p">${project.description}</p>
//                     <ul class="project-card__ul"></ul>
//                 </div>
//             </a>
//         `;
    
//         $projectsList.append($liElement);
    
//     })
    
//     $projectsLoader.replaceWith($projectsList);

// }, 4000);


// // --------------------

// // Fake get courses --------------------

// setTimeout(() => {
    
//     let courses = [
//         {
//             url: '',
//             img: 'https://seeklogo.net/wp-content/uploads/2015/07/javascript-logo-vector-download.jpg',
//             name: 'Curso de JavaScript',
//             description: 'Curso desde cero a experto de JavaScript',
//         },
//         {
//             url: '',
//             img: 'https://1.bp.blogspot.com/-m4TTXg7Oof4/XlJFOC9iQmI/AAAAAAAAACc/gjl4x37MVFIH7th8Y1xmelomiX4rYRwewCLcBGAsYHQ/s1600/css3.png',
//             name: 'Curso de CSS',
//             description: 'Curso desde cero a experto de CSS',
//         },
//     ]
    
//     const $coursesLoader = d.querySelector('[data-courses-loader]');
    
//     const $coursesList = document.createElement('ul');
//     $coursesList.classList.add('secundary-section__ul');
    
//     courses.forEach(project => {
    
//         const $liElement = document.createElement('li');
//         $liElement.classList.add('project-card');
        
//         $liElement.innerHTML = `
//             <a href=${project.url} target="_blank">
//                 <img class="project-card__img" src="${project.img}" alt="${project.name}" loading="lazy"/>
//                 <div class="project-card__div">
//                     <h3 class="project-card__h3">${project.name}</h3>
//                     <p class="project-card__p">${project.description}</p>
//                     <button> Agregar al carrito </button>
//                 </div>
//             </a>
//         `;
    
//         $coursesList.append($liElement);
    
//     })
    
//     $coursesLoader.replaceWith($coursesList);

// }, 6000);


// ShoppingCart // --------------------

// const $shoppingCartOpenButton = d.querySelector('#shoppingCartOpenButton');

// $shoppingCartOpenButton.addEventListener('click', e => {

//     const $shoppingCartModal = d.querySelector('#shoppingCartModal');

//     $shoppingCartModal.classList.toggle('hide');

// })

// const $shoppingCartCloseButton = d.querySelector('#shoppingCartCloseButton');

// $shoppingCartCloseButton.addEventListener('click', e => {

//     const $shoppingCartModal = d.querySelector('#shoppingCartModal');

//     $shoppingCartModal.classList.toggle('hide');

// })

// loginCart // --------------------

const $loginOpenButton = d.querySelector('#loginOpenButton');

$loginOpenButton.addEventListener('click', e => {

    const $loginM = d.querySelector('#loginM');

    $loginM.classList.toggle('hide');

})

const $loginCloseButton = d.querySelector('#loginCloseButton');

$loginCloseButton.addEventListener('click', e => {

    const $loginM = d.querySelector('#loginM');

    $loginM.classList.toggle('hide');

})

// Create user
const $creatUserOpenButton = d.querySelector('#creatUserOpenButton');

$creatUserOpenButton.addEventListener('click', e => {

    const $creatUserM = d.querySelector('#creatUserM');

    $creatUserM.classList.toggle('hide');

    const $loginM = d.querySelector('#loginM');

    $loginM.classList.toggle('hide');

})

const $creatUserCloseButton = d.querySelector('#creatUserCloseButton');

$creatUserCloseButton.addEventListener('click', e => {

    const $creatUserM = d.querySelector('#creatUserM');

    $creatUserM.classList.toggle('hide');

})

// 
const $loginOpenButtonAndCreatUserCloseButton = d.querySelector('#loginOpenButtonAndCreatUserCloseButton');

$loginOpenButtonAndCreatUserCloseButton.addEventListener('click', e => {

    const $creatUserM = d.querySelector('#creatUserM');

    $creatUserM.classList.add('hide');

    const $loginM = d.querySelector('#loginM');

    $loginM.classList.remove('hide');

})
