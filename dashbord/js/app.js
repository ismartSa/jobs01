angular.module("myApp",['ui.router','ngAnimate','ngSanitize','ui.bootstrap'])
    .config(function($stateProvider,$urlRouterProvider) {


        $stateProvider

            .state("app", {
                url: "/app",
                views: {
                    "main": {
                        templateUrl: "templates/app.html",
                        controller: "appCtrl"
                    }
                }
            })
            .state("app.home", {
                url: "/home",
                views: {
                    "sub": {
                        templateUrl: "templates/home.html",
                        controller: "homeCtrl"
                    }
                }
            })
            .state("app.job", {
                url: "/job",
                views: {
                    "sub": {
                        templateUrl: "templates/job.html",
                        controller: "jobCtrl"
                    }
                }
            })
            .state("app.editjob", {
                url: "/editjob",
                views: {
                    "sub": {
                        templateUrl: "templates/editjob.html",
                        controller: "editjobCtrl"
                    }
                }
            })
            .state("app.users", {
                url: "/users",
                views: {
                    "sub": {
                        templateUrl: "templates/users.html",
                        controller: "usersCtrl"
                    }
                }
            })
            .state("app.order", {
                url: "/order",
                views: {
                    "sub": {
                        templateUrl: "templates/order.html",
                        controller: "orderCtrl"
                    }
                }
            })

        $urlRouterProvider.otherwise("/app/home")

    })