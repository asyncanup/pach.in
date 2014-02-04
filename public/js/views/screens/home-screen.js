define(function (require) {
    
    var BaseView = require("slate/view"),
        log = require("slate/logger")(require("module").id);
    
    return BaseView.extend({
        initialize: function (opts) {
            log("Initialized");
        },
        
        render: function () {
            log("Rendered");
            
            return this;
        }
    });
});