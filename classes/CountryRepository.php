<?php

require 'Country.php';
require 'State.php';

class CountryRepository {
	private static $countries = array();


	protected static function init() {
		$countries = array();
		
		array_push($countries,
			new Country('austria', 'at', array(
				new State('Syria'), new State('Vienna')
			))
		);
			
		array_push($countries,
			new Country('United States', 'us', array(
				new State('California'), new State('New York')
			))
		);
			
		array_push($countries,
			new Country('Luxembourg', 'lu'));
	
		self::$countries = $countries;
	
	}
	
	public static function getCountries() {
		if (count(self::$countries) === 0) {
			self::init();
		}
		return self::$countries;
		
	}
	
	public static function getStates($countryCode) {
		//check if $countries variable has been populated
		if (count(self::$countries) === 0) {
			self::init();
		}
		//filter countries by countryCode and saves in array, return that and store in country variable
		$country = array_filter(self::$countries, function($c) use ($countryCode) {
			return $c->code === $countryCode;
		});
		if (count($country) === 0 ) {
			return array(); //empty array
		}
		$firstCountry = array_shift($country);
		return $firstCountry->states;
	}
	
}