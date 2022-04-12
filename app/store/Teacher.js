Ext.define('scheduleApp.store.Teacher', {
    extend: 'Ext.data.Store',
    alias: 'store.teacher',

    model: 'scheduleApp.model.IdNameModel',

    proxy: {
        type: 'ajax',
        url: 'https://127.0.0.1:8000/List/getTeachers',
        reader: {
            type: 'json',
        }
    },
    autoLoad: true,
});