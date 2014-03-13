define(function (require) {

    var log = require("slate/logger")(require("module").id),
        app = require("app"),
        HomeScreen = require("views/screens/home-screen");

    return function () {
        app.trigger("show:screen", new HomeScreen());
    };
});
