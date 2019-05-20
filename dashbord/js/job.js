angular.module("myApp").controller("jobCtrl",function ($scope,$rootScope,$state,$timeout,$http) {
    // if(!$rootScope.user){
    //     $state.go('login')
    // }

    $http.get('api/getjobs.php').then(function (resp) {
        if(resp.data.status){
            $scope.jobs=resp.data.jobs;
        }else {
            console.log('no jobs');
        }
    })

    $scope.openmodaladdjob=function () {
        $scope.addjobmodal=true;

        $(".modal-azoz-iner").fadeIn('slow')
    }
    $scope.closebackupmodal=function () {
        $(".modal-azoz-iner").slideUp('slow').ready(function () {
            $timeout(function () {
                $scope.addjobmodal=false;
            },500);
        })
    }
    $rootScope.editd=''

    $scope.addjob=function(){
        if($scope.company_name && $scope.address && $scope.job_name && $scope.jop_repo && $scope.edu_required && $scope.employment && $scope.other_benefits && $scope.describe && $scope.final_date &&$scope.type && $scope.img_src){
            $http.post('api/addjob.php',{
                company_name:$scope.company_name,
                address:$scope.address,
                job_name:$scope.job_name,
                jop_repo:$scope.jop_repo,
                edu_required:$scope.edu_required,
                employment:$scope.employment,
                other_benefits:$scope.other_benefits,
                describe:$scope.describe,
                final_date:$scope.final_date,
                type:$scope.type,
                img:$scope.img_src
            }).then(function (resp) {
                if(resp.data.status){
                    $scope.closebackupmodal();
                    $scope.jobs.push({
                        company_name:$scope.company_name,
                        addr:$scope.address,
                        job_name:$scope.job_name,
                        job_repo:$scope.jop_repo,
                        edu_requir:$scope.edu_required,
                        emp_status:$scope.employment,
                        other_benifits:$scope.other_benefits,
                        descr:$scope.describe,
                        deadline:$scope.final_date,
                        type:$scope.type,
                        logo:$scope.img_src
                    // <td>{{one.time}}</td>
                    });

                    $scope.company_name='';
                        $scope.address='';
                        $scope.job_name='';
                        $scope.jop_repo='';
                        $scope.edu_required='';
                        $scope.employment='';
                        $scope.other_benefits='';
                        $scope.describe='';
                        $scope.final_date='';
                        $scope.type='';
                        $scope.img_src='';
                }else{
                    $scope.closebackupmodal();
                    console.log('field to add')
                }
            })
        }else{
            $scope.empty=true
        }
    }

    $scope.edit=function(job){
        $rootScope.editd=job;
        $rootScope.move('app.editjob');
    }




    $scope.addgroup=function(){
        alert('grhr')
        if($scope.img_src && $scope.name && $scope.dec){
            $http.post('api/addgroup.php',{
                name:$scope.name,
                dec:$scope.dec,
                img:$scope.img_src
            }).then(function (resp) {
                if (resp.data.status){
                    alert('تم الاضافة')
                }
                else {
                    alert('حدث خطاء غير متوقع ')
                }
            })
        }
        else {
            alert('fill all the field')
        }
    }
$scope.ready=function(element){

    $scope.currentFile = element.files[0];
    var reader = new FileReader();

    reader.onload = function (event) {
        $scope.img_src = event.target.result
        //img_src can be used in HTML//
        $scope.$apply(function ($scope) {

            $scope.file= element.files[0];

            //$scope.files[0] can be sent to the server
            $scope.changed = true;
        });
    }
    reader.readAsDataURL(element.files[0]);
}
    wow = new WOW(
        {

        }	)
        .init();
})
