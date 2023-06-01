var wpApp = new angular.module("wpApp", ["ngRoute", "ngResource", "ui.router"]);

wpApp.config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouteProvider) {
    $urlRouteProvider.otherwise('/');
    $stateProvider.state(
        'list',
        {
            url:'/',
            controller: 'ListCtrl',
            templateUrl: appInfo.template_directory + 'templates/list.html'
        }
    ).state(
        'detail',
        {
            url:'/posts/:id',
            controller: 'DetailCtrl',
            templateUrl: appInfo.template_directory + 'templates/detail.html',
        }
    )
}]);


wpApp.factory('Posts', function ($resource) {
    return $resource(appInfo.api_url + 'posts/:ID', {
        ID: '@id'
    })
});


wpApp.controller('ListCtrl', [
        '$scope',
        'Posts',
        function ($scope, Posts) {
            console.log('ListCtrl');
            $scope.page_title = 'Blog Listing';
            Posts.query(
                function (res) {

                    $scope.posts = res;
                }
            );
        }
    ]);


wpApp.controller('DetailCtrl', [
    '$scope',
    '$stateParams',
    'Posts',
    function ($scope,$stateParams, Posts) {
        console.log($stateParams);
        $scope.page_title = 'Detail Listing';
        Posts.get(
            {
                ID: $stateParams.id,
            },
            function (res) {
                console.log(res);
                $scope.post = res;
            }
        );
    }
]);

wpApp.filter(
    'to_trusted',
    [
        '$sce',
        function ($sce) {
            return function (text) {
                return $sce.trustAsHtml(text);
            }
        }
    ]
);

