define(function (require) {
    
    var BaseView = require("slate/view"),
        log = require("slate/logger")(require("module").id);
    
    return BaseView.extend({
        // Attach directly to body element
        el: "body > .content",
        
        showScreen: function (screen) {
            var timeToHide = 0;
            if (this.showingScreen && this.showingScreen.hide) {
                timeToHide = this.showingScreen.hide();
            }
            
            setTimeout(function () {
                this.$el.html(screen.render().el);
                this.showingScreen = screen;
                
            }.bind(this), timeToHide);
            
            return this;
        }
    });
});