var app = angular.module('app', []);

app.filter('array', function() {
  return function(items) {
    var filtered = [];
    angular.forEach(items, function(item) {
      filtered.push(item);
    });
   return filtered;
  };
});

/*app.filter('populares', function() {
	return function(obras) {
		var obrasMaisVotadas = [];
		angular.

	}
});*/