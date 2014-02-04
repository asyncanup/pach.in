define(function (require) {
    
    var eventsMixin = require("slate/events"),
        _ = require("slate/utilities");
        
    var AppView = require("views/app-view");
    
    var appView = new AppView(),
        app = _.extend({}, eventsMixin);

    app.on("show:screen", appView.showScreen, appView);
    
    return app;
});