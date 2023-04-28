export function getTechnologiesUl(urlToFetch) {
    return fetch(urlToFetch)
    .then(res => res.ok ? res.json() : Promise.reject())
    .then(data => {
        const $technologiesLessExperienceList = document.createElement('ul');
        $technologiesLessExperienceList.classList.add('secundary-section__ul');
        data.forEach(technology => {
            const $liElement = document.createElement('li');
            $liElement.innerHTML = `
                <img src="${technology.img}" alt="${technology.name}" loading="lazy" />
            `;
            $technologiesLessExperienceList.append($liElement);
        })
        return $technologiesLessExperienceList;
    })
    .catch(err => {
        console.error('error', err);
    })
}