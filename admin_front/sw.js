// Service Worker Installation
self.addEventListener('install', function(event) {
  console.log('Service worker installed');

  // Cache assets
  event.waitUntil(
    caches.open('1mall-cache-v1').then(function(cache) {
      return cache.addAll([
        '/',
        'index.html',
        'manifest.json',
        'img/icons/favicon.png' 
      ]);
    })
  );
});

// Service Worker Activation
self.addEventListener('activate', function(event) {
  console.log('Service worker activated');
});

// Fetch Event: Intercepting network requests
self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request).then(function(response) {
      // Cache hit - return response
      if (response) {
        return response;
      }
      // Clone the request to make sure it's safe to read when fetching
      let fetchRequest = event.request.clone();

      return fetch(fetchRequest).then(function(response) {
        // Check if valid response is received
        if(!response || response.status !== 200 || response.type !== 'basic') {
          return response;
        }

        // Clone the response to store it in cache
        let responseToCache = response.clone();

        caches.open('1mall-cache-v1').then(function(cache) {
          cache.put(event.request, responseToCache);
        });

        return response;
      });
    })
  );
});
