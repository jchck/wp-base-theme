module.exports = {
    server: {
        devUrl: 'https://base.local/',
        instance: 'base',
        port: '4044',
        https: true,
        browser: 'google chrome'
    },

    images: {
        in: './assets/images/**/*',
        out: './dist/img'
    },
    
    styles: {
        in: `./assets/styles/index.scss`,
        out: `./dist/css`
    },

    scripts: {
        in: `./assets/scripts/`,
        out: `./dist/js/`,
    }
};
