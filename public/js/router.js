define(function (require) {
    
    var BaseRouter = require("slate/router");
    
    var AppRouter = Backbone.Router.extend({
        routes: {
            "": "home",
            "posters": "posters",
            "chronicles": "chronicles",
        },
        
        "home": require("routes/home-route")
    });
    
    // Start listening to routes mentioned above
    return new AppRouter();
});