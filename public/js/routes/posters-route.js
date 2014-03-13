define(function (require) {

    var log = require("slate/logger")(require("module").id),
        app = require("app"),
        PostersScreen = require("views/screens/posters-screen");
        
    var postersCollection = require("singletons/posters-collection"),
        meetsCollection = require("singletons/meets-collection"),
        subscriptionModel = require("singletons/subscription-model");
    
    return function () {
        postersCollection.fetch();
        meetsCollection.fetch();

        app.trigger("show:screen", new PostersScreen({
            postersCollection: postersCollection,
            meetsCollection: meetsCollection,
            subscriptionModel: subscriptionModel
        }));
    };
});
