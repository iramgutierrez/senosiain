(function () {

  angular.module('app.services', [])

    .factory('AppService', ['$http', '$q', '$filter' , function ($http, $q , $filter) {     
      

      function addMedicaments(params) 
      {

        var deferred = $q.defer();

        var url = 'site/addMedicaments';

        $http({
            method: 'POST',
            url: url,
            data: $.param(params),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
        .success(function (data) {

          deferred.resolve(data);

        });

        return deferred.promise;


      }

      function getMedicaments() 
      {

        var deferred = $q.defer();

        var url = 'site/getMedicaments';

        $http.get(url)
          .success(function (data) {

            deferred.resolve(data);
          
          });

        return deferred.promise;

      }

      return {

        addMedicaments : addMedicaments,
        getMedicaments : getMedicaments

      };

    }]);

})();
