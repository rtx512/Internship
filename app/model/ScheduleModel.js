Ext.define('scheduleApp.model.ScheduleModel', {
    extend: 'Ext.data.Model',
    alias: 'model.schedule',
    fields: [
        {name: 'time'},
        {name: 'days'}
    ],
});