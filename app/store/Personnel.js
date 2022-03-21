Ext.define('scheduleApp.store.Personnel', {
    extend: 'Ext.data.Store',

    alias: 'store.personnel',

    fields: [
        '№', 'Понидельник', 'Вторник','Среда', 'Четверг','Пятница'
    ],

    data: { items: [
        {
            time: '8:30 - 10:00',
            days: {
                1 : {
                    subject: 'матан',
                    group: 'КИ-21-01',
                    cabinet:'2312'
                },
                2 : {
                    subject: 'матан',
                    group: 'КИ-21-01',
                    cabinet:'2204'
                },
                3 : {
                    subject: 'матан',
                    group: 'КИ-21-01',
                    cabinet:'2404'
                },
                4 : {
                    subject: 'матан',
                    group: 'КИ-21-01',
                    cabinet:'2404'
                },
                5 : {
                    subject: 'матан',
                    group: 'КИ-21-01',
                    cabinet: '2404'
                }
            },
        },
        {
            time: '10:30 - 11:00',
            days: {
                1 : {
                    subject: 'не матан',
                    group: 'КИ-21-01',
                    cabinet: '2404',
                },
                2 : {
                    subject: 'матан',
                    group: 'КИ-21-01',
                    cabinet:'2404',
                },
                3 : {
                    subject: 'матан',
                    group: 'КИ-21-01',
                    cabinet:'2404',
                },
                4 : {
                    subject: 'матан',
                    group: 'КИ-21-01',
                    cabinet:'2404',
                },
                5 : {
                    subject: 'матан',
                    group: 'КИ-21-01',
                    cabinet:'2404',
                }
            },
        },
    ]},
    proxy: {
        type: 'memory',
        reader: {
            type: 'json',
            rootProperty: 'items'
        }
    }
});
