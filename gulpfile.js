const gulp = require('gulp')
const livereload = require('gulp-livereload')
const open = require('gulp-open')
const sass = require('gulp-sass')
const minify = require('gulp-minify')
const cleanCss = require('gulp-clean-css')
const rename = require("gulp-rename")

gulp.task('compile-sass', function () {
    return gulp.src(['frontend/web/scss/*.scss'])
        .pipe(sass())
        .pipe(cleanCss())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('frontend/web/css'))
        .pipe(livereload({ start: true }))
})

gulp.task('compile-js', function () {
    return gulp.src(['frontend/web/scripts/*.js'])
        .pipe(minify({
            ext: { min: '.min.js' },
            noSource: true
        }))
        .pipe(gulp.dest('frontend/web/js'))
        .pipe(livereload({ start: true }))
})

gulp.task('php', function () {
    return gulp.src('frontend/views/**/*.php')
        .pipe(livereload({ start: true }))
})

gulp.task('watch', function () {
    livereload.listen()
    gulp.watch(['frontend/web/scss/*.scss'], ['compile-sass'])
    gulp.watch(['frontend/web/scripts/*.js'], ['compile-js'])

    gulp.watch(['frontend/views/**/*.php'], ['php'])
})

gulp.task('uri', function () {
    gulp.src(__filename)
        .pipe(open({ uri: 'http://fr.ppei.io' }))
})

gulp.task('serve', ['watch', 'uri'])
gulp.task('default', ['serve'])
