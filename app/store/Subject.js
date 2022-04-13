Ext.define('scheduleApp.store.Subject', {
    extend: 'Ext.data.Store',
    alias: 'store.subject',

    model: 'scheduleApp.model.IdNameModel',

    proxy: {
        type: 'ajax',
        url: 'https://127.0.0.1:8000/List/getSubjects',
        reader: {
            type: 'json',
        }
    },
    autoLoad: true,
});