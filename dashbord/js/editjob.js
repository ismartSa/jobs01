angular.module("myApp").controller("editjobCtrl",function ($scope,$rootScope,$state,$timeout,$http) {

// <td>{{one.company_name}}</td>
//     <td><img src="{{one.logo}}" alt="" style="    width: 99%;height: auto;"></td>
//         <td>{{one.addr}}</td>
//     <td>{{one.job_name}}</td>
//     <td>{{one.job_repo}}</td>
//     <td>{{one.edu_requir}}</td>
//     <td>{{one.emp_status}}</td>
//     <td>{{one.other_benifits}}</td>
//     <td>{{one.descr}}</td>
//     <td>{{one.deadline}}</td>
//     <td>{{one.type}}</td>
//     <td>{{one.time}}</td>

    $scope.company_name=$rootScope.editd.company_name;
    $scope.address=$rootScope.editd.addr;
    $scope.job_name=$rootScope.editd.job_name;
    $scope.jop_repo=$rootScope.editd.job_repo;
    $scope.edu_required=$rootScope.editd.edu_requir;
    $scope.employment=$rootScope.editd.emp_status;
    $scope.other_benefits=$rootScope.editd.other_benifits;
    $scope.describe=$rootScope.editd.descr;
    $scope.final_date=$rootScope.editd.deadline;
    $scope.type=$rootScope.editd.type;
    $scope.img_src=$rootScope.editd.logo;

$scope.edita=function() {
    $http.post('api/editjob.php', {
        id: $rootScope.editd.id,
        company_name: $scope.company_name,
        address: $scope.address,
        job_name: $scope.job_name,
        jop_repo: $scope.jop_repo,
        edu_required: $scope.edu_required,
        employment: $scope.employment,
        other_benefits: $scope.other_benefits,
        describe: $scope.describe,
        final_date: $scope.final_date,
        type: $scope.type,
        img: $scope.img_src
    }).then(function (resp) {
        if (resp.data.status) {
            console.log('updated')
            $rootScope.editd=''
            $rootScope.move('app.job')

        } else {
            console.log('something go bad')
        }
    })
}
    wow = new WOW(
        {

        }	)
        .init();
})
