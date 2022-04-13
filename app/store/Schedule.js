Ext.define('scheduleApp.store.Schedule', {
    extend: 'Ext.data.Store',

    alias: 'store.schedule',

    model: 'scheduleApp.model.ScheduleModel',

    proxy: {
        type: 'ajax',
        url: 'https://127.0.0.1:8000/Grid/getSchedule',
        reader: {
            type: 'json',
        }
    },
    autoLoad: false,
});