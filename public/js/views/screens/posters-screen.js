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
                                title: "PACH #1: Warming up over coffee.",
                                colWidth: 4
                            },
                            {
                                id: "2",
                                name: "PACH #2",
                                title: "PACH #2: Singing as the heavens pour.",
                                colWidth: 4
                            },
                            {
                                id: "3",
                                name: "PACH #3",
                                title: "PACH #3: A gamut of new faces.",
                                colWidth: 4
                            }
                        ]
                    },
                    {
                        columns: [
                            {
                                id: "4",
                                name: "PACH #4",
                                title: "PACH #4: Out in the garden, scurrying under rain.",
                                colWidth: 4
                            },
                            {
                                id: "5",
                                name: "PACH #5",
                                title: "PACH #5: All the melodrama, all the fond hugs.",
                                colWidth: 4
                            },
                            {
                                id: "6",
                                name: "PACH #6",
                                title: "PACH #6: Jai Kanhaiyaa Lal Ki Bolo Jai Kanhaiya Lal Ki.",
                                colWidth: 4
                            }
                        ]
                    },
                    {
                        columns: [
                            {
                                id: "7",
                                name: "PACH #7",
                                title: "PACH #7: When poetry married cheap humour.",
                                colWidth: 4
                            },
                            {
                                id: "8",
                                name: "PACH #8",
                                title: "PACH #8: Music and sighs, crowded and nice.",
                                colWidth: 4
                            },
                            {
                                id: "9",
                                name: "PACH #9",
                                title: "PACH #9: When daughters cried.",
                                colWidth: 4
                            }
                        ]
                    },
                    {
                        columns: [
                            {
                                id: "10",
                                name: "PACH #10",
                                title: "PACH #10: Mingling poetry with heritage.",
                                colWidth: 4
                            },
                            {
                                id: "11",
                                name: "PACH #11",
                                title: "PACH #11: PACHakradhar.",
                                colWidth: 4
                            },
                            {
                                id: "12",
                                name: "PACH #12",
                                title: "PACH #12: All the friends and the poems.",
                                colWidth: 4
                            }
                        ]
                    },
                    {
                        columns: [
                            {
                                id: "13",
                                name: "PACH #13",
                                title: "PACH #13: Rising poetry on descending steps.",
                                colWidth: 4
                            },
                            {
                                id: "14",
                                name: "PACH #14",
                                title: "PACH #14: Soaking poems under the balmy sun.",
                                colWidth: 4
                            },
                            {
                                id: "15",
                                name: "PACH #15",
                                title: "PACH #15: On an open terrace one chilly day.",
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