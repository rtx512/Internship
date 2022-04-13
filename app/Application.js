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
        'scheduleApp.store.Cabinet',
        'scheduleApp.store.Groups',
        'scheduleApp.store.Teacher',
        'scheduleApp.store.Time',
        'scheduleApp.store.Subject',
        'scheduleApp.store.Period',
        'scheduleApp.store.Schedule'
    ],

    launch: function () {
        // TODO - Launch the application
    },
});


