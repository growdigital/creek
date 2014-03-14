var gulp = require('gulp'),
    // Load gulp plugins
    cache      = require('gulp-cache'),
    clean      = require('gulp-clean'),
    concat     = require('gulp-concat'),
    imagemin   = require('gulp-imagemin'),
    jshint     = require('gulp-jshint'),
    livereload = require('gulp-livereload'),
    lr         = require('tiny-lr'),
    minifycss  = require('gulp-minify-css'),
    myth       = require('gulp-myth'),
    notify     = require('gulp-notify'),
    pixrem     = require('gulp-pixrem'),
    rename     = require('gulp-rename'),
    svg2png    = require('gulp-svg2png'),
    svgmin     = require('gulp-svgmin'),
    uglify     = require('gulp-uglify'),
    server     = lr(),

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
        'src/bower_components/jquery/dist/jquery.js',
        'src/bower_components/modernizr/modernizr.js',
        'src/assets/scripts/*.js',
        'src/patternlab/**/**/*.js',
        'src/patternlab/**/**/**/*.js',
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
  return gulp.src('src/assets/images/bitmap/**/*')
    .pipe(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true }))
    .pipe(gulp.dest('dist/assets/img'))
    .pipe(livereload(server))
    .pipe(notify({ message: 'Images task complete' }));
});

// SVG optmisation and PNGinisationism
gulp.task('vectors', function() {
  return gulp.src(paths.vectors)
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

// Default task
gulp.task('default', ['clean'], function() {
  gulp.start('styles', 'scripts', /* 'images', */ 'vectors');
});

// Keep a close eye on stuff
gulp.task('watch', function() {
// TODO: pass the paths variables, rather than rewrite out
  // Watch .css files
  gulp.watch(paths.styles, ['styles']);
  // Watch .js files
  gulp.watch(paths.scripts, ['scripts']);
  // Watch image files
  // gulp.watch(paths.images, ['images']);
  // Watch image files
  gulp.watch(paths.vectors, ['vectors']);
});

// Live reload
gulp.task('watch', function() {
  // Listen on port 35729
  server.listen(35729, function (err) {
    if (err) {
      return console.log(err)
    };
    // Watch tasks go inside inside server.listen()
  });
});
