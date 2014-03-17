var gulp = require('gulp'),
  // Load gulp plugins

  // System
  cache      = require('gulp-cache'),
  clean      = require('gulp-clean'),
  concat     = require('gulp-concat'),
  rename     = require('gulp-rename'),
  // CSS
  myth       = require('gulp-myth'),
  minifycss  = require('gulp-minify-css'),
  pixrem     = require('gulp-pixrem'),
  // JavaScript
  jshint     = require('gulp-jshint'),
  uglify     = require('gulp-uglify'),
  // Images
  imagemin   = require('gulp-imagemin'),
  svg2png    = require('gulp-svg2png'),
  svgmin     = require('gulp-svgmin'),
  // Server
  notify     = require('gulp-notify'),
  watch      = require('gulp-watch'),
  tinyLr     = require('tiny-lr'),
  livereload = require('gulp-livereload'),
  liveReloadServer = tinyLr(),

    // Define paths variables
    paths = {
      styles: [
        'src/assets/styles/alpha.css',
        'src/assets/styles/variables.css',
        'src/bower_components/normalize/normalize.css',
        'src/assets/styles/base.css',
        'src/bower_components/suit-utils-*/*.css',
        'src/patternlab/**/**/*.css',
        'src/patternlab/**/**/**/*.css',
        'src/assets/styles/shame.css'
      ],
      scripts: [
        'src/assets/scripts/*.js',
        'src/patternlab/**/**/*.js',
        'src/patternlab/**/**/**/*.js'
      ],
      vectors: [
        'src/assets/images/svg/transparency/*.svg'
      ],
      bitmap: [
        'src/assets/images/bitmap/**/*.jpg'
      ]
    };

// Mangle your CSS - preprocess, optimise, concatenate
gulp.task('styles', function() {
  var stream = gulp.src(paths.styles)
    .pipe(myth())
    .pipe(pixrem())
    .pipe(concat("styles.css"))
    // TODO: minify only minifiying pattern lab directories -- why?
    // .pipe(minifycss())
    .pipe(livereload(liveReloadServer))
    .pipe(gulp.dest('dist/assets/css/'))
    // .pipe(notify({ message: 'Styles task complete.' }));
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
    .pipe(livereload(liveReloadServer))
    // .pipe(notify({ message: 'Scripts task complete' }));
});

// TODO: fix orchestrator error: > TypeError: Object #<Object> has no method 'forEach'
// Bitmap image optimisation
gulp.task('images', function() {
  return gulp.src('src/assets/images/bitmap/**/*')
    .pipe(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true }))
    .pipe(gulp.dest('dist/assets/img'))
    .pipe(livereload(liveReloadServer))
    // .pipe(notify({ message: 'Images task complete' }));
});

// SVG optmisation and PNGinisationism
gulp.task('vectors', function() {
  return gulp.src(paths.vectors)
    .pipe(svgmin())
    .pipe(gulp.dest('dist/assets/img/'))
    .pipe(svg2png())
    .pipe(gulp.dest('dist/assets/img/'));
    // TODO: sort out workflow, optimise generated PNGs
});

// Clean task
gulp.task('clean', function() {
  return gulp.src(['dist/assets/css', 'dist/assets/js', 'dist/assets/img'], {read: false})
    .pipe(clean());
});

// Default task
gulp.task('default', ['clean'], function() {
  gulp.start('styles', 'scripts', /* 'images', */ 'vectors', 'watch', 'livereload');
});


// Keep a close eye on stuff
gulp.task('watch', function() {
  // Watch .css files
  gulp.watch(paths.styles, ['styles'])
  // Watch .js files
  gulp.watch(paths.scripts, ['scripts'])
  // Watch image files
  // gulp.watch(paths.images, ['images'])
  // Watch image files
  gulp.watch(paths.vectors, ['vectors']);
});

// Live reload
// gulp.task('watch', function() {
  // Listen on port 35729
  // server.listen(35729, function (err) {
  //   if (err) {
  //     return console.log(err)
  //   };
    // Watch tasks go inside inside server.listen()
//   });
// });

// Live reload
gulp.task('livereload', ['tiny-lr-server'], function() {
    gulp.src(['dist/assets/css/styles.css','dist/assets/images/*.svg'])
        .pipe(watch())
        .pipe(livereload(liveReloadServer));
});

// Server
gulp.task('tiny-lr-server', function(next) {
    liveReloadServer.listen(35729, function(err) {
        if (err) return console.error(err);
        next();
    });
});

gulp.task('watch', function () {
    gulp.watch(paths.css, ['css'])
    gulp.watch(paths.svg, ['svg']);
});

