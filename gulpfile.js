var gulp = require('gulp');
var stylus = require('gulp-stylus');
var rupture      = require('rupture');
var livereload = require('gulp-livereload');

gulp.task('one', function() {
	gulp.src('./css/style.styl')
		.pipe(stylus({
			compress: true,
            use: [rupture()]
		}))
		.pipe(gulp.dest('./css'))
		.pipe(livereload());
});

gulp.task('watch', function () {
	livereload.listen();
  gulp.watch('./css/style.styl', ['one']);
});
gulp.task('default', ['one','watch']);
