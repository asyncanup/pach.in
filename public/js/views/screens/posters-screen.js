define(function (require) {
    
    var BaseView = require("slate/view"),
        log = require("slate/logger")(require("module").id),
        compile = require("slate/templates").compile;
    
    return BaseView.extend({
        log: log,
        template: compile(require("text!templates/screens/posters-screen.html")),
        
        beforeRender: function () {
            this.templateData = {
                rows: [
                    {
                        columns: [
                            {
                                id: "1",
                                name: "PACH #1",
                                title: "PACH #1: The one with waxing.",
                                colWidth: 4
                            },
                            {
                                id: "2",
                                name: "PACH #1",
                                title: "PACH #1: The one with waxing.",
                                colWidth: 4
                            },
                            {
                                id: "3",
                                name: "PACH #1",
                                title: "PACH #1: The one with waxing.",
                                colWidth: 4
                            }
                        ]
                    },
                    {
                        columns: [
                            {
                                id: "4",
                                name: "PACH #1",
                                title: "PACH #1: The one with waxing.",
                                colWidth: 4
                            },
                            {
                                id: "5",
                                name: "PACH #1",
                                title: "PACH #1: The one with waxing.",
                                colWidth: 4
                            },
                            {
                                id: "6",
                                name: "PACH #1",
                                title: "PACH #1: The one with waxing.",
                                colWidth: 4
                            }
                        ]
                    },
                    {
                        columns: [
                            {
                                id: "7",
                                name: "PACH #1",
                                title: "PACH #1: The one with waxing.",
                                colWidth: 4
                            },
                            {
                                id: "8",
                                name: "PACH #1",
                                title: "PACH #1: The one with waxing.",
                                colWidth: 4
                            },
                            {
                                id: "9",
                                name: "PACH #1",
                                title: "PACH #1: The one with waxing.",
                                colWidth: 4
                            }
                        ]
                    },
                    {
                        columns: [
                            {
                                id: "10",
                                name: "PACH #1",
                                title: "PACH #1: The one with waxing.",
                                colWidth: 4
                            },
                            {
                                id: "11",
                                name: "PACH #1",
                                title: "PACH #1: The one with waxing.",
                                colWidth: 4
                            },
                            {
                                id: "12",
                                name: "PACH #1",
                                title: "PACH #1: The one with waxing.",
                                colWidth: 4
                            }
                        ]
                    },
                    {
                        columns: [
                            {
                                id: "13",
                                name: "PACH #1",
                                title: "PACH #1: The one with waxing.",
                                colWidth: 4
                            },
                            {
                                id: "14",
                                name: "PACH #1",
                                title: "PACH #1: The one with waxing.",
                                colWidth: 4
                            }
                        ]
                    }
                ]
            };
        }
        // events: {
        //     "click [data-toggle=lightbox]": "openLightbox"
        // },
        
        // thumbnail
    });
});