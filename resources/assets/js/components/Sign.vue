<template>
    <div>
        <h1>Hello App!</h1>
        <p>
123
        </p>
    </div>
</template>



<script>
    const Foo = { template: '<div>foo</div>' }
    const Bar = { template: '<div>bar</div>' }

    const router = new VueRouter([

            { path: '/foo', component: Foo },
            { path: '/bar', component: Bar }

    ])

    export default {
        name: 'Sign',
        router,
        components: { VueRouter }
    }


    //console.log(window.location.pathname)
</script>
