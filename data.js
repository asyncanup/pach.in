var Firebase = require("firebase"),
    _ = require("underscore");
    
var pkg = require("./package.json"),
    db = new Firebase(process.env.FIREBASE).child(pkg.name.replace(".", "_"));
    
var data = {};

["posters", "chronicles", "subscriptions", "meets"].forEach(function (item) {
    data[item] = {};
    data[item].local = [];
    data[item].cloud = db.child(item);
    
    data[item].cloud.on("child_added", function (snap) {
        data[item].local.push(snap.val());
    });
    
    data[item].cloud.on("child_removed", function (snap) {
        var remoteItem = snap.val(),
            localItems = data[item].local;
        
        var localItemFound = _.find(localItems, function (localItem) {
            return _.isEqual(localItem, remoteItem);
        });
        
        localItems.splice(localItems.indexOf(localItemFound), 1);
    });
});

module.exports = data;
