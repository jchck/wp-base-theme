const config    = require('./config');
const gulp      = require('gulp');
const postcss   = require('gulp-postcss');
const sass      = require('gulp-sass');
sass.compiler   = require('sass');
const sassGlob  = require('gulp-sass-glob');
const map       = require('gulp-sourcemaps');
const browserSync = require('browser-sync').get(config.server.instance);

const Fiber     = require('fibers');

const nano      = require('cssnano');
const prefix    = require('autoprefixer');
const mqPacker  = require('css-mqpacker');

function styles () {
  return gulp.src(config.styles.in)
    .pipe(map.init())
    .pipe(sassGlob())
    .pipe(sass.sync({
      precision: 2,
      includePaths: [
        'node_modules/bourbon/core',
        'node_modules/tachyons-sass/scss'
      ],
      fiber: Fiber
    }))
    .pipe( postcss([
      prefix(),
      mqPacker({
        sort: true
      }),
      // nano({
      //   autoprefixer: false
      // })
    ]))
    .pipe( map.write('.') )
    .pipe( gulp.dest( config.styles.out ) )
    .pipe( browserSync.stream() )
};

exports.styles = styles;
