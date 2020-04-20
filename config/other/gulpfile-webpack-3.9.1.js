// gulp version 3.9.1
const gulp = require("gulp");
const sass = require("gulp-sass");
const autoprefixer = require("gulp-autoprefixer");
// const concat = require('gulp-concat');
// const babel = require('gulp-babel');
// const watch = require('gulp-watch');
const browserSync = require("browser-sync");

const reload = browserSync.reload;
const exec = require("child_process").exec;

gulp.task("default", ["styles", "webpack", "browser-sync"], () => {
  gulp.watch("./resources/assets/sass/**/*", ["styles"]);
  gulp.watch("./resources/assets/js/**/*", ["webpack"]);
  gulp
    .watch([
      "./public/**/*",
      "./public/*",
      "!public/js/**/.#*js",
      "!public/css/**/.#*css"
    ])
    .on("change", reload);
});

gulp.task("styles", () => {
  gulp
    .src("resources/assets/sass/**/*.scss")
    .pipe(
      sass({
        outputStyle: "compressed"
      }).on("error", sass.logError)
    )
    .pipe(
      autoprefixer({
        browsers: ["last 2 versions"]
      })
    )
    .pipe(gulp.dest("./public/css"))
    .pipe(browserSync.stream());
});

gulp.task("browser-sync", ["styles"], () => {
  // THIS IS FOR SITUATIONS WHEN YOU HAVE ANOTHER SERVER RUNNING
  browserSync.init({
    proxy: {
      target: "localhost:3333", // can be [virtual host, sub-directory, localhost with port]
      ws: true // enables websockets
    },
    notify: false,
    open: false,
    serveStatic: [".", "./public"]
  });

  // browserSync.init(    {
  //   server: "./public",
  //   notify: false,
  //   open: true // change this to true if you want the broser to open automatically
  // });
});

gulp.task("webpack", cb => {
  exec("webpack", (err, stdout, stderr) => {
    console.log(stdout);
    console.log(stderr);
    cb(err);
  });
});

// gulp.task('webpack', shell.task([
//   'webpack'
// ]))

// gulp.task('server', shell.task([
//   'yarn run server'
// ]))
