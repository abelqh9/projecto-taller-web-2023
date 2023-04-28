export function setAnOberserver(elements, handler) {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                handler(entry.target);
            }
        })
    }, { rootMargin: '-10%' })
    
    elements.forEach(element => observer.observe(element));
}