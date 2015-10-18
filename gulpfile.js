var gulp        = require('gulp'),
    browserSync = require('browser-sync').create(),
    sass        = require('gulp-sass'),
    uglify      = require('gulp-uglify'),
    coffee      = require('gulp-coffee'),
    jade        = require('gulp-jade');

gulp.task('serve', ['sass'], function() {

    browserSync.init({
        proxy: "alfa.dev"
    });

    gulp.watch("./src/sass/*.sass", ['sass']);
    gulp.watch("./src/sass/**/*.sass", ['sass']);
    gulp.watch("./src/js/*.coffee", ['coffee']);
    gulp.watch("./*.php").on('change', browserSync.reload);
});

gulp.task('sass', function() {
    return gulp.src("./src/sass/*")
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(gulp.dest("./"))
        .pipe(browserSync.stream());
});

gulp.task('coffee', function() {
  gulp.src('./src/js/*.coffee')
    .pipe(coffee())
    .pipe(gulp.dest('./js'))
    .pipe(browserSync.stream());
});

gulp.task('default', ['serve']);
