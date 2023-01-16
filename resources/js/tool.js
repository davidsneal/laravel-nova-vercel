Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'laravel-nova-vercel',
      path: '/laravel-nova-vercel',
      component: require('./components/Tool'),
    },
  ])
})
