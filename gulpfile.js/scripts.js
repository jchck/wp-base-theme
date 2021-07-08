/**
 * This task uses rollup.js via Gulp
 * @see https://rollupjs.org/guide/en/#gulp
 */
const config = require('./config');
const rollup = require('rollup');
const { nodeResolve } = require('@rollup/plugin-node-resolve');
const { babel } = require('@rollup/plugin-babel');
const commonJS = require('@rollup/plugin-commonjs');
const { terser } = require('rollup-plugin-terser');
const browserSync = require('browser-sync').get(config.server.instance);

const external = ['jquery'];

const globals = {
    jquery: 'jQuery'
};

const plugins = [
    commonJS(),
    babel({
        exclude: 'node_modules/**',
        babelHelpers: 'bundled'
    }),
    nodeResolve(),
    terser()
];

const scripts = () => {
    return rollup.rollup({
        input: `${config.scripts.in}index.js`,
        external,
        plugins
    }).then(bundle => {
        return bundle.write({
            file: `${config.scripts.out}index.js`,
            format: 'umd',
            name: 'hi',
            globals,
            sourcemap: true
        });
    });
}

exports.scripts = scripts;