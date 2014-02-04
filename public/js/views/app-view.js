define(function (require) {
    
    var BaseView = require("slate/view"),
        log = require("slate/logger")(require("module").id);
    
    return BaseView.extend({
        // Attach directly to body element
        el: "body",
        
        initialize: function (opts) {
            log("Initialized");
        },
        
        showScreen: function (screen) {
            log("Showing screen", screen.el);
            this.$el.html(screen.render().el);
            
            return this;
        }
    });
});