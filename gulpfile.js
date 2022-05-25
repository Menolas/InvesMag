const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const watch = require('gulp-watch');
const server = require('browser-sync').create();
const fileinclude = require('gulp-file-include');
const del = require('del');
const autoprefixer = require('gulp-autoprefixer');
const group_media = require('gulp-group-css-media-queries');
const clean_css = require('gulp-clean-css');
const rename = require('gulp-rename');
const uglify = require('gulp-uglify-es').default;

gulp.task('style', function() {
  return gulp.src('./assets/sass/style.scss')
  .pipe(sourcemaps.init())
  .pipe(sass().on('error', sass.logError))
  //.pipe(autoprefixer())
  .pipe(group_media())
  .pipe(clean_css())
  .pipe(sourcemaps.write('./'))
  .pipe(gulp.dest('./css'))
  .pipe(rename({extname: ".min.css"}))
  .pipe(server.stream());
});

// JavaScript
gulp.task('javascript', function() {
  return gulp.src('./js/*.js')
  .pipe(jshint())
  .pipe(jshint.reporter('default'))
  .pipe(gulp.dest('./js-build'));
});

gulp.task('server', function () {
  server.init({
    proxy: 'investmag',
    notify: false,
  });

  gulp.watch('assets/sass/**/*.scss', gulp.series('style'));
  gulp.watch('*.php').on('change', server.reload);
});
