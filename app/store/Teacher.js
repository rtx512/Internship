Ext.define('scheduleApp.store.Teacher',{
    extend:'Ext.data.Store',
    alias: 'store.teacher',
    fields: [
        {name: 'id', type: 'int'},
        {name: 'id', type: 'string'}
    ],
    proxy: {
        type: 'ajax',
        url: 'http://127.0.0.1:8000/List/getTeachers',
        reader: {
            type: 'json',
        }
    },
    autoLoad: true,
});