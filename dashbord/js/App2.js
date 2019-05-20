angular.module("myApp").controller("appCtrl",function ($scope,$rootScope,$state,$http,$uibModal,$timeout) {
    // if(!$rootScope.user){
    //     $state.go('login')
    // }
    $rootScope.move=function (wh) {
        $rootScope.duration = true
        $timeout(function () {
            $rootScope.duration = false
        }, 2000)

        $state.go(wh)
    }

    $(document).ready(function(){
        $(".navbar-collapse ul li").click(function(){

            $(".navbar-collapse ul li").removeClass("active")
            $(this).addClass('active')

        })

    })
$scope.backup=function () {
    $http.get("../../dobackup.php").then(function (resp) {
        if(resp.data.sataus){
            $scope.closebackupmodal()
        }
        else
        {
            console.log(resp)
            console.log(resp.data)
            alert("فشلت عملية النسخ")

        }
    })
}
$scope.openbackupmodal=function () {
    $scope.backupmodal=true;

    $(".modal-azoz-iner").fadeIn('slow')
}
$scope.closebackupmodal=function () {
    $(".modal-azoz-iner").slideUp('slow').ready(function () {
        $timeout(function () {
            $scope.backupmodal=false;
        },500);
    })
}
});