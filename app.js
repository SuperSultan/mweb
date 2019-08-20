angular.module('mweb', [])
// $scope is a holder for all scope variables
.controller("PurchaseCtrl", function($scope, $http) {
    $scope.purchase = {
        //num_seats: 0
    };
    $scope.submit = function(purchase) {
        console.log('purchase', purchase);
        //$http is an injected service that we post into form-test (makes AJAX call and posts purchase)
        // after it finishes asynchronously, when it succeeds, we run this callback
        //$http posts by default as JSON
        $http.post('/purchase.php', purchase).then(function(data) {
            console.log('data', data.data);
        });
    };
})
;