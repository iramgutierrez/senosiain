(function (_) {

  angular.module('app.controllers', [])

    .controller('HomeController', ['$scope', 'AppService' , function ($scope, AppService) {      

    	
    	$scope.checkForm = function(event , valid)
        { 
            event.preventDefault();

            AppService.addMedicaments({

                'summary' : $scope.summary,

            })
            
            .then(function(data){ 

                $scope.getMedicaments();

                $scope.summary = '';

            });

        }

        $scope.medicaments = [];

        $scope.getMedicaments = function()
        {

            AppService.getMedicaments()
            
            .then(function(data){ 

               $scope.medicaments = data;

            });


        }

    }])

})();
