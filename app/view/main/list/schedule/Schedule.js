Ext.define('scheduleApp.view.main.schedule.Schedule', {
    extend: 'Ext.grid.Panel',
    xtype: 'mainSchedule',
    requires:[
        'scheduleApp.view.main.schedule.ScheduleController',
        'scheduleApp.view.main.schedule.ScheduleModel',

        'scheduleApp.store.Schedule'
    ],

    store:{
        type: 'schedule',
    },

    controller: 'schedule',
    viewModel: 'schedule',

    columns:{
        items:[
            {
                text:'Время',
                dataIndex: 'time',
                flex: 0.8,
                listenersDisable:true,
                renderer: function (value) {
                    return value.name
                },
            },
            {
                text:'Понедельник',
                itemId: 'monday'
            },
            {
                text:'Вторник',
            },
            {
                text:'Среда',
            },
            {
                text:'Четверг',
            },
            {
                text:'Пятница',
            },
            {
                text:'Субота',
            },
            {
                text:'Воскресенье',
            },
        ],
        defaults: {
            menuDisabled: true,
            flex: 1,
            renderer: 'ren',
            dataIndex: 'days',
        }
    },
    listeners:{
        cellclick: 'cellClick'
    },
});