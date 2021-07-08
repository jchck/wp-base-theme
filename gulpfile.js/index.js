const config = require('./config');
const { series, parallel, task, watch }   = require('gulp');
const browserSync = require('browser-sync').create(config.server.instance);
const { styles } = require('./styles');
const { scripts } = require('./scripts');
// const { imgmin } = require('./images');

function reload(cb) {
  browserSync.reload();
  cb();
};

function watcher() {
  browserSync.init({
    files: [
      '{functions,templates}/**/*.php',
      '*.php'
    ],
    proxy: config.server.devUrl,
    browser: config.server.browser,
    port: config.server.port,
    snippetOptions: {
      whitelist: ['/wp-admin/admin-ajax.php'],
      blacklist: ['/wp-admin/**'],
    },
  });

  watch( 'assets/styles/**/*', styles );
  watch( 'assets/scripts/**/*.js', series(scripts, reload ) );
//   watch( 'assets/img/**/*', imgmin );
};

const build = parallel( styles, /*scripts, imgmin */);

exports.styles = styles;
exports.scripts = scripts;
// exports.imgmin = imgmin;
exports.build = build;
exports.default = series( build, watcher );
