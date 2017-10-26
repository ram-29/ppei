const gulp = require('gulp')
const livereload = require('gulp-livereload')
const open = require('gulp-open')
const sass = require('gulp-sass')
const minify = require('gulp-minify')
const cleanCss = require('gulp-clean-css')
const rename = require("gulp-rename")
const bundle = require('gulp-bundle-assets')

gulp.task('compile-sass', function () {
    return gulp.src(['frontend/design/scss/*.scss'])
        .pipe(sass())
        .pipe(cleanCss())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('frontend/web/css'))
        .pipe(livereload({ start: true }))
})

gulp.task('compile-js', function () {
    return gulp.src(['frontend/design/scripts/*.js'])
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

gulp.task('css-bundle', function () {
    return gulp.src('./css-bundle.config.js')
        .pipe(bundle())
        .pipe(rename({
            basename: "vendor",
            suffix: ".min"
        }))
        .pipe(gulp.dest('frontend/web/bundle/css'));
})

gulp.task('js-bundle', function () {
    return gulp.src('./js-bundle.config.js')
        .pipe(bundle())
        .pipe(rename({
            basename: "vendor",
            suffix: ".min"
        }))
        .pipe(gulp.dest('frontend/web/bundle/js'));
});

gulp.task('copy', function () {
    return gulp.src(['frontend/web/assets/components-font-awesome/fonts/*.*'])
        .pipe(gulp.dest('frontend/web/bundle/fonts'))
})

gulp.task('bundle', ['css-bundle', 'js-bundle', 'copy'])

gulp.task('watch', function () {
    livereload.listen()
    gulp.watch(['frontend/design/scss/*.scss'], ['compile-sass'])
    gulp.watch(['frontend/design/scripts/*.js'], ['compile-js'])

    gulp.watch(['frontend/views/**/*.php'], ['php'])
})

gulp.task('uri', function () {
    gulp.src(__filename)
        .pipe(open({ uri: 'http://fr.ppei.io' }))
})

gulp.task('serve', ['bundle', 'watch', 'uri'])
gulp.task('default', ['serve'])
