define(function (require) {
    
    var BaseRouter = require("slate/router"),
        screenRoute = require("routes/screen-route");
    
    var AppRouter = Backbone.Router.extend({
        routes: {
            "":             "home",
            "board":        "board",
            "chronicles":   "chronicles",
            "posters":      "posters",
            "about":        "about"
        },
        
        "home":         screenRoute("home-screen"),
        "board":        screenRoute("board-screen"),
        "chronicles":   screenRoute("chronicles-screen"),
        "posters":      screenRoute("posters-screen"),
        "about":        screenRoute("about-screen")
    });
    
    // Start listening to routes mentioned above
    return new AppRouter();
});