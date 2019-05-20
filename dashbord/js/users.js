angular.module("myApp").controller("usersCtrl",function ($scope,$rootScope,$state,$timeout,$http) {

    $http.get('api/getusers.php').then(function (resp) {
        if(resp.data.status){
            $scope.users=resp.data.users
        }else{
            console.log('error progeramer')
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
