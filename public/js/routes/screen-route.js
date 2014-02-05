define(function (require) {

    var log = require("slate/logger")(require("module").id);

    return function (screen) {
        return function () {
            log("Fired for: " + screen);
    
            var app = require("app");
            
            require(["views/screens/" + screen], function (ScreenView) {
                app.trigger("show:screen", new ScreenView());
            });
        };
    };
});