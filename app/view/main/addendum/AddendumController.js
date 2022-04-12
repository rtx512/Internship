Ext.define('scheduleApp.view.main.addendum.AddendumController', {
    extend: 'Ext.app.ViewController',
    alias: 'controller.addendum',

    addPara: function(me) {
        me.up('#mainAddendum').submit({
            url: 'https://127.0.0.1:8000/Grid/setSchedule',
        });
    }
});