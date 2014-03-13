define(function (require) {
    
    var eventsMixin = require("slate/events"),
        _ = require("slate/utils");
        
    // var logger = require("slate/logger");
    // logger.remoteLogging(true);
        
    var AppView = require("views/app-view"),
        appView = new AppView(),
        app = _.extend({}, eventsMixin);

    app.on("show:screen", appView.showScreen, appView);
    
    return app;
});
