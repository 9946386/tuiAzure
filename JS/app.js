// Navitgator : object in js that represents the browser & information about it
// Checking if the serviceWorker property exists in the navigator. If it supports service workers
if('serviceWorker' in navigator){
    // async task to register service worker
    navigator.serviceWorker.register('/sw.js')
        // if successfull
        .then((reg) => console.log('service worker registered', reg))
        // if not successfull
        .catch((err) => console.log('service worker not registered', err))
}