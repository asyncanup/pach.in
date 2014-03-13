define(function (require) {
    
    var BaseRouter = require("slate/router");
    
    var AppRouter = Backbone.Router.extend({
        routes: {
            "":                         "home",
            "chronicles(/:meet_id)":    "chronicles",
            "posters(/:meet_id)":       "posters",
            "about":                    "about"
        },
        
        "home":         require("routes/home-route"),
        "chronicles":   require("routes/chronicles-route"),
        "posters":      require("routes/posters-route"),
        "about":        require("routes/about-route")
    });
    
    // Start listening to routes mentioned above
    return new AppRouter();
});
