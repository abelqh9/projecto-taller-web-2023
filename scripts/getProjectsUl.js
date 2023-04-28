export function getProjectsUl(urlToFetch){
    return fetch(urlToFetch)
    .then(res => res.ok ? res.json() : Promise.reject())
    .then(data => {
        
        const $projectsList = document.createElement('ul');
        $projectsList.classList.add('secundary-section__ul');
        data.forEach(project => {
            const $liElement = document.createElement('li');
            $liElement.classList.add('project-card');
            
            $liElement.innerHTML = `
                <a href=${project.url} target="_blank">
                    <img class="project-card__img" src="${project.img}" alt="${project.name}" loading="lazy"/>
                    <div class="project-card__div">
                        <h3 class="project-card__h3">${project.name}</h3>
                        <p class="project-card__p">${project.description}</p>
                        <ul class="project-card__ul"></ul>
                    </div>
                </a>
            `;
            let projectTechnologies = ``;
            project.technologies.forEach(tech => {
                projectTechnologies += `<li><img src=${tech.img} alt=${tech.name} loading="lazy"/></li>`
            })
            $liElement.querySelector('ul').innerHTML = projectTechnologies; 
            $projectsList.append($liElement);
        })
        return $projectsList;
    })
    .catch(err => {
        console.error('error', err);
    })
}