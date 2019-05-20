angular.module("myApp").controller("orderCtrl",function ($scope,$rootScope,$state,$timeout,$http) {

$http.get('api/getorders.php').then(function (resp) {
    if(resp.data.status){
        $scope.orders=resp.data.orders
    }
    else{
        console.log('error programer')
    }
})

    $scope.opencv=function(user){
        $scope.opcv=true;
        $scope.cv=user

        $(".modal-azoz-iner").fadeIn('slow')
    }
    $scope.closecv=function () {
        $(".modal-azoz-iner").slideUp('slow').ready(function () {
            $timeout(function () {
                $scope.opcv=false;
            },500);
        })
    }

    wow = new WOW(
        {

        }	)
        .init();

})
