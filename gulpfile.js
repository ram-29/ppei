const gulp = require('gulp')
const livereload = require('gulp-livereload')
const open = require('gulp-open')
const sass = require('gulp-sass')

gulp.task('sass', function () {
    return gulp.src(['frontend/web/scss/*.scss'])
        .pipe(sass())    
        .pipe(gulp.dest('frontend/web/css'))
})

gulp.task('css', function () {
    gulp.src('frontend/web/css/*.css')
        .pipe(livereload({ start: true }))
})

gulp.task('js', function () {
    gulp.src('frontend/web/js/*.js')
        .pipe(livereload({ start: true }))
})

gulp.task('php', function () {
    gulp.src('frontend/views/**/*.php')
        .pipe(livereload({ start: true }))
})

gulp.task('watch', function () {
    livereload.listen()
    gulp.watch(['frontend/web/scss/*.scss'], ['sass'])
    gulp.watch(['frontend/web/css/*.css'], ['css'])
    gulp.watch(['frontend/web/js/*.js'], ['js'])
    gulp.watch(['frontend/views/**/*.php'], ['php'])
})

gulp.task('uri', function () {
    gulp.src(__filename)
        .pipe(open({ uri: 'http://ppei.io' }))
})

gulp.task('serve', ['watch', 'uri'])
gulp.task('default', ['serve'])
