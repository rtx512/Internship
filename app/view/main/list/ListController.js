Ext.define('scheduleApp.view.main.list.ListController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.list',

    DateFilter: function (me) {
        let gridStore = me.up('mainlist').down('mainSchedule').getStore();
        if (me.up('mainlist').down('combobox').getValue() != null){
            gridStore.load({
                params: {
                    groupId: me.up('mainlist').down('combobox').getValue(),
                    date: me.lastValue
                }
            });
        } else (alert('ВЫБЕРИТЕ ГРУППУ!!!'))
    },

    GroupsFilter: function (me) {
        let gridStore = me.up('mainlist').down('mainSchedule').getStore();
        if (me.up('mainlist').down('datefield').lastValue != null) {
            gridStore.load({
                params: {
                    groupId: me.getValue(),
                    date: me.up('mainlist').down('datefield').lastValue,
                }
            });
        }
    },

    getTableSchedule: function (me) {
        me = me.up('mainlist');
        if ((me.down('datefield').lastValue != null) && (me.down('combobox').getValue() != null)) {
            window.open(
                'https://127.0.0.1:8000/Grid/printSchedule?'
                + 'groupId=' + me.down('combobox').getValue()
                + '&date=' + me.down('datefield').lastValue
            );
        }
    }

});
