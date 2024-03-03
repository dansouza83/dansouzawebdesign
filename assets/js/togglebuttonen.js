let website1 = '/en';
      let website2 = 'https://dansouza.netlify.app/';
      let currentWebsite = website1;

      function toggleWebsites() {
        if (currentWebsite === website1) {
          window.location.href = website2;
          currentWebsite = website2;
        } else {
          window.location.href = website1;
          currentWebsite = website1;
        }
      }
