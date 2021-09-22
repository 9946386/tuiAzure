// Install service worker
self.addEventListener('install', evt =>{
    console.log('service worker has been installed')
});

// Activate service 
self.addEventListener('activate', evt => {
    console.log('service worker has been activated')
})