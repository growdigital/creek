var gulp = require('gulp'),
    myth = require('gulp-myth'),
    pixrem = require('gulp-pixrem'),
    minifycss = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    imagemin = require('gulp-svgmin'),
    rename = require('gulp-rename'),
    clean = require('gulp-clean'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    livereload = require('gulp-livereload'),
    lr = require('tiny-lr'),
    server = lr(),

    paths = {
      css: [
        'source/assets/styles/alpha.css',
        'source/assets/styles/variables.css',
        'source/bower_components/normalize/normalize.css',
        'source/assets/styles/base.css',
        'source/bower_components/suit-utils-*/*.css',
        'source/patternlab/**/**/*.css',
        'source/patternlab/**/**/**/*.css',
        'source/assets/styles/shame.css'
      ],
      svg: [
        'source/assets/images/svg/*.svg'
      ],
      bitmap: [
        'source/assets/images/bitmap/*'
      ]
    };

// gulp.task('styles', function() {
//   return gulp.src(paths.css)
//     .pipe(gulp.dest('dist/assets/css/styles.css'))
//     .pipe(rename({suffix: '.min'}))
//     .pipe(minifycss())
//     .pipe(gulp.dest('dist/assets/css'))
//     .pipe(livereload(server))
//     .pipe(notify({ message: 'Styles task complete' }));
// });

gulp.task('css', function() {
  var stream = gulp.src(paths.css)
    .pipe(myth())
    .pipe(pixrem())
    .pipe(concat("styles.css"))
    // TODO: minify only minifiying pattern lab directories -- why?
    // .pipe(minifycss())
    .pipe(gulp.dest('dist/assets/css/'))
});


// gulp.task('css', function() {
//     var stream = gulp.src(paths.css)
//         .pipe(myth())
//         .on('error', function(e){ handleError('Run Myth processing',e);})
//         .pipe(concat("styles.css"))
//         .on('error', function(e){ handleError('Concat CSS files',e);})
//         .pipe(pixrem())
//         .on('error', function(e){ handleError('Pixel fallback for rems',e);})
//         .pipe(minifyCSS())
//         .on('error', function(e){ handleError('Minify CSS files',e);})
//         .pipe(gulp.dest('static'))
//         .on('error', function(e){ handleError('Save CSS file',e);});
// });

// gulp.task('default', ['css']);


