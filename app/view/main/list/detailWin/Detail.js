Ext.define('scheduleApp.view.main.list.detailWin.Detail',{
    extend: 'Ext.window.Window',
    requires:[
        'scheduleApp.store.Personnel',
        'scheduleApp.view.main.list.detailWin.DetailController',
        'scheduleApp.view.main.list.detailWin.DetailModel'
    ],
    controller: 'detailWin',
    viewModel: 'detailWin',

    store:{
        type: 'personnel',
    },

    title:'Полная информация',
    height:305,
    width:300 ,
    modal: true,

    items:[
        {
            xtype: 'textfield',
            fieldLabel:'Группа:',
            readOnly:true,
            margin:10,
            bind: {
                value: '{schedule.group}'
            }
        },
        {
            xtype: 'textfield',
            fieldLabel:'Прредмет:',
            readOnly:true,
            margin:10,
            bind: {
                value: '{schedule.subject}'
            }
        },
        {
            xtype: 'textfield',
            fieldLabel:'Кабинет:',
            readOnly:true,
            margin:10,
            bind: {
                value: '{schedule.cabinet}'
            }
        },
        {
            xtype: 'textfield',
            fieldLabel:'Препод:',
            readOnly:true,
            margin:10,
            bind: {
                value: '{schedule.teacher}'
            }
        },
        {
            xtype: 'textfield',
            fieldLabel:'Время:',
            readOnly:true,
            margin:10,
            bind: {
                value: '{schedule.times}'
            }
        },

    ],
    buttons: [
            {
                xtype: 'button',
                text: 'закрыть',
                listeners: {
                    click: 'closeDetail',
                }
            },
        ]
})