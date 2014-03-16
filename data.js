var Firebase = require("firebase"),
    _ = require("underscore"),
    debug = console.log;

var pkg = require("./package.json"),
    db = new Firebase(process.env.FIREBASE).child(pkg.name.replace(".", "_"));
    
var data = {};

["posters", "chronicles", "subscriptions", "meets"].forEach(function (type) {
    data[type] = {};
    data[type].local = [];
    data[type].names = [];
    data[type].cloud = db.child(type);

    data[type].cloud.on("child_added", function (snap) {
        data[type].local.push(snap.val());
        data[type].names.push(snap.name());
    });
    
    data[type].cloud.on("child_removed", function (snap) {
        var localNames = data[type].names,
            localItemIndex = localNames.indexOf(snap.name());
        
        if (~localItemIndex) {
            debug("Removed " + type + ": " + JSON.stringify(localItemIndex));
            data[type].local.splice(localItemIndex, 1);
            localNames.splice(localItemIndex, 1);
        } else {
            debug("Removed " + type + " not in local: " + JSON.stringify(snap.val()));
        }
    });
    
    data[type].cloud.on("child_changed", function (snap) {
        var remoteItem = snap.val(),
            localNames = data[type].names,
            localItemIndex = localNames.indexOf(snap.name());

        if (~localItemIndex) {
            debug("Changed " + type + ": " + JSON.stringify(localItemIndex));
            data[type].local[localItemIndex] = remoteItem;
        } else {
            debug("Changed " + type + " doesn't exist in local: " + JSON.stringify(remoteItem));
        }
    });
});

module.exports = data;
