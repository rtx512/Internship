Ext.define('scheduleApp.view.main.list.detailWin.Detail',{
    extend: 'Ext.window.Window',
    itemId: 'detailWindow',
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

    title:'Редактирование',
    height:350,
    width:300 ,
    modal: true,

    items:[
        {
            xtype: 'combobox',
            fieldLabel:'Группа:',
            itemId: 'groupId',
            store: 'scheduleApp.store.Groups',
            valueField: 'id',
            displayField: 'name',
            margin:10,
            bind: {
                value: '{schedule.group.id}'
            }
        },
        {
            xtype: 'combobox',
            fieldLabel:'Прредмет:',
            itemId: 'subjectId',
            store: 'scheduleApp.store.Subject',
            valueField: 'id',
            displayField: 'name',
            margin:10,
            bind: {
                value: '{schedule.subject.id}'
            }
        },
        {
            xtype: 'combobox',
            fieldLabel:'Кабинет:',
            itemId: 'cabinetId',
            store: 'scheduleApp.store.Cabinet',
            valueField: 'id',
            displayField: 'name',
            margin:10,
            bind: {
                value: '{schedule.cabinet.id}'
            }
        },
        {
            xtype: 'combobox',
            fieldLabel:'Препод:',
            itemId: 'teacherId',
            store: 'scheduleApp.store.Teacher',
            valueField: 'id',
            displayField: 'name',
            margin:10,
            bind: {
                value: '{schedule.teacher.id}'
            }
        },
        {
            xtype: 'combobox',
            fieldLabel:'Время:',
            itemId: 'timeId',
            store: 'scheduleApp.store.Time',
            valueField: 'id',
            displayField: 'name',
            margin:10,
            bind: {
                value: '{schedule.times.id}'
            }
        },
        {
            xtype: 'datefield',
            fieldLabel:'Дата:',
            itemId: 'date',
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
        ],
})