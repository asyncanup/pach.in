define(function (require) {
    
    var BaseView = require("slate/view"),
        log = require("slate/logger")(require("module").id),
        compile = require("slate/templates").compile;
    
    return BaseView.extend({
        log: log,
        template: compile(require("text!templates/screens/chronicles-screen.html")),
        
        beforeRender: function () {
            this.templateData = {
                rows: [
                    {
                        columns: [
                            {
                                id: 14,
                                name: "PACH Chronicles #15",
                                title: "PACH Chronicles #15: The one before Delhi Literature Festival.",
                                colWidth: 4
                            }
                        ]
                    }
                ]
            };
        }
    });
});