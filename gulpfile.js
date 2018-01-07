const gulp = require('gulp');
const livereload = require('gulp-livereload');
const open = require('gulp-open');
const sass = require('gulp-sass');
const minify = require('gulp-minify');
const cleanCss = require('gulp-clean-css');
const rename = require('gulp-rename');
const bundle = require('gulp-bundle-assets');

gulp.task('compile-sass', () => gulp.src(['frontend/design/scss/*.scss'])
	.pipe(sass())
	.pipe(cleanCss({ level: { 1: { specialComments: 0 } } }))
	.pipe(rename({ suffix: '.min' }))
	.pipe(gulp.dest('frontend/web/css'))
	.pipe(livereload({ start: true })));

gulp.task('compile-js', () => gulp.src(['frontend/design/scripts/*.js'])
	.pipe(minify({
		ext: { min: '.min.js' },
		noSource: true,
	}))
	.pipe(gulp.dest('frontend/web/js'))
	.pipe(livereload({ start: true })));

gulp.task('views', () => gulp.src('frontend/views/**/*.php')
	.pipe(livereload({ start: true })));

gulp.task('controllers', () => gulp.src('frontend/controllers/*.php')
	.pipe(livereload({ start: true })));

gulp.task('css-bundle', () => gulp.src('./css-bundle.config.js')
	.pipe(bundle())
	.pipe(rename({
		basename: 'vendor',
		suffix: '.min',
	}))
	.pipe(gulp.dest('frontend/web/bundle/css')));

gulp.task('js-bundle', () => gulp.src('./js-bundle.config.js')
	.pipe(bundle())
	.pipe(rename({
		basename: 'vendor',
		suffix: '.min',
	}))
	.pipe(gulp.dest('frontend/web/bundle/js')));

gulp.task('nano', () => gulp.src(['node_modules/nanogallery2/dist/css/font/*.*'])
	.pipe(gulp.dest('frontend/web/bundle/css/font')));

gulp.task('fa', () => gulp.src(['node_modules/font-awesome/fonts/*.*'])
	.pipe(gulp.dest('frontend/web/bundle/fonts')));

gulp.task('copy', ['fa', 'nano']);
gulp.task('bundle', ['css-bundle', 'js-bundle', 'copy']);

gulp.task('watch', () => {
	livereload.listen();
	gulp.watch(['frontend/design/scss/*.scss'], ['compile-sass']);
	gulp.watch(['frontend/design/scripts/*.js'], ['compile-js']);

	gulp.watch(['frontend/views/**/*.php'], ['views']);
	gulp.watch(['frontend/controllers/*.php'], ['controllers']);
});

gulp.task('uri', () => {
	gulp.src(__filename)
		.pipe(open({ uri: 'http://fr.ppei.io' }));
});

gulp.task('serve', ['bundle', 'watch', 'uri']);
gulp.task('default', ['serve']);
