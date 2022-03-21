Ext.define('scheduleApp.view.main.Main', {
    extend: 'Ext.tab.Panel',
    xtype: 'app-main',

    requires: [
        'Ext.plugin.Viewport',

        'scheduleApp.view.main.MainController',
        'scheduleApp.view.main.MainModel',
    ],

    controller: 'main',
    viewModel: 'main',

    ui: 'navigation',

    tabBarHeaderPosition: 1,
    titleRotation: 0,
    tabRotation: 0,

   header: {
        layout: {
            align: 'stretchmax'
        },
        title: {
            bind: {
                text:'Interactive<br>Schedule',
            },
            flex: 0
        },
    },

    tabBar: {
        flex: 1,
        layout: {
            align: 'stretch',
            overflowHandler: 'none'
        }
    },

    responsiveConfig: {
        tall: {
            headerPosition: 'top'
        },
        wide: {
            headerPosition: 'left'
        }
    },

    defaults: {
        bodyPadding: 20,
        tabConfig: {
            plugins: 'responsive',
            responsiveConfig: {
                wide: {
                    iconAlign: 'left',
                    textAlign: 'left'
                },
                tall: {
                    iconAlign: 'top',
                    textAlign: 'center',
                    width: 120
                }
            }
        }
    },

    items: [
        {
            title: 'Расписание',
            items: [
                {
                    xtype: 'mainlist'
                }
            ]
        }, {
            title: 'Добавить',
            items: [
                {
                    xtype: 'mainAddendum',
                }
            ]
        },
    ]
});
