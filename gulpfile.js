// if you want run write 'gulp watch' in console.

"use strict";

let gulp = require('gulp'),sass = require("gulp-sass")(require("node-sass")),
concat = require('gulp-concat'),
minifyCSS = require('gulp-minify-css'),
uglify = require('gulp-uglify');

// Load plugins
// CSS task
function css() { 
  return gulp
    .src(
      [
        "./assets/css/all.min.css",
        "./assets/css/bootstrap-grid.css",
        "./assets/css/layout.scss"
      ])
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(concat('natkah-min.css'))
    .pipe(minifyCSS())
    .pipe(gulp.dest('./assets/public/css'));
}

// Lint scripts
function scriptsLint() {
  return gulp
    .src(["./assets/scripts/*", "./gulpfile.js"])
}

// Transpile, concatenate and minify scripts
function scripts() {
  return (
    gulp
      .src([
        "./assets/scripts/plugins/jquery-3.4.1.min.js",
        "./assets/scripts/plugins/jquery.slidereveal.min.js",
        "./assets/scripts/plugins/webfont.js",
        "./assets/scripts/natkah.js"
      ])
      .pipe(uglify())
      .pipe(concat('natkah-min.js'))
      .pipe(gulp.dest("./assets/public/js"))
  );
}

// Watch files
function watchFiles() {
  gulp.watch("./assets/css/**/*", css);
  gulp.watch("./assets/scripts/**/*", gulp.series(scriptsLint, scripts));
}


// define complex tasks
const js = gulp.series(scriptsLint, scripts);
const build = gulp.series(gulp.parallel(css, js));
const watch = gulp.parallel(watchFiles);


// export tasks
exports.css = css;
exports.js = js;
exports.watch = watch;