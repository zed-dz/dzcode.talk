const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass');
const uglifycss = require('gulp-uglifycss');

gulp.task('compile-sass', function() {
  return gulp
    .src(['node_modules/bootstrap/scss/bootstrap.scss', 'src/scss/*.scss'])
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('src/css/'))
    .pipe(browserSync.stream());
});

gulp.task('minify-css', function() {
  gulp
    .src('./src/css/*.css')
    .pipe(
      uglifycss({
        uglyComments: true,
      })
    )
    .pipe(gulp.dest('./src/minify/'));
});

gulp.task('move-js', function() {
  return gulp
    .src([
      'node_modules/jquery/dist/jquery.min.js',
      'node_modules/popper.js/dist/popper.min.js',
      'node_modules/bootstrap/dist/js/bootstrap.min.js',
    ])
    .pipe(gulp.dest('src/js'))
    .pipe(browserSync.stream());
});

gulp.task('move-fonts', function() {
  return gulp
    .src(['node_modules/font-awesome/fonts/*'])
    .pipe(gulp.dest('src/fonts'))
    .pipe(browserSync.stream());
});

gulp.task('move-css-fonts', function() {
  return gulp
    .src(['node_modules/font-awesome/css/font-awesome.min.css'])
    .pipe(gulp.dest('src/css'))
    .pipe(browserSync.stream());
});

// run sass when serve runs
// run server
// watch for any changes in src/scss folder and reload the browser
// also watch for sass changes
// watch for html changes
gulp.task('launch-server', ['compile-sass'], function() {
  browserSync.init({
    server: './src',
    // proxy: 'http://localhost/project/code%20design/dzcode.design/bootstrap%20workspace/1st%20udemy/src'
  });
  gulp.watch(
    [
      'node_modules/bootstrap/scss/bootstrap.scss',
      'node_modules/font-awesome/scss/font-awesome.scss',
      'src/scss/*.scss',
    ],
    ['compile-sass']
  );
  gulp.watch('src/*.html').on('change', browserSync.reload);
});

// run gulp
// launch server and browser
// execute js task
gulp.task('default', ['minify-css', 'move-js', 'move-fonts', 'move-css-fonts', 'launch-server']);
