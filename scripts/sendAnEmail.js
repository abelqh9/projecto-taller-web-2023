export function sendAnEmail (email, data) {
    return fetch('https://formsubmit.co/ajax/' + email, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(res => res.ok ? res.json() : Promise.reject())
}