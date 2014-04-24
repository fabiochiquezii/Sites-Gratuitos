//plugins do gulp
var gulp = require('gulp');
var imagemin = require('gulp-imagemin');
var uglify = require('gulp-uglify');
var rename = require("gulp-rename");
var minifyCSS = require('gulp-minify-css');
var sass = require('gulp-sass')
var concat = require('gulp-concat');
var minifyHTML = require('gulp-minify-html');

//diretório de arquivos
var files = "./src/**"
var js = "./src/js/*.js";
var css = "./src/css/*.css";
var scss = "./src/sass/*.scss";
var img = "./src/img/*.jpg";
var html = "./src/*.html";

//funções

//função html
gulp.task('minify-html', function() {
    var opts = {comments:true,spare:true};

  gulp.src(html)
    .pipe(minifyHTML(opts))
    .pipe(gulp.dest('./dist'))
});

//funçao do js
gulp.task('script', function() {
	gulp.src(js)
	.pipe(concat('./dist'))
	.pipe(uglify())
	.pipe(rename("main.min.js"))
    .pipe(gulp.dest('./dist/js'))
});

//função do sass
gulp.task('oocss', function () {
    gulp.src(scss)
        .pipe(sass())
        .pipe(rename("stylesass.css"))
        .pipe(gulp.dest('./src/css'));
});

//funçao css
gulp.task('minify-css', function() {
  gulp.src(css)
    .pipe(minifyCSS(opts))
    .pipe(rename("style.min.css"))
    .pipe(gulp.dest('./dist/css'))
});

//função do img
gulp.task('imgmin', function () {
    gulp.src(img)
        .pipe(imagemin())
        .pipe(gulp.dest('./dist/img'));
});


//função principal
gulp.task('default', function() {
	gulp.run('script', 'oocss', 'minify-css', 'imgmin', 'minify-html');

	gulp.watch(files, function(evt) {
		gulp.run('script',  'oocss', 'minify-css', 'imgmin', 'minify-html');
	});
});