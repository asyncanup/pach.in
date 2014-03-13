define(function (require) {

    var log = require("slate/logger")(require("module").id),
        app = require("app"),
        ChroniclesScreen = require("views/screens/chronicles-screen");
        
    var chroniclesCollection = require("singletons/chronicles-collection"),
        meetsCollection = require("singletons/meets-collection"),
        subscriptionModel = require("singletons/subscription-model");
    
    return function () {
        chroniclesCollection.fetch();
        meetsCollection.fetch();

        app.trigger("show:screen", new ChroniclesScreen({
            chroniclesCollection: chroniclesCollection,
            meetsCollection: meetsCollection,
            subscriptionModel: subscriptionModel
        }));
    };
});
