var app = require("apper")(__dirname);

app.init() && app.start(process.env.PORT || 3000);