export default [
    {
        path: '/',
        name: 'pricing_table_home',
        component: require('./Components/AllTables'),
    },
    {
        path: '/edit/:table_id',
        name: 'edit_table',
        component: require('./Components/EditTable')
    }
];