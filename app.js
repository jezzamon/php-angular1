(function() {
	var app = angular.module('funwithcountries', ['ngRoute']);
	
	//SERVICE
	app.factory('countryService', function($http) {
		var baseUrl = 'services/';
		
		
		return {
			getCountries: function() {
				return $http.get(baseUrl + 'getCountries.php');
			},
			getStates: function(countryCode) {
				return $http.get(baseUrl + 'getStates.php?countryCode=' + countryCode);
			}
		}
	})
	
	//CONTROLLERS
	app.controller('CountryController', function(countryService) {
		
		this.countries = [];
		
		countryService.getCountries().then(function(returnedData) {
			this.countries = returnedData.data;
			console.log(this.countries)
		}.bind(this));
		
		
	});
	
	var StateController = /*app.controller('StateController', */function() {
		
		this.newState = ""; 
		
		this.addStateTo = function(country) {
			if (!country.states) {
				country.states = [];
			}
			country.states.push({name: this.newState});
			this.newState = ""; //reset field
			
		}
	}/*)*/;
	
	//ROUTES
	app.config(function($routeProvider) {
		$routeProvider.
		when('/states/:countryCode', {
			templateUrl: 'state-view.html',
			controller: function($routeParams, $location, countryService) {
				this.params = $routeParams;
				
				var that = this;
				
				countryService.getStates(this.params.countryCode || "")
				.then(function(returnedData) {
					that.states = returnedData;
				})
				
				
				this.addStateTo = function() {
					if (!this.states) {
						this.states = [];
					}
					this.states.push({name: this.newState}); //ng-model
					this.newState = ""; //reset field

				}
			},
			controllerAs: 'stateCtrl'
		})
		.when('/home', {
			templateUrl: 'home.html',
			controller: 'HomeController',
			controllerAs: 'homeCtrl'
  	}).
  	when('/about', {
			templateUrl: 'about.html',
			controller: 'AboutController',
			controllerAs: 'AboutCtrl'
  });
	});
	
	app.controller('HomeController', function () {
  console.log('2. HomeController loaded!');
})

app.controller('AboutController', function () {
  console.log('3. AboutController loaded!');
});
	//DIRECTIVE
//	app.directive('stateView', function() {
//		return {
//			restrict: 'E',
//			templateUrl: 'state-view.html',
//			controller: StateController,
//			controllerAs: 'stateCtrl',
//		}
//	}); //No longer using this due to router

}());



