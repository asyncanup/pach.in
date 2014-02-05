define(function (require) {
    
    var BaseView = require("slate/view"),
        log = require("slate/logger")(require("module").id),
        compile = require("slate/templates").compile;
    
    return BaseView.extend({
        log: log,
        template: compile(require("text!templates/screens/board-screen.html"))
    });
});