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
                                id: 15,
                                name: "PACH Chronicles #15",
                                title: "PACH Chronicles #15: The one before Delhi Literature Festival.",
                                downloadLink: "https://dl.dropboxusercontent.com/u/1140834/pach/PACH%2015%20Newsletter.pdf",
                                embedLink: "http://docs.google.com/viewer?url=https%3A%2F%2Fdl.dropboxusercontent.com%2Fu%2F1140834%2Fpach%2FPACH%252015%2520Newsletter.pdf&embedded=true",
                                colWidth: 4
                            }
                        ]
                    }
                ]
            };
        }
    });
});