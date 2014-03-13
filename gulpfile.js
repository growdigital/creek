var gulp = require('gulp'),
    myth = require('gulp-myth'),
    pixrem = require('gulp-pixrem'),
    minifycss = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    svgmin = require('gulp-svgmin'),
    svg2png = require('gulp-svg2png'),
    rename = require('gulp-rename'),
    clean = require('gulp-clean'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    livereload = require('gulp-livereload'),
    lr = require('tiny-lr'),
    server = lr(),

    // Define paths variables
    paths = {
      styles: [
        'source/assets/styles/alpha.css',
        'source/assets/styles/variables.css',
        'source/bower_components/normalize/normalize.css',
        'source/assets/styles/base.css',
        'source/bower_components/suit-utils-*/*.css',
        'source/patternlab/**/**/*.css',
        'source/patternlab/**/**/**/*.css',
        'source/assets/styles/shame.css'
      ],
      scripts: [
        'source/bower_components/jquery/dist/jquery.js',
        'source/bower_components/modernizr/modernizr.js',
        'source/assets/scripts/*.js',
      ],
      vector: [
        'source/assets/images/svg/transparency/*.svg'
      ],
      bitmap: [
        'source/assets/images/bitmap/**/*.jpg'
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


// Mangle your CSS - preprocess, optimise, concatenate
gulp.task('styles', function() {
  var stream = gulp.src(paths.styles)
    .pipe(myth())
    .pipe(pixrem())
    .pipe(concat("styles.css"))
    // TODO: minify only minifiying pattern lab directories -- why?
    // .pipe(minifycss())
    .pipe(livereload(server))
    .pipe(gulp.dest('dist/assets/css/'))
    .pipe(notify({ message: 'Styles task complete.' }));
});

// JS optimisation, linting, concatening etc
gulp.task('scripts', function() {
  return gulp.src(paths.scripts)
    // TODO: Fix JSHint!
    // .pipe(jshint('.jshintrc'))
    // .pipe(jshint.reporter('default'))
    .pipe(concat('main.js'))
    // TODO: Not renaming minified JS file for now
    // .pipe(gulp.dest('dist/assets/js'))
    // .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('dist/assets/js'))
    .pipe(livereload(server))
    .pipe(notify({ message: 'Scripts task complete' }));
});

// TODO: fix orchestrator error: > TypeError: Object #<Object> has no method 'forEach'
// Bitmap image optimisation
gulp.task('images', function() {
  return gulp.src('source/assets/images/bitmap/**/*')
    .pipe(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true }))
    .pipe(gulp.dest('dist/assets/img'))
    .pipe(livereload(server))
    .pipe(notify({ message: 'Images task complete' }));
});

// SVG optmisation and PNGinisationism
gulp.task('vector', function() {
  return gulp.src(paths.vector)
    // TODO: add parameters to gulp.dest so that forgets original directory!
    // possibly in svgmin parameters, as svg2png works ok
    .pipe(svgmin())
    .pipe(gulp.dest('dist/assets/img/./'))
    .pipe(svg2png())
    .pipe(gulp.dest('dist/assets/img/'));
    // TODO: sort out workflow, optimise generated PNGs
});

// Clean task
gulp.task('clean', function() {
  return gulp.src(['dist/assets/css', 'dist/assets/js', 'dist/assets/img'], {read: false})
    .pipe(clean());
});

// Keep a close eye on stuff
gulp.task('watch', function() {
// TODO: pass the paths variables, rather than rewrite out
  // Watch .css files
  gulp.watch('source/styles/**/*.css', ['styles']);

  // Watch .js files
  gulp.watch('source/scripts/**/*.js', ['scripts']);

  // Watch image files
  gulp.watch('source/images/**/*', ['images']);

});

