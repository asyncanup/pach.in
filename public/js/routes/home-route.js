define(function (require) {

    var log = require("slate/logger")(require("module").id);

    return function () {
        log("Route fired!");

        var app = require("app"),
            HomeScreenView = require("views/screens/home-screen");
        
        var homeScreen = new HomeScreenView();
        
        app.trigger("show:screen", homeScreen);
    };
});