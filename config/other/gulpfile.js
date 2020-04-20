// gulp version ^4.0.0
const gulp = require("gulp");
const browserSync = require("browser-sync").create();
const sass = require("gulp-sass");
const uglifycss = require("gulp-uglifycss");

gulp.task("compile-sass", () =>
  gulp
    .src([
      "node_modules/bootstrap/scss/bootstrap.scss",
      "workbench/bootstrap workspace/1st udemy/src/scss/*.scss"
    ])
    .pipe(sass().on("error", sass.logError))
    .pipe(gulp.dest("workbench/bootstrap workspace/1st udemy/src/css"))
    .pipe(browserSync.stream())
);

gulp.task("minify-css", () => {
  gulp
    .src("workbench/bootstrap workspace/1st udemy/src/css/*.css")
    .pipe(
      uglifycss({
        uglyComments: true
      })
    )
    .pipe(gulp.dest("workbench/bootstrap workspace/1st udemy/src/minify/"));
});

gulp.task("move-js", () =>
  gulp
    .src([
      "node_modules/bootstrap/dist/js/bootstrap.min.js",
      "node_modules/jquery/dist/jquery.min.js",
      "node_modules/popper.js/dist/popper.min.js"
    ])
    .pipe(gulp.dest("workbench/bootstrap workspace/1st udemy/src/js"))
    .pipe(browserSync.stream())
);

gulp.task("move-fonts", () =>
  gulp
    .src(["node_modules/font-awesome/fonts/*"])
    .pipe(gulp.dest("../fonts"))
    .pipe(browserSync.stream())
);

gulp.task("move-css-fonts", () =>
  gulp
    .src(["node_modules/font-awesome/css/font-awesome.min.css"])
    .pipe(gulp.dest("../workbench/bootstrap workspace/1st udemy/src/css"))
    .pipe(browserSync.stream())
);

// run sass when serve runs
// run server
// watch for any changes in src/scss folder and reload the browser
// also watch for sass changes
// watch for html changes
gulp.task("launch-server", ["compile-sass"], () => {
  browserSync.init({
    server: "./workbench/bootstrap workspace/1st udemy/src"
    // proxy: 'http://localhost/project/code%20design/dzcode.design/bootstrap%20workspace/1st%20udemy/src'
  });
  gulp.watch(
    [
      "node_modules/bootstrap/scss/bootstrap.scss",
      "node_modules/font-awesome/scss/font-awesome.scss",
      "workbench/bootstrap workspace/1st udemy/src/scss/*.scss"
    ],
    ["compile-sass"]
  );
  gulp
    .watch("workbench/bootstrap workspace/1st udemy/src/*.html")
    .on("change", browserSync.reload);
});

// run gulp
// launch server and browser
// execute js task
gulp.task("default", [
  "minify-css",
  "move-js",
  "move-fonts",
  "move-css-fonts",
  "launch-server"
]);

/*

{
  "name": "bs4starter",
  "version": "1.0.0",
  "description": "Bootstrap 4 starter workflow",
  "main": "index.js",
  "scripts": {
    "start": "gulp"
  },
  "repository": {
    "type": "git",
    "url": "git+https://github.com/Zed-M/dzcode.design.git"
  },
  "author": "amine hammou",
  "license": "ISC",
  "dependencies": {
    "bootstrap": "^4.1.2",
    "font-awesome": "^4.7.0",
    "jquery": "^3.3.1",
    "popper.js": "^1.14.3"
  },
  "devDependencies": {
    "browser-sync": "^2.24.6",
    "gulp": "^4.0.0",
    "gulp-sass": "^4.0.1"
  },
  "bugs": {
    "url": "https://github.com/Zed-M/dzcode.design/issues"
  },
  "homepage": "https://github.com/Zed-M/dzcode.design#readme",
  "keywords": []
}


*/
