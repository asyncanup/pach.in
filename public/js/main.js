// Configure requirejs plugins and shorten long paths
require.config({
    paths: {
        text: "../bower_components/requirejs-text/text",
        templates: "../templates",
        slate: "../slate"
    }
});

require(["app", "router"], function () {
    
    // Start routing so the right screen can be loaded
    Backbone.history.start();
});