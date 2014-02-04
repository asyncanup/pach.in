define(function (require) {

    var logger = function (moduleId) {
        var moduleArgs = [];
        
        if (moduleId) {
            moduleArgs = ["%c " + moduleId, "color: darkgrey"];
        }
        
        return function () {
            var logArgs = [].slice.call(arguments);
            
            console.log.apply(console, moduleArgs.concat(logArgs));
        };
    }
    
    return logger;
});