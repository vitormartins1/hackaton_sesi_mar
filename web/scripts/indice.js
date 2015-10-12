app.controller('indiceController', ['$scope', '$window', '$http', '$location', '$filter', function ($scope, $window, $http, $location, $filter) {
	$http.get('http://museumar.esy.es/getPhotos.php').
	then(function(response) {
		$scope.dados = response.data;
		$scope.obras = [];
		for (element in $scope.dados) {
			$scope.obras.push($scope.dados[element]);
		}

		return $scope.obras;
	}, function(response) {
        $http.get('php/getPhotos.php').
		then(function(response) {
			$scope.dados = response.data;
			$scope.obras = [];
			for (element in $scope.dados) {
				$scope.obras.push($scope.dados[element]);
			}

			return $scope.obras;
		}, function(response) {
        	// error
		});
	});

	$scope.voted = false;
	$scope.sortorder = '-likes';
	$scope.limitPhotos = 12;

	$scope.likeButton = function(obras) {
		obras.likes++;
		$scope.voted = true;
	}

	$scope.userDontVoteYet = function() {
		return !$scope.voted;
	}
}]);



$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})