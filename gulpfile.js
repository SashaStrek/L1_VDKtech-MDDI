const gulp = require('gulp');
const cssmin = require('gulp-cssmin');
const rename = require('gulp-rename');
const concatCss = require('gulp-concat-css');
const htmlmin = require('gulp-htmlmin');
const strip = require('gulp-strip-comments');

function defaultTask() {
    return gulp.src([
        './src/css/bootstrap.min.css',
        './src/css/carousel.css',
        './src/css/styles.css'
    ])
        .pipe(concatCss("styles.css"))
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./dist'));
}
exports.default = defaultTask

gulp.task('minify-html', () => {
    return gulp.src('index.html')
        .pipe(strip())
        .pipe(htmlmin({ collapseWhitespace: true }))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./'));
});