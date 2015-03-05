app.config(function($routeProvider, $locationProvider, $interpolateProvider) {
	$interpolateProvider.startSymbol('{[').endSymbol(']}');
    $locationProvider.hashPrefix("!"), $routeProvider.when("/items/:item_id", {
        templateUrl: "/partials/c/items/show",
        controller: ItemsController
    }).when("/items/:item_id/reviews", {
        templateUrl: "/partials/c/items/reviews/index.html",
        controller: "ReviewsCtrl",
        requiredAddon: "review"
    }).when("/items/:item_id/reviews/edit", {
        templateUrl: "/partials/c/items/reviews/edit.html",
        controller: "ReviewsEditCtrl",
        requiredAddon: "review"
    }).when("/checkout", {
        templateUrl: "/partials/c/items/checkout",
        controller: ItemsController
    }).when("/checkout_confirm", {
        templateUrl: "/partials/c/items/checkout_confirm",
        controller: ItemsController
    }).when("/inquiry", {
        templateUrl: "/partials/c/stores/inquiry",
        controller: StoresController
    }).when("/tokushoho", {
        templateUrl: "/partials/c/stores/tokushoho",
        controller: StoresController
    }).when("/terms", {
        templateUrl: "/partials/c/stores/terms",
        controller: StoresController
    }).when("/privacy_policy", {
        templateUrl: "/partials/c/stores/privacy_policy",
        controller: StoresController
    }).when("/about", {
        templateUrl: "/partials/c/stores/about",
        controller: StoresController
    }).when("/unsubscribes/", {
        templateUrl: "/partials/c/stores/unsubscribe.html",
        controller: StoresController
    }).when("/emails/:id", {
        templateUrl: "/partials/c/emails/show.html",
        controller: EmailsController
    }).when("/news", {
        templateUrl: "/partials/c/stores/news.html",
        controller: NewsController,
        requiredAddon: "news"
    }).when("/news/:news_id", {
        templateUrl: "/partials/c/stores/news_show.html",
        controller: NewsController,
        requiredAddon: "news"
    }).when("/", {
        //templateUrl: "/partials/c/items/index.html",
        templateUrl: "/partials/c/items/index",
        controller: ItemsController
    }).otherwise({
        redirectTo: "/"
    })
}).run(function($rootScope, analytics) {
    $rootScope.$on("$routeChangeSuccess", function() {
        if (location.hash) {
            var path = location.pathname + location.search + decodeURI(location.hash);
            analytics.pageview(path), ga(function() {
                ga.getByName("owner") && ga("owner.send", "pageview", path)
            })
        }
    })
});