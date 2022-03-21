Ext.define('scheduleApp.Application', {
    extend: 'Ext.app.Application',

    name: 'scheduleApp',

    quickTips: false,
    platformConfig: {
        desktop: {
            quickTips: true
        }
    },

    stores: [
        'scheduleApp.store.Groups',
        'scheduleApp.store.Teacher',
        'scheduleApp.store.Time',
        'scheduleApp.store.Subject'
    ],

    launch: function () {
        // TODO - Launch the application
    },
});


