Ext.define('scheduleApp.view.main.schedule.Schedule', {
    extend: 'Ext.grid.Panel',
    xtype: 'mainSchedule',
    requires:[
        'scheduleApp.view.main.schedule.ScheduleController',
        'scheduleApp.view.main.schedule.ScheduleModel',

        'scheduleApp.store.Personnel'
    ],

    store:{
        type: 'personnel',
    },

    controller: 'schedule',
    viewModel: 'schedule',

    columns:{
        items:[
            {
                text:'Время',
                dataIndex:'time',
                flex: 0.8,
                listenersDisable:true,
                renderer: null,
            },
            {
                text:'Понидельник',
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