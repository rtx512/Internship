Ext.define('scheduleApp.store.Schedule', {
    extend: 'Ext.data.Store',

    alias: 'store.schedule',

    fields: [
        {name: 'time'},
        {name: 'days'}
    ],
    proxy: {
        type: 'ajax',
        url: 'https://127.0.0.1:8000/Grid/getSchedule',
        reader: {
            type: 'json',
        }
    },
    autoLoad: false,
});