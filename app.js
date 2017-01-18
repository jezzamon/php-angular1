(function() {

    var app = angular.module('funwithcountries', ['ngRoute']);

		app.config(function($routeProvider) {
			$routeProvider.when("/"/*:firstName/:middleName/:lastName"*/,
				{
					templateUrl: "home.html",
					controller: "HomeCtrl",
					controllerAs: "home",
					resolve: {
						funwithcountries: function($q) {
							var defer = $q.defer();
							defer.resolve();
							return defer.promise; //https://thinkster.io/egghead/resolve for explanation of promise
							//https://thinkster.io/egghead/resolve-conventions
						}
					}
				}
			)
			.when('/cookies', 
			{
				template: 'NOM NOM NOM'	
			}
			)
			.when('/cookies/:cookieType',
				{
					redirectTo: /*'/'*/ function (routeParams, path, search) {
						console.log("route params",routeParams);
						console.log("path", path);
						console.log("search",search);
						return "/" + routerParams.cookieType;
					}
				}
			)
			.when('/sugar',
				{
					template: 'sugar cookie'
				}
			)
			.when('/states/:countryCode', {
				 templateUrl: 'state-view.html',
				 controller: function($routeParams, countryService) {
						 this.params = $routeParams;

						 var that = this;

						 countryService.getStates(this.params.countryCode || "").then(function(response) {
								 that.states = response.data;
						 })

						 this.addStateTo = function() {
								 if (!this.states) {
										 this.states = [];
								 }
								 this.states.push({name: this.newState});
								 this.newState = "";
						 };

				 },
				 controllerAs: 'stateCtrl'
       }
			)
			.otherwise({ template: "This route isn't set"
				
			});
		});
	
		app.controller('HomeCtrl', function($routeParams, $scope) {
//			var self = this;
//			self.message = $routeParams.firstName + ' ' $routeParams.middleName + ' ' + $routeParams.lastName;
				self.message = "Am i a great app?"
			$scope.model = {
				message: "I'm a great app!"
			}
		});
	
    app.factory('countryService', function($http) {
        var baseUrl = 'services/';

        return {
          getCountries: function() {
              return $http.get(baseUrl + 'getCountries.php');
          },
          getStates: function(countryCode) {
              return $http.get(baseUrl + 'getStates.php?countryCode=' +
                encodeURIComponent(countryCode));
          }
        };
    })

    app.controller('CountryController', function(countryService) {

        var that = this;

        countryService.getCountries().then(function(response) {
            that.countries = response.data;
        });

    });
	
		app.controller('AboutController', function(countryService) {

        var that = this;

//        countryService.getCountries().then(function(response) {
//            that.countries = response.data;
//        });
			
			console.log('About controller!!');

    });


})();
