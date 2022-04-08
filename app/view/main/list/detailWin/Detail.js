Ext.define('scheduleApp.view.main.list.detailWin.Detail',{
    extend: 'Ext.window.Window',
    itemId: 'detailWindow',
    id:'test',
    requires:[
        'scheduleApp.store.Schedule',

        'scheduleApp.view.main.list.detailWin.DetailController',
        'scheduleApp.view.main.list.detailWin.DetailModel'
    ],
    controller: 'detailWin',
    viewModel: 'detailWin',

    store:{
        type: 'schedule',
    },

    title:'Полная информация',
    height:350,
    width:300 ,
    modal: true,

    items:[
        {
            xtype: 'combobox',
            fieldLabel:'Группа:',
            store: 'scheduleApp.store.Groups',
            valueField: 'id',
            displayField: 'name',
            margin:10,
            bind: {
                emptyText: '{schedule.group.name}'
            }
        },
        {
            xtype: 'combobox',
            fieldLabel:'Прредмет:',
            // store: 'scheduleApp.store.Subject',
            // valueField: 'id',
            // displayField: 'name',
            margin:10,
            bind: {
                value: '{schedule.subject.name}'
            }
        },
        {
            xtype: 'combobox',
            fieldLabel:'Кабинет:',
            // store: 'scheduleApp.store.Cabinet',
            // valueField: 'id',
            // displayField: 'name',
            margin:10,
            bind: {
                value: '{schedule.cabinet.name}'
            }
        },
        {
            xtype: 'combobox',
            fieldLabel:'Препод:',
            // store: 'scheduleApp.store.Teacher',
            // valueField: 'id',
            // displayField: 'name',
            margin:10,
            bind: {
                value: '{schedule.teacher.name}'
            }
        },
        {
            xtype: 'combobox',
            fieldLabel:'Время:',
            //store: 'scheduleApp.store.Time',
            //valueField: 'id',
            //displayField: 'name',
            margin:10,
            bind: {
                value: '{schedule.times.name}'
            }
        },
        {
            xtype: 'datefield',
            fieldLabel:'Дата:',
            format: 'd.m.Y',
            margin:10,
            bind: {
                value: '{schedule.date}'
            }
        },
        {
            xtype: 'textfield',
            fieldLabel: 'id',
            itemId: 'scheduleId',
            margin:10,
            bind: {
                value: '{schedule.id}'
            },
            hidden: true
        },
    ],
    buttons: [
        {
            xtype: 'button',
            text: 'Сохранить',
            listeners: {
                click: 'getEditing',
            }
        },
        {
            xtype: 'button',
            text: 'удалить',
            /*bind: {
                value: '{schedule.id}'
            },*/
            listeners: {
                click: 'deletePara'
            }
        },
        {
                xtype: 'button',
                text: 'отмена',
                listeners: {
                    click: 'cancelEditing',
                }
            },
        ]
})