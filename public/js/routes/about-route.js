define(function (require) {

    var log = require("slate/logger")(require("module").id),
        app = require("app"),
        AboutScreen = require("views/screens/about-screen");

    return function () {
        app.trigger("show:screen", new AboutScreen());
    };
});
