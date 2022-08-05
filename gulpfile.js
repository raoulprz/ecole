var gulp = require("gulp"),
  autoprefixer = require("gulp-autoprefixer"),
  browserSync = require("browser-sync").create(),
  reload = browserSync.reload,
  cleanCSS = require("gulp-clean-css"),
  sass = require("gulp-sass"),
  sourcemaps = require("gulp-sourcemaps"),
  concat = require("gulp-concat"),
  terser = require("gulp-terser"),
  plumber = require("gulp-plumber");

var scss = "src/sass/",
  adminScss = "src/admin/sass/",
  js = "src/js/",
  adminJs = "src/admin/js/",
  themedist = "app/wp-content/themes/ecole";

var phpWatchFiles = "app/wp-content/themes/ecole/**/*.php",
  styleWatchFiles = scss + "**/*.scss",
  adminStyleWatchFiles = adminScss + "admin-style.scss",
  editorStyleWatchFiles = adminScss + "editor-style.scss",
  customizerStyleWatchFiles = adminScss + "customizer.scss";

var jsSRC = [
  "./node_modules/bootstrap/dist/js/bootstrap.bundle.js",
  "./node_modules/magnific-popup/dist/jquery.magnific-popup.min.js",
  "./node_modules/owl.carousel/dist/owl.carousel.min.js",
  js + "contrib/*.js",
  js + "main.js",
];

var cssSRC = [
  scss + "**/*.scss",
  "./node_modules/bootstrap-icons/font/bootstrap-icons.css",
  "./node_modules/magnific-popup/dist/magnific-popup.css",
  "./node_modules/owl.carousel/dist/assets/owl.carousel.min.css",
  "./node_modules/owl.carousel/dist/assets/owl.theme.default.min.css",
];
var adminCssSRC = [adminScss + "admin-style.scss"];
var editorCssSRC = [adminScss + "editor-style.scss"];
var customizerCssSRC = [adminScss + "customizer.scss"];

var adminJsSRC = [adminJs + "contrib/*.js", adminJs + "admin.js"];

function css() {
  return gulp
    .src(cssSRC)
    .pipe(
      plumber({
        errorHandler: function (err) {
          console.log(err);
          this.emit("end");
        },
      })
    )
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(sass())
    .pipe(concat("style.css"))
    .pipe(cleanCSS())
    .pipe(autoprefixer("last 2 versions"))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(themedist))
    .pipe(
      browserSync.reload({
        stream: true,
      })
    );
}

function cssBuild() {
  return gulp
    .src(cssSRC)
    .pipe(sass())
    .pipe(concat("style.css"))
    .pipe(cleanCSS())
    .pipe(autoprefixer("last 2 versions"))
    .pipe(gulp.dest(themedist));
}

function adminCss() {
  return gulp
    .src(adminCssSRC)
    .pipe(
      plumber({
        errorHandler: function (err) {
          console.log(err);
          this.emit("end");
        },
      })
    )
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(sass())
    .pipe(concat("admin-style.css"))
    .pipe(cleanCSS())
    .pipe(autoprefixer("last 2 versions"))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(themedist))
    .pipe(
      browserSync.reload({
        stream: true,
      })
    );
}

function adminCssBuild() {
  return gulp
    .src(adminCssSRC)
    .pipe(sass())
    .pipe(concat("admin-style.css"))
    .pipe(cleanCSS())
    .pipe(autoprefixer("last 2 versions"))
    .pipe(gulp.dest(themedist));
}

function editorCss() {
  return gulp
    .src(editorCssSRC)
    .pipe(
      plumber({
        errorHandler: function (err) {
          console.log(err);
          this.emit("end");
        },
      })
    )
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(sass())
    .pipe(concat("editor-style.css"))
    .pipe(cleanCSS())
    .pipe(autoprefixer("last 2 versions"))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(themedist))
    .pipe(
      browserSync.reload({
        stream: true,
      })
    );
}

function editorCssBuild() {
  return gulp
    .src(editorCssSRC)
    .pipe(sass())
    .pipe(concat("editor-style.css"))
    .pipe(cleanCSS())
    .pipe(autoprefixer("last 2 versions"))
    .pipe(gulp.dest(themedist));
}

function customizerCss() {
  return gulp
    .src(customizerCssSRC)
    .pipe(
      plumber({
        errorHandler: function (err) {
          console.log(err);
          this.emit("end");
        },
      })
    )
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(sass())
    .pipe(concat("customizer.css"))
    .pipe(cleanCSS())
    .pipe(autoprefixer("last 2 versions"))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(themedist))
    .pipe(
      browserSync.reload({
        stream: true,
      })
    );
}

function customizerCssBuild() {
  return gulp
    .src(customizerCssSRC)
    .pipe(sass())
    .pipe(concat("customizer.css"))
    .pipe(cleanCSS())
    .pipe(autoprefixer("last 2 versions"))
    .pipe(gulp.dest(themedist));
}

function javascript() {
  return gulp.src(jsSRC).pipe(concat("main.js")).pipe(terser()).pipe(gulp.dest(themedist));
}

function adminJavascript() {
  return gulp.src(adminJsSRC).pipe(concat("admin.js")).pipe(terser()).pipe(gulp.dest(themedist));
}

function watch() {
  browserSync.init({
    proxy: "localhost:850/ecole/app",
    open: false,
    notify: false,
  });
  gulp.watch(styleWatchFiles, css);
  gulp.watch(adminStyleWatchFiles, adminCss);
  gulp.watch(editorStyleWatchFiles, editorCss);
  gulp.watch(customizerStyleWatchFiles, customizerCss);
  gulp.watch(jsSRC, javascript);
  gulp.watch(adminJsSRC, adminJavascript);
  gulp
    .watch([
      phpWatchFiles,
      themedist + "/main.js",
      themedist + "/admin.js",
      themedist + "/style.css",
      themedist + "/admin-style.css",
      themedist + "/editor-style.css",
      themedist + "/customizer.css",
    ])
    .on("change", reload);
}

exports.css = css;
exports.cssBuild = cssBuild;
exports.adminCss = adminCss;
exports.adminCssBuild = adminCssBuild;
exports.editorCssBuild = editorCssBuild;
exports.customizerCssBuild = customizerCssBuild;
exports.javascript = javascript;
exports.adminJavascript = adminJavascript;
exports.watch = watch;

var local = gulp.parallel(watch);
gulp.task("default", local);

var build = gulp.parallel(cssBuild, adminCssBuild, editorCssBuild, customizerCssBuild, javascript, adminJavascript);
gulp.task("build", build);
